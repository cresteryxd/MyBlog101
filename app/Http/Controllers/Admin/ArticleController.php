<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    //get admin/article  article list
    public function index()
    {
        $data = Article::orderBy('art_id', 'asc')->paginate(6);
//        dd($data->links());
        return view('admin.article.index', compact('data'));
    }

    //get.admin/article/create   添加文章
    public function create()
    {
        $data = (new Category)->tree();
        return view('admin.article.add',compact('data'));
    }

    //post admin/article   new article submit
    public function store()
    {
        $input = Input::all();
        $input['art_time'] = time();

        $rules = [
            'art_title'=>'required',
            'art_content'=>'required',
        ];

        $message = [
            'art_title.required'=>'art_title Is Required！',
            'art_content.required'=>'art_content Is Required！',
        ];

        $validator = Validator::make($input,$rules,$message);

        if($validator->passes())
        {
            $re = Article::create($input);
            if($re)
            {
                return redirect('admin/article');
            }
            else{
                return back()->with('errors', 'Failed create article');
            }
        }
        else
        {
            return back()->withErrors($validator);
        }

    }

    //get admin/article/{article}/edit  edit a article
    public function edit($art_id)
    {
        $data = (new Category)->tree();
        $field = Article::find($art_id);
//        dd($field);
        return view('admin.article.edit',compact('data', 'field'));
    }

    //put.admin/article/{article}     update a article
    public function update($art_id)
    {
        $input = Input::except('_token', '_method');
        $re = Article::where('art_id', $art_id)->update($input);
        if($re)
        {
            return redirect('admin/article');
        }
        else{
            return back()->with('errors', 'Update Failed');
        }
    }

    //destroy admin/article/{article}  delete a single article
    public function destroy($art_id)
    {
//        Article::where('art_pid', $art_id)->update(['art_pid' => 0]);
        $re = Article::where('art_id',$art_id)->delete();
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
