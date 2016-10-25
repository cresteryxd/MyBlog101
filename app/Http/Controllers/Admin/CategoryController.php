<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends CommonController
{
    //get admin/category   all category list
    public function index()
    {
        $categorys = (new Category)->tree();

        return view('admin.category.index')->with('data', $categorys);
    }

    /**
     * @return array
     */
    public function changeOrder()
    {
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();

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



    //post admin/category
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'cate_name'=>'required',
        ];

        $message = [
            'cate_name.required'=>'Category Name Is Required！',
        ];


        $validator = Validator::make($input,$rules,$message);

        if($validator->passes()){
            $re = Category::create($input);
            if($re){
                return redirect('admin/category');
            }else{
                return back()->with('errors','Failed, Try again later！');
            }
        }else{
            return back()->withErrors($validator);
        };
    }



    //get admin/category/create  add a category
    public function create()
    {
        $data = Category::where('cate_pid', 0)->get();
        return view('admin/category/add', compact('data'));
    }

    //get admin/category/{category}/edit  edit a single category
    public function edit($cate_id)
    {
        $field = Category::find($cate_id);
        $data = Category::where('cate_pid', 0)->get();
        return view('admin.category.edit', compact('field', 'data'));
    }


    //put admin/category/{category}     update a single category
    public function update($cate_id)
    {
        $input = Input::except('_token', '_method');
        $re = Category::where('cate_id', $cate_id)->update($input);
        if($re)
        {
            return redirect('admin/category');
        }
        else{
            return back()->with('errors', 'Update Failed');
        }
    }



    //get admin/category/{category}    show the info of a single category
    public function show()
    {

    }

    //destroy admin/category/{category}  delete a single category
    public function destroy($cate_id)
    {
        Category::where('cate_pid', $cate_id)->update(['cate_pid' => 0]);
        $re = Category::where('cate_id',$cate_id)->delete();
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
