<?php

namespace App\Http\Controllers;

use App\Cart_model;
use App\Orders_model;
use App\History_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index(){
        $session_id=Session::get('session_id');
        $cart_datas=Cart_model::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        $shipping_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();

        return view('checkout.review_order',compact('shipping_address','cart_datas','total_price'));
    }
    public function order(Request $request){
        $input_data=$request->all();
        $payment_method=$input_data['payment_method'];
        Orders_model::create($input_data);
        if($payment_method=="COD"){
            return redirect('/cod');
        }else{
            return redirect('/paypal');
        }
    }
    public function cod(){
        $session_id=Session::get('session_id');
        $user_order=Orders_model::where('users_id',Auth::id())->first();

        $user_datas = Cart_model::where('session_id',$session_id)->get();

        foreach($user_datas as $cart_data){
            DB::table('history')->insert(['id' => $cart_data->id, 'products_id'=>$cart_data->products_id, 'product_name' => $cart_data->product_name, 'product_code' => $cart_data->product_code, 'product_color'=>$cart_data->product_color, 'size'=>$cart_data->size, 'price'=>$cart_data->price, 'quantity'=>$cart_data->quantity, 'user_email'=>$cart_data->user_email, 'session_id'=>$cart_data->session_id, 'created_at'=>$cart_data->created_at]);
        }
        return view('payment.cod',compact('user_order','user_datas'));
    }
    public function paypal(Request $request){
        $who_buying=Orders_model::where('users_id',Auth::id())->first();
        $session_id=Session::get('session_id');
        $user_datas = Cart_model::where('session_id',$session_id)->get();
        foreach($user_datas as $cart_data){
            DB::table('history')->insert(['id' => $cart_data->id, 'products_id'=>$cart_data->products_id, 'product_name' => $cart_data->product_name, 'product_code' => $cart_data->product_code, 'product_color'=>$cart_data->product_color, 'size'=>$cart_data->size, 'price'=>$cart_data->price, 'quantity'=>$cart_data->quantity, 'user_email'=>$cart_data->user_email, 'session_id'=>$cart_data->session_id, 'created_at'=>$cart_data->created_at]);
        }

        return view('payment.paypal',compact('who_buying', 'user_datas'));
    }

    public function history(){

        $session_id=Session::get('session_id');
        $user_datas=History_model::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($user_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        $history=DB::table('history')->where('user_email',Auth::id())->first();
        

        return view('checkout.history',compact('history','user_datas','total_price'));

    }
}
