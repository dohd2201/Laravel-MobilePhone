<?php

namespace App\Http\Controllers\Admin\Order;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\Bill_Detail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Bill::where('status', 0)->paginate(10);
        // dd($orders);
        return view('backend/orders/order', ['orders'=> $orders ]);
    }

    public function processed(){
        $orders = Bill::where('status', 1)->paginate(10);
        return view('backend/orders/processed', ['orders'=> $orders ]);
    }

    public function detail($id){
        $order = Bill::find($id);
        $details = Bill_Detail::where('bill_id', $id)->get();
        // dd($details[1]->product->image);
        // dd($details);
        return view('backend/orders/detailorder', ['order'=> $order, 'details' => $details ]);
    }

    
    public function postdetail(Request $request,$id){
        $old_order = Bill::find($id);
       if($request){
        $order = new Bill;
        $arr['date_order'] = $old_order->date_order;
        $arr['status'] = 1;
        $arr['total'] = $old_order->total;
        $arr['customer_id'] = $old_order->customer_id;
        $order::where("id", $id)->update($arr);
        session()->flash("message","Xử lý đơn thành công !");
               
       }
       return redirect("admin/order");
    }
}