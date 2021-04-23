<?php

namespace App\Http\Controllers;

use App\History_model;
use App\ProductAtrr_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HistoryController extends Controller
{
    // public function index(){
    //     $session_id=Session::get('session_id');
    //     $user_datas=History_model::where('session_id',$session_id)->get();
    //     $total_price=0;
    //     foreach ($user_datas as $cart_data){
    //         $total_price+=$cart_data->price*$cart_data->quantity;
    //     }
    //     return view('checkout.history',compact('user_datas','total_price'));
    // }
}
