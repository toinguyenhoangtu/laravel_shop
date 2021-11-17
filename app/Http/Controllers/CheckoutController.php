<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        //$all_product = DB::table('tbl_product')->where('product_status', '0')->orderby('product_id', 'desc')->limit(4)->get();

        return view('pages.checkout.login_checkout')
            ->with('brand', $brand_product)
            ->with('category', $cate_product);
    }
    public function add_customer(Request $request){
        $data = array();
        $data['customer_name'] = $request->name;
        $data['customer_phone'] = $request->phone;
        $data['customer_email'] = $request->email;
        $data['customer_password'] = md5($request->password);

        $customerId = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id', $customerId);
        Session::put('customer_name', $request->customer_name);
        return Redirect('/checkout');

    }
    public function checkout(){

    }
}