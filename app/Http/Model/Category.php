<?php

namespace App\http\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    protected $guarded = [];
    
    public function get_class_tree($id,$all_class,&$class_tree,$seperator){
        $seperator .= '━';
        foreach ($all_class as $class){
            if($class['cate_pid']==$id){
                $new_node = array("cate_id"=>$class['cate_id'],
                    "cate_pid"=>$class['cate_pid'],
                    "cate_order"=>$class['cate_order'],
                    "cate_title"=>$class['cate_title'],
                    "cate_view"=>$class['cate_view'],
                    "cate_name"=>$class['cate_name'],
                    'seperator'=>$seperator);
                array_push($class_tree,$new_node);
                $this->get_class_tree($class['cate_id'], $all_class, $class_tree, $seperator);
            }
        }
        return;
    }
    public function tree(){
        $category = Category::orderBy('cate_order','asc')->get();
        $class_tree = array();
        $this->get_class_tree('0',$category,$class_tree,'|');
        return $class_tree;
    }
    public function class_set($id){
        $all_class = Category::orderBy('cate_order','asc')->get();
        $class_set = [$id];
        $this->get_class_set($id, $all_class, $class_set);
        return $class_set;
    }
    public function get_class_set($id, $all_class, &$class_set){
        foreach ($all_class as $class){
            if ($class['cate_pid']==$id){
            array_push($class_set,$class['cate_id']);
            $this->get_class_set($class['cate_id'], $all_class, $class_set);
        }
    }
    return;
  }
  public function get_cate_set($id, $all_class, &$cate_set){
      foreach ($all_class as $class){
          if ($class['cate_pid']==$id){
              array_push($cate_set,$class['cate_id']);
              $this->get_cate_set($class['cate_id'], $all_class, $cate_set);
          }
      }
      return;
  }
}
