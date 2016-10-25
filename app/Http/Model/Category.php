<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    protected $guarded=[];

    public function tree()
    {
        $categorys = $this->orderBy('cate_order', 'asc')->get();
        return $this->getTree($categorys, 'cate_id', 'cate_pid', 0);
    }

    public function getTree($data, $field_id, $field_pid, $pid)
    {
        $arr = array();
        foreach ($data as $k=>$v){
            if($v->$field_pid == $pid){
                $data[$k]["_cate_name"] = $data[$k]["cate_name"];
                $arr[] = $data[$k];

                foreach ($data as $m=>$n)
                {
                    if($n->$field_pid == $v->$field_id){
                        $data[$m]["_cate_name"] =' ◤ '.$data[$m]["cate_name"];
                        $arr[] = $data[$m];
                    }
                }
            }
        }

        return $arr;
    }


}
