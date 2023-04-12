<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project\ProjectModel;
use App\Models\Ace\UserModel;
use App\Models\Project\PropetyModel;
use App\Models\Project\SubProject;
use App\Models\Ace\PropertyTypeModel;
use App\Models\Ace\PropertyStatusModel;
use App\Models\Ace\FeatureModel;
use App\Models\Ace\MediaModel;

class Search extends Controller
{

 public function index(Request $req)
{
    $project = ProjectModel::where('name', 'Like', '%' . $req->term . '%')->get();
    $property = PropetyModel::where('name', 'Like', '%' . $req->term . '%')->get();
    if(!empty($project || $property))
    {
        foreach($project as $row)
        {
            $row['type']='project';
            $row['imageurl']=MediaModel::where('id',$row->image)->get()[0]->url;
        }
        foreach($property as $row)
        {
            $row['type']='property';
        }
        $result = $project->merge($property);
        return $result; 
    }
    else{
        return ('okay');
        $result=0;
        return $result;
    }
    

}
public function Getpropertydata($id)
{
    $property = PropetyModel::where('id',$id)->get()[0];
    $agents = UserModel::where('id',$property->userId)->get()[0];
    $project = ProjectModel::where('id',$property->typeId)->get()[0];
    // $subproject = SubProject::where('id',$property->categoryId)->get()[0];
    $subprojectcount = SubProject::where('id',$property->categoryId)->count();
    if($subprojectcount != 0){
        $subproject = SubProject::where('id',$property->categoryId)->get()[0];
    }else{
        $subproject = [];
    }
    
    $propertyTypes = PropertyTypeModel::where('id',$property->propertytypeId)->get()[0];
    $properystatus = PropertyStatusModel::where('id',$property->propertyListingStatus)->get()[0];
        return view('content.Search.Search')->with('propertyTypes',$propertyTypes)->with('project',$project)->with('properystatus',$properystatus)->with('subproject',$subproject)->with('property',$property)->with('agents',$agents);

}

}
