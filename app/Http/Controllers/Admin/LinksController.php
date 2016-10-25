<?php

namespace App\Http\Controllers\Admin;

use App\Http\model\Links;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LinksController extends CommonController
{
    //AIzaSyDaktNKzfqF7-s8n4OypkwfOgkIK_xZm9E
    //get admin/links   all links
    public function index()
    {
        $data = Links::orderBy('link_order', 'asc')->get();
//        dd($data);
        return view('admin.links.index', compact('data'));
    }

    public function changeOrder()
    {

        $input = Input::all();
        $links = Links::find($input['link_id']);
        $links->link_order = $input['link_order'];
        $re = $links->update();

        if($re){
            $data = [
                'status' => 0,
                'msg' => 'Update Successfully',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => 'Update failed, try again later！',
            ];
        }

        return $data;
    }

    //get admin/link/{link}    show the info of a single category
    public function show()
    {

    }

    //get admin/links/create  add a link
    public function create()
    {
//        $data = Category::where('cate_pid', 0)->get();
        return view('admin/links/add');
    }

    //post admin/list submit link
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'link_name'=>'required',
            'link_url'=>'required',
        ];

        $message = [
            'link_name.required'=>'Link Name Is Required！',
            'link_url.required'=>'Link Url Is Required！',
        ];


        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Links::create($input);
            if($re){
                return redirect('admin/links');
            }else{
                return back()->with('errors','Failed, Try again later！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get admin/category/{category}/edit  edit a single category
    public function edit($link_id)
    {
        $field = Links::find($link_id);
//        $data = Links::where('link_id', 0)->get();
        return view('admin.links.edit', compact('field'));
    }


    //put admin/category/{category}     update a single category
    public function update($link_id)
    {
        $input = Input::except('_token', '_method');
        $re = Links::where('link_id', $link_id)->update($input);
        if($re)
        {
            return redirect('admin/links');
        }
        else{
            return back()->with('errors', 'Update Failed');
        }
    }

    //destroy admin/links/{link}  delete a single link
    public function destroy($link_id)
    {
//        Category::where('link_id', $link_id)->update(['link_id' => 0]);
        $re = Links::where('link_id',$link_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => 'Delete Completed!',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => 'Delete FAILED!',
            ];
        }

        return $data;
    }
}
