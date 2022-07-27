<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getCart() {
        $user = session()->get('customers_id');

        $order = DB::table('tr_orders')
            ->where('customers_id',$user)
            ->where('status','Draft')
            ->first();
        if ($order) {
            $detail = DB::table('tr_orders_detail')
                ->join('products','products.id','=','tr_orders_detail.products_id')
                ->join('m_size','m_size.id','=','tr_orders_detail.m_size_id')
                ->select('tr_orders_detail.*',
                    'products.product_code as product_code',
                    'products.product_name as product_name',
                    'products.product_photo as product_photo',
                    'm_size.name as size')
                ->where('tr_orders_id',$order->id)
                ->orderBy('tr_orders_detail.id','desc')
                ->get();
        }
        $data['order'] = $order;
        $data['detail'] = ($order?$detail:[]);

        return view('Frontend.pages.cart',$data);
    }

    public function getRemove($id, Request $request) {
        $user = session()->get('customers_id');
        $check = DB::table('tr_orders_detail')
            ->join('tr_orders','tr_orders.id','=','tr_orders_detail.tr_orders_id')
            ->where('customers_id',$user)
            ->where('tr_orders_detail.id',$id)
            ->select('tr_orders_detail.*','tr_orders.total_price as ttl_price')
            ->first();

        if ($check) {
            $up['total_price'] = $check->ttl_price - $check->price;
            DB::table('tr_orders')->where('id',$check->tr_orders_id)->update($up);
            DB::table('tr_orders_detail')->where('id',$id)->delete();
            return redirect()->back()->with(["message"=>"Berhasil menghapus"]);
        }

        return redirect()->back()->with(["message"=>"Anda tidak memiliki hak"]);
    }

    public function getCheckout() {
        $user = session()->get('customers_id');
        $user_data = DB::table('customers')->where('id',$user)->first();
        $order = DB::table('tr_orders')
            ->where('customers_id',$user)
            ->where('status','Draft')
            ->first();

        $data['order'] = $order;
        $data['user'] = $user_data;

        return view('Frontend.pages.billing',$data);
    }
    public function postCheckout(Request $request) {
        $user = session()->get('customers_id');

        $update['full_name'] = $request->full_name;
        $update['address'] = $request->address;
        $update['town'] = $request->town;
        $update['phone'] = $request->phone;
        $update['email_order'] = $request->email_order;
        $update['status'] = 'Checkout';

        $check = DB::table('tr_orders')->where('customers_id',$user)->where('status','Draft')->first();
        if ($check) {
            DB::table('tr_orders')->where('id',$check->id)->update($update);
            return redirect('/')->with(["message"=>"Berhasil melakukan pembelian"]);
        }
        return redirect()->back()->with(["message"=>"Anda tidak memiliki hak"]);
    }
}
