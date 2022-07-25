<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function view;

class HomeController extends Controller
{
    public static function getIndex()
    {
        $data['page_title'] = 'Home Page';
        $data['active'] = 'home';
        $data['products'] = DB::table('products')->take(4)->get();
        return view('Frontend.pages.index',$data);
    }
}
