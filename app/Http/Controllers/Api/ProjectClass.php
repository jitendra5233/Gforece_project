<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gforce\ProjectClassModel;
use App\Models\gforce\OpenClassModel;
use App\Models\gforce\WorkshopModel;
use App\Models\gforce\TrainerModel;





class ProjectClass extends Controller
{
    public function changeProjectClassStatus(Request $req){


        
        $projectClass = ProjectClassModel::where('id',$req->id)->get();
   
        if($projectClass[0]->status == 1)
        {
           $i='0';
           $result=ProjectClassModel::where("id",$projectClass[0]->id)->update([
               "status" => $i
               ]); 
               return $result=0;
        }

        if($projectClass[0]->status == 0)
        {
           $i='1';
           $result=ProjectClassModel::where("id",$projectClass[0]->id)->update([
               "status" => $i
               ]); 
               return $result=1;
        }

   
   }



   public function changeOpenClassStatus(Request $req){


        
    $openclass = OpenClassModel::where('id',$req->id)->get();

    if($openclass[0]->status == 1)
    {
       $i='0';
       $result=OpenClassModel::where("id",$openclass[0]->id)->update([
           "status" => $i
           ]); 
           return $result=0;
    }

    if($openclass[0]->status == 0)
    {
       $i='1';
       $result=OpenClassModel::where("id",$openclass[0]->id)->update([
           "status" => $i
           ]); 
           return $result=1;
    }
}

    public function changeWorkshopStatus(Request $req)
    {
        $workshop = WorkshopModel::where('id',$req->id)->get();

        if($workshop[0]->status == 1)
        {
        $i='0';
        $result=WorkshopModel::where("id",$workshop[0]->id)->update([
            "status" => $i
            ]); 
            return $result=0;
        }

        if($workshop[0]->status == 0)
        {
        $i='1';
        $result=WorkshopModel::where("id",$workshop[0]->id)->update([
            "status" => $i
            ]); 
            return $result=1;
        } 
        
    }

    public function changeTrainerStatus(Request $req)
    {
        $trainer = TrainerModel::where('id',$req->id)->get();

        if($trainer[0]->status == 1)
        {
        $i='0';
        $result=TrainerModel::where("id",$trainer[0]->id)->update([
            "status" => $i
            ]); 
            return $result=0;
        }

        if($trainer[0]->status == 0)
        {
        $i='1';
        $result=TrainerModel::where("id",$trainer[0]->id)->update([
            "status" => $i
            ]); 
            return $result=1;
        } 
        
    }

    

}