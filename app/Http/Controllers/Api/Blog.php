<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ace\BlogModel;
use App\Models\Ace\BlogCategoryModel;
use App\Models\Ace\MediaModel;

class Blog extends Controller
{
    public function getAllBlogs(){
        $result=BlogModel::orderBy('id', 'DESC')->where('status',1)->get();
        foreach($result as $row){
            $row['url'] = MediaModel::where('id',$row['image'])->get()[0]->url;
            
                if(BlogCategoryModel::where('id',$row['categoryId'])->count() != 0){
                    $row['categoryName'] = BlogCategoryModel::where('id',$row['categoryId'])->get()[0]->name;
                }else{
                    $row['categoryName'] = 'No Category';
                }
        }
        return $result;
    }

    public function getAllBlogsC(){
        $result  = BlogCategoryModel::all();
        foreach($result as $row){
            $row['no'] = BlogModel::where('categoryId',$row['id'])->count();
        }
        return $result;
    }

    public function getAllBlogsSingle(Request $req){
        $result  = BlogModel::where('id',$req->id)->get();
        foreach($result as $row){
            $row['url'] = MediaModel::where('id',$row['image'])->get()[0]->url;
        }
        return $result;
    }
}
