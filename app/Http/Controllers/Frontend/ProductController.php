<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public static function getIndex()
    {
        $data['page_title'] = 'Product Page';
        $data['active'] = 'product';
        $data['products'] = DB::table('products')->paginate(8);

        return view('Frontend.pages.product',$data);
    }

    public static function getDetail($id)
    {
        $data['page_title'] = 'Product Detail';
        $data['active'] = 'product';
        $data['product'] = DB::table('products')->where('id',$id)->first();
        $data['size'] = DB::table('m_size')->get();

        return view('Frontend.pages.product_detail',$data);
    }

    public static function postOrder(Request $request) {

        $check = DB::table('tr_orders')->where('customers_id', session()->get('customers_id'))->where('status','Draft')->first();
        $id = 0;
        $find = DB::table('products')->where('id',$request->id_product)->first();
        if (!$check) {
            $new['code_transaction'] = 'ORDER-'.time();
            $new['customers_id'] = session()->get('customers_id');
            $new['status'] = 'Draft';
            $new['created_at'] = date('Y-m-d H:i:s');

            DB::table('tr_orders')->insert($new);

            $id = DB::getPdo()->lastInsertId();
        }
        $id = ($check?$check->id:$id);
        $detail['tr_orders_id'] = $id;
        $detail['products_id'] = $find->id;
        $detail['m_size_id'] = $request->size;
        $detail['price'] = $find->product_price;
        $detail['created_at'] = date('Y-m-d H:i:s');

        DB::table('tr_orders_detail')->insert($detail);

        $update['total_price'] = ($check?$check->total_price:0) + $find->product_price;
        DB::table('tr_orders')->where('id',$id)->update($update);

        return redirect()->back()->with(["message"=>"Berhasil menambahkan barang"]);
    }
}
