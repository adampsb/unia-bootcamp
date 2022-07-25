<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class SizeController extends Controller
{
    //
    public function getIndex(Request $request) {
        $search = $request->get('search');
        $data['title'] = 'List Size';
        $data['size'] = DB::table('m_size')
            ->where(function ($q) use ($search) {
                if (isset($search)) {
                    $q->where('name','like','%'.$search.'%');
                }
            })->paginate(10);
        return view('backend.page.m_size.index',$data);
    }
    public function getAdd() {
        $data['title'] = 'Add Size';

        return view('backend.page.m_size.add',$data);
    }
    public function postAddSave(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $save['name'] = $request->get('name');

        DB::table('m_size')->insert($save);

        return redirect('admin/size')->with(["message"=>"Success Simpan"]);
    }

    public function getEdit($id) {
        $data['title'] = 'Edit Size';
        $data['row'] = DB::Table('m_size')->where('id',$id)->first();

        return view('backend.page.m_size.edit',$data);
    }

    public function postEditSave(Request $request,$id) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $save['name'] = $request->get('name');

        DB::table('m_size')->where('id',$id)->update($save);

        return redirect('admin/size')->with(["message"=>"Success Simpan"]);
    }

    public function getDetail($id) {
        $data['title'] = "Detail Size";
        $data['row'] = DB::Table('m_size')->where('id',$id)->first();

        return view('backend.page.m_size.detail',$data);
    }

    public function getDetele($id) {
        DB::Table('m_size')->where('id',$id)->delete();

        return redirect()->back()->with(["message"=>"Success Hapus"]);
    }
}
