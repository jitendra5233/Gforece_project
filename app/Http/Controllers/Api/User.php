<?php

namespace App\Http\Controllers\Api;

use Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ace\UserModel;
use App\Models\Project\ProjectModel;
use App\Models\Project\SubProject;
use App\Models\Project\PropetyModel;
use App\Models\Ace\BlogModel;
use App\Models\Ace\Customize;

class User extends Controller
{

    public function Index(Request $req)
    {
     $user = UserModel::where('id',$req->id)->get();
     if($user[0]->status == 1)
     {
        $i='0';
        $result = UserModel::where("id",$user[0]->id)->update([
            "status" => $i
            ]); 
            return $result=0;
     }
     if($user[0]->status == 0)
     {
        $i='1';
        $result = UserModel::where("id",$user[0]->id)->update([
            "status" => $i
            ]); 
            return $result=1;
     }

    }

    public function changeprojectstatus(Request $req)
    {


     $project = ProjectModel::where('id',$req->id)->get();
     if($project[0]->status == 1)
     {
        $i='0';
        $result = ProjectModel::where("id",$project[0]->id)->update([
            "status" => $i
            ]); 
            return $result=0;
     }
     if($project[0]->status == 0)
     {
        $i='1';
        $result = ProjectModel::where("id",$project[0]->id)->update([
            "status" => $i
            ]); 
            return $result=1;
     }

    }

    public function changesubprojectstatus(Request $req)
    {

     $subproject = SubProject::where('id',$req->id)->get();
     if($subproject[0]->status == 1)
     {
        $i='0';
        $result = SubProject::where("id",$subproject[0]->id)->update([
            "status" => $i
            ]); 
            return $result=0;
     }
     if($subproject[0]->status == 0)
     {
        $i='1';
        $result = SubProject::where("id",$subproject[0]->id)->update([
            "status" => $i
            ]); 
            return $result=1;
     }

    }

    public function changepropertystatus(Request $req)
    {

        $property = PropetyModel::where('id',$req->id)->get();
        if($property[0]->status == 1)
        {
           $i='0';
           $result = PropetyModel::where("id",$property[0]->id)->update([
               "status" => $i
               ]); 
               return $result=0;
        }
        if($property[0]->status == 0)
        {
           $i='1';
           $result = PropetyModel::where("id",$property[0]->id)->update([
               "status" => $i
               ]); 
               return $result=1;
        }    

    }

    public function changeblogstatus(Request $req)
    {

        $blog = BlogModel::where('id',$req->id)->get();
        if($blog[0]->status == 1)
        {
           $i='0';
           $result = BlogModel::where("id",$blog[0]->id)->update([
               "status" => $i
               ]); 
               return $result=0;
        }
        if($blog[0]->status == 0)
        {
           $i='1';
           $result = BlogModel::where("id",$blog[0]->id)->update([
               "status" => $i
               ]); 
               return $result=1;
        }    


    } 


    public function sendcontactmail(Request $req) {
         $result = Customize::orderBy('id', 'DESC')->take(1)->get();
         foreach($result as $row)
         {
           $contactmail=$row->cUsEmail;  
         }
         
         
        $email=$contactmail;
        $message="
              
        Hello, 
    
        This Query is Coming From Contact Us form  And Client Name - ". $req->name."  And Client Email  - ". $req->email." 
        And Client Phone - ".$req->phone."  And Client Message - ".$req->message.".
    
    
        The Ace Capital  Team
        ";
      $result=mail($email,"Query Coming From Contact Us Form",$message); 
    
      return $result;
    }



public function sendcareermail(Request $req)
{

    $data["email"] = "info@nrx.sag.mybluehost.me";
    $data["title"] = "Mail from Career Page With Attachment";
    $data["name"]  = $req->name;
    $data["cemail"]  = $req->email;
    $data["phone"]  = $req->phone;
    $data["cmessage"]  = $req->message;
    $file = $req->file('file');
    $filename =$file->getClientOriginalName();
    $path=public_path('attachments');
    $files= $file->move($path,$filename);
  
        
    //     return 1;

         $message="
              
         Hello, 
    
          This Query is Coming From Contact Us form  And Client Name - ". $req->name."  And Client Email  - ". $req->email." 
          And Client Phone - ".$req->phone."  And Client Message - ".$req->message."
    
    
        The Ace Capital  Team ";
        
      $result=mail("jitendra.techies@gmail.com","Query Coming From Contact Carrer Page",$message); 
    
        Mail::send('mail.Test_mail',$data, function($message)use($data, $files) {
        $message->to($data["email"])->subject($data["cemail"]);
        $message->attach($files);
        });
        
      return $result;
   
}
}
