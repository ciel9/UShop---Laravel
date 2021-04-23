@extends('frontEnd.layouts.master')
@section('title','My Account Page')
@section('slider')
@endsection
@section('content')
    <div class="container">       
        <legend>History Order</legend>
        <section id="cart_items">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($user_datas as $cart_data)    
                        <?php
                            $image_products=DB::table('products')->select('image')->where('id',$cart_data->products_id)->get();
                        ?>
                        <tr>
                            <td class="cart_product">
                                @foreach($image_products as $image_product)
                                    <a href=""><img src="{{url('products/small',$image_product->image)}}" alt="" style="width: 100px;"></a>
                                @endforeach
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{$cart_data->product_name}}</a></h4>
                                <p>{{$cart_data->product_code}} | {{$cart_data->size}}</p>
                            </td>
                            <td class="cart_price">
                                <p>Rp. {{ number_format($cart_data->price) }}</p>
                            </td>
                            <td class="cart_quantity">
                                <p>{{$cart_data->quantity}}</p>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price">Rp. {{ number_format($cart_data->price*$cart_data->quantity) }}</p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>

@endsection