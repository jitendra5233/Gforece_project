<?php

namespace App\Http\Controllers\OpenClass;

use App\Http\Controllers\Controller;
use App\Models\gforce\OpenClassModel;
use Illuminate\Http\Request;
use App\Models\Gforce\Branch;

class OpenClass extends Controller
{
    public function index()
    {
        //This function Get all data from database and send it list view blade file

        $getAllOpenClass= OpenClassModel::all();
        foreach($getAllOpenClass as $row){
            $branch = Branch::where('id',$row->branchname)->get();
            if(count($branch) != 0){
                $row['branchName'] = $branch[0]->name;
            }else{
                $row['branchName'] = '';
            }
        }
        return view('content.Classes.allOpenClassView')->with('tableData',$getAllOpenClass);

    }


    public function openClassAdd()
    
    // This function is get all data from branch and redirect add open class blade file
    {
        $tableData = Branch::all();
        return view('content.Classes.addOpneClass')->with('tableData',$tableData);
    }

    public function openClassSubmit(Request $req)
    {
            // This function  save data in database 

            $file = $req->file('packagethumbmail');
            $packagethumbmail = date('YmdHi').rand().$file->getClientOriginalName();
            $file->move('OpneClassImages', $packagethumbmail);

            $file1 = $req->file('checkoutthumbmail');
            $checkoutthumbmail = date('YmdHi').rand().$file1->getClientOriginalName();
            $file1->move('OpneClassImages', $checkoutthumbmail);
            $data= new OpenClassModel;
            $page_schema =trim($req->page_schema);
            $data->classname = $req->classname;
            $data->page_title = $req->page_title;
            $data->page_description = $req->page_description;
            $data->page_schema = $page_schema;
            $data->branchname = $req->branchname;
            $data->scheduledate = $req->scheduledate;
            $data->scheduletime = $req->scheduletime;
            $data->facetofaceslot = $req->facetofaceslot;
            $data->zoomlink =$req->zoomlink;
            $data->regularrate = $req->regularrate;
            $data->advancepayment = $req->advancepayment;
            $data->description = $req->description;
            $data->packagethumbmail =$packagethumbmail;
            $data->checkoutthumbmail =$checkoutthumbmail;
            $data->status = $req->status;
            $res = $data->save();
            return $res;

    }

    public function editOpenClass($id)
    {
        // This function get data from database on behalf id and send it edit blade file
        $openClass = OpenClassModel::where('id',$id)->get();
        $branch = Branch::all();
        return view('content.Classes.editOpenClass')->with('openClass',$openClass[0])->with('branch',$branch); 

    }

    public function updateOpenClass(Request $req)
    {
                //This function get data from Edit blade file and update it database         

                $file = $req->file('packagethumbmail');
                if($file != ""){
                $packagethumbmail = date('YmdHi').rand().$file->getClientOriginalName();
                $file->move('OpneClassImages', $packagethumbmail); 
                $image_path = public_path("\OpneClassImages\\") .$req->oldpackagethumbmail;
                if (file_exists($image_path)) {
                @unlink($image_path);
                }
                }

                else{
                $packagethumbmail =$req->oldpackagethumbmail;
                }


                $file1 = $req->file('checkoutthumbmail');
                if($file1 != ""){
                $checkoutthumbmail = date('YmdHi').rand().$file1->getClientOriginalName();
                $file1->move('OpneClassImages', $checkoutthumbmail); 
                $image_path = public_path("\OpneClassImages\\") .$req->oldcheckoutthumbmail;
                if (file_exists($image_path)) {
                @unlink($image_path);
                }
                }

                else{
                $checkoutthumbmail =$req->oldcheckoutthumbmail;
                }
                
                $page_schema =trim($req->page_schema);
                $result = OpenClassModel::where("id",$req->proid)->update([

                    "classname"=>$req->classname,
                    
                    "page_title" =>$req->page_title,
                    
                    "page_description" =>$req->page_description,
                    
                    "page_schema" =>$page_schema,

                    "description"=> $req->description,

                    "branchname"=> $req->branchname,

                    "facetofaceslot" => $req->facetofaceslot,
                    "zoomlink" => $req->zoomlink,

                    "scheduledate" => $req->scheduledate,

                    "scheduletime"=> $req->scheduletime,

                    "regularrate"=> $req->regularrate,

                    "advancepayment" => $req->advancepayment,

                    "packagethumbmail"=>$packagethumbmail,

                    "checkoutthumbmail"=>$checkoutthumbmail,

                    "status"=>$req->status,
                  ]); 
            
               return $result;

    }

    public function deleteOpenClass(Request $req)
    { 
        //This function get delete data from database  on behalf of id

        $openclass=OpenClassModel::where('id',$req->id)->get()[0];
        $image_path = public_path("\OpneClassImages\\") . $openclass->packagethumbmail;
        if (file_exists($image_path)) {
        @unlink($image_path);
        }

        $checkoutthumbmail = public_path("\OpneClassImages\\") . $openclass->checkoutthumbmail;
        if (file_exists($checkoutthumbmail)) {
        @unlink($checkoutthumbmail);
        }
        $project=OpenClassModel::where('id',$req->id)->delete();
         return $project;

    }

    public function openClassView($id)
    {    
        // This function get data from database and send it details balde file
         
        $branch = Branch::all();
        $openClass = OpenClassModel::where('id',$id)->get();
        return view('content.Classes.viewOpenClass')->with('openClass',$openClass[0])->with('branch',$branch);  

    }

}
