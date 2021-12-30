<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CompleteRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\Bill_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index(){
        $featured_products = Product::where('featured', 1)->orderBy('id','DESC')->take(8)->get();
        $new_products = Product::orderBy('id', 'DESC')->take(8)->get();
        // $categories = Category::all()->toArray();
        return view("frontend/index", ["featured_products" => $featured_products, "new_products" => $new_products]);
    }

    public function detail($id, $slug){
        $product = Product::find($id);
        $comments = Comment::where("product_id", $id)->paginate(5);
        return view("frontend/details", ["product" => $product, "comments"=>$comments]);

    }

    public function category($id, $slug){
        $category = Category::find($id);
        $products = Product::where('categories_id',$id)->paginate(8);
        return view("frontend/category", ["products" => $products, 'category' => $category]);
        
    }

    public function postComment(CommentRequest $CommentRequest, $id){
        $comment = new Comment;
        $comment->email = $CommentRequest->email;
        $comment->name = $CommentRequest->name;
        $comment->content = $CommentRequest->content;
        $comment->product_id = $id;
        $comment->save();
        session()->flash("message","Bình luận thành công !");
        return back();
        
    }
     
    public function search(Request $request){
        $result = $request->result;
        $result = str_replace(' ','%',$result);
        $products = Product::where('name','like','%'.$result.'%')->orwhere('code','like','%'.$result.'%')->paginate(8);
        return view("frontend/search", ["products" => $products, "key" => $request->result]);
    }

    public function addtocart($id){
       
        
        // session()->forget('cart');
        $product = Product::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['qtt'] = $cart[$id]['qtt'] + 1;     
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'qtt' => 1
            ];
        }
        
        session()->put('cart', $cart);
        $carts = session()->get('cart');
        
        $cartnotify = view('frontend/master/layouts/cartnotify', ['carts' => $carts])->render();
        return response()->json([
            'cartnotify' => $cartnotify,
            'code' => 200 ,
            'message' => "Thêm sản phầm thành công"
        ], 200);
     
        
    }

    public function showcart(){
        $carts = session()->get('cart');
        // dd($carts);
        return view('frontend/cart', ['carts' => $carts]);
    }

    public function updatecart(Request $request){
        if($request->id && $request->qtt){
            $carts = session()->get('cart');
            $carts[$request->id]['qtt'] = $request->qtt;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $listcart = view('frontend/components/listcart', ['carts' => $carts])->render();
            return response()->json(['listcart' => $listcart, 'code' => 200], 200);
        }
        return view('frontend/cart');
    }

    public function deletecart(Request $request){
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $listcart = view('frontend/components/listcart', ['carts' => $carts])->render();
            $cartnotify = view('frontend/master/layouts/cartnotify', ['carts' => $carts])->render();
            return response()->json(['listcart' => $listcart,'cartnotify' => $cartnotify, 'code' => 200], 200);
        }
        return view('frontend/cart');
    }

    public function deleteall(Request $request){
        // dd($request->all());
      
            if($request){
                session()->forget('cart');
                $carts = [];
                $cartnotify = view('frontend/master/layouts/cartnotify', ['carts' => $carts])->render();
                $listcart = view('frontend/components/listcart', ['carts' => $carts])->render();
                return response()->json(['listcart' => $listcart, 'cartnotify'=>$cartnotify, 'code' => 200], 200);
            }
            return view('frontend/cart');
            
        
    
    }

    public function complete(CompleteRequest $completeRequest){
        $data['info'] = $completeRequest->all();
        $email = $completeRequest->email;
        $data['cart'] = session()->get('cart');
        $carts = session()->get('cart');
        
        //// tính tổng tiền
        $total = 0;
        foreach($carts as $cart){
            $total += $cart['qtt']*$cart['price'];
        }      
        // dd($carts);
        // Xử lý mailer

        Mail::send('frontend//email',$data, function($message) use ($email){
            $message->from('dohd2201@gmail.com', 'Ha Duy Do'); //Gửi từ mail nào đi
            $message->to($email, $email); //Mail nhận
            $message->cc('dotrung02022001@gmail.com','Ha Duy Do'); // gửi trả về mail chủ
            $message->subject('Xác nhận hóa đơn:');
        });

        // Xử lý order db
        
       if(count($carts)>0){
        $customer = new Customer;
        $customer->email = $completeRequest->email;
        $customer->fullname = $completeRequest->name;
        $customer->phone= $completeRequest->phone;
        $customer->address = $completeRequest->address;
        $customer->save(); 

        $bill = new Bill;
        $bill->customer_id = $customer->id;
        $bill->date_order = date("Y-m-d");
        $bill->status = 0;
        $bill->total = $total;
        $bill->save();
         
        foreach($carts as $key => $cart){
        $bill_detail = new Bill_Detail;
        $bill_detail->bill_id = $bill -> id;
        $bill_detail->product_id = $key;
        $bill_detail->qtt =$cart['qtt'] ;
        $bill_detail->price =$cart['price'];
        $bill_detail->save();      
        } 
       }
        
        return redirect('/success');
        
    }

    public function success(){
        return view('frontend/complete');
    }
}