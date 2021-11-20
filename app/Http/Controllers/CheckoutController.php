<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
    public function add_customer(Request $request)
    {
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

    public function checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '0')->orderby('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '0')->orderby('brand_id', 'desc')->get();
        return view('pages.checkout.show_checkout')->with('brand', $brand_product)
            ->with('category', $cate_product);;
    }
    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->name;
        $data['shipping_phone'] = $request->phone;
        $data['shipping_email'] = $request->email;
        $data['shipping_address'] = $request->address;
        $data['shipping_notes'] = $request->notes;

        $shippingId = DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id', $shippingId);

        return Redirect('/payment');
    }
    public function payment()
    {
        echo 'ok';
    }
    public function logout_checkout()
    {
        Session::flush();
        return Redirect('/login-checkout');
    }
    public function login_customer(Request $request)
    {
        $email = $request->username_customer;
        $password = md5($request->password_customer);

        $result = DB::table('tbl_customers')
            ->where('customer_email', $email)
            ->where('customer_password', $password)->first();

        if ($result) {
            Session::put('customer_id', $result->customer_id);
            return Redirect('/checkout');
        } else {
            return Redirect('/login-checkout');
            Session::put('message', 'Sai tài khoản hoặc mật khẩu');
        }

    }
}