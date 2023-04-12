<?php



namespace App\Http\Controllers\ProjectClass;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Ace\RoleModel;

use App\Models\Gforce\ProjectClassModel;

use App\Models\Gforce\PackagesModel;

use App\Models\Ace\UserModel;

use App\Models\Ace\MediaModel;
use App\Models\Gforce\Branch;





use Session;



class ProjectClass extends Controller

{
    //This function get data from databse and send it List balde file 

    public function projectAllClassView(){

        $data = ProjectClassModel::orderBy('id', 'DESC')->get();
        foreach($data as $row){
            $branch = Branch::where('id',$row->branchname)->get();
            if(count($branch) != 0){
                $row['branchName'] = $branch[0]->name;
            }else{
                $row['branchName'] = '';
            }
        }
        return view('content.Classes.projectClassAll')->with('tableData',$data)->with('branch',$branch);

    }



    public function projectClassAdd(){

          //This get data from database and redirect it add blade file

        $tableData = Branch::all();
        return view('content.Classes.addProjectClass')->with('tableData',$tableData);
    }



    public function projectClassSubmit(Request $req){
            
        // This function is save data in database that are get from add blade file
            $file = $req->file('imgArr');
            $filename = date('YmdHi').rand().$file->getClientOriginalName();
            $file->move('ProjectClassImages', $filename);        
            $data = new ProjectClassModel;
            $page_schema =trim($req->page_schema);
            $data->name = $req->name;
            $data->page_title = $req->page_title;
            $data->page_description = $req->page_description;
            $data->page_schema = $page_schema;
            $data->branchname = $req->branchname;
            $data->bacthname = $req->bacthname;
            $data->starttime = $req->starttime;
            $data->endtime = $req->endtime;
            $data->regularrate = $req->regularrate;
            $data->advancepayment = $req->advancepayment;
            $data->gtreat = $req->gtreat;
            $data->slots = $req->slots;
            $data->description = $req->description;
            $data->classimg =$filename;
            $data->status = $req->status;
            $res = $data->save();

          return $res;

    }



    public function projectClassView($id){
       // This function get data from data base on behalf of requested Id send it details blade file 
        $branch = Branch::all();
        $projectClass = ProjectClassModel::where('id',$id)->get();
        return view('content.Classes.projectClassView')->with('projectClass',$projectClass[0])->with('branch',$branch); 

    }





    public function deleteProjectClass(Request $req)
    {
        // This function is delete data from database on behalf of requested Id

        $projectclass=ProjectClassModel::where('id',$req->id)->get()[0];
        $image_path = public_path("\ProjectClassImages\\") . $projectclass->classimg;
        if (file_exists($image_path)) {
        @unlink($image_path);
        }
        $project=ProjectClassModel::where('id',$req->id)->delete();
         return $project;
    }

    public function editClassProject($id)

    {
        // This function get deta from database on behalf of requested id and redirect it Edit blade file 

        $projectClass = ProjectClassModel::where('id',$id)->get();
        $branch = Branch::all();
        return view('content.Classes.editClassProject')->with('projectClass',$projectClass[0])->with('branch',$branch); 

    }



    public function updateClassProject(Request $req)
    {

              //This function update in database on b that are get from edit blade file
                $file = $req->file('imgArr');
                if($file != ''){
                    $filename = date('YmdHi').rand().$file->getClientOriginalName();
                    $file->move('ProjectClassImages', $filename); 
                    $image_path = public_path("\ProjectClassImages\\") .$req->oldimgArr;
                    if (file_exists($image_path)) {
                        @unlink($image_path);
                     }
                }

                else{
                    $filename =$req->oldimgArr;
                }
                
                $page_schema =trim($req->page_schema);
                $result = ProjectClassModel::where("id",$req->proid)->update([
                    "name"=>$req->name,
                    "page_title" =>$req->page_title,
                    "page_description" =>$req->page_description,
                    "page_schema" =>$page_schema,
                    "description"=> $req->description,
                    "branchname"=> $req->branchname,
                    "bacthname" => $req->bacthname,
                    "starttime" => $req->starttime,
                    "endtime"=> $req->endtime,
                    "regularrate"=> $req->regularrate,
                    "advancepayment" =>$req->advancepayment,
                    "gtreat" => $req->gtreat,
                    "slots" => $req->slots,
                    "classimg"=>$filename,
                    "status"=>$req->status,

            ]); 

            return $result; 

    }



}
