<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdduserRequest;
use App\Http\Requests\EdituserRequest;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

session_start();

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy("id", "DESC")->paginate(5);
        return view("backend/users/listuser",["users"=>$users]);
    }

    public function create(){
        return view("backend/users/adduser");
        
    }

    public function store(AdduserRequest $AdduserRequest ){ 
        $user = new User;
        $user -> fullname = $AdduserRequest->fullname;
        $user -> email = $AdduserRequest->email;
        $user -> password = bcrypt($AdduserRequest->password);
        $user -> phone = $AdduserRequest->phone;
        $user -> address = $AdduserRequest->address;
        $user -> level = $AdduserRequest->level;
        $user->save();
        session()->flash("message","Thêm thành viên thành công !");
        return redirect("/admin/user");
    }

    public function edit($id){
        $user = User::find($id);
        return view("backend/users/edituser", ["user" => $user]);
    }

    public function update(EdituserRequest $EdituserRequest, $id){
        $user = new User;
        $arr['email'] = $EdituserRequest->email;
        $arr['fullname'] = $EdituserRequest->fullname;
        $arr['password'] = bcrypt($EdituserRequest->password);
        $arr['phone'] = $EdituserRequest->phone;
        $arr['address'] = $EdituserRequest->address;
        $arr['level'] = $EdituserRequest->level;
        $user::where("id", $id)->update($arr);
        session()->flash("message","Sửa thành viên thành công !");
        return redirect("admin/user");

        // return view("backend/user/edituser");
    }

    public function delete($id){
        User::destroy($id);
        session()->flash("message","Xóa thành viên thành công !");
        return back();
    }
}