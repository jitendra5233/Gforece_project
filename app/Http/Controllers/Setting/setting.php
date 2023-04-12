<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ace\UserModel;
use App\Models\Ace\SettingModel;
use App\Models\privacymodel;
use App\Models\Ace\Customize;

class setting extends Controller
{
  
        public function index(Request $req)
        {
            $result = Customize::orderBy('id', 'DESC')->take(1)->get();

            return view('content.Setting.setingaddupdate')->with('tableData',$result);

        }

        public function addupdatesetting(Request $req)
        {
            $data = new SettingModel;
            $id = $req->session()->get('id');
            
            if(!empty($req->file('photo')))
            {
            $file =$req->file('photo');  
            $filename = date('YmdHi').rand().$file->getClientOriginalName();
            $file->move('users/sitelogo', $filename);
            $result = SettingModel::where("id",$req->userid)->update([
                "siteTitle" => $req->siteTitle,
                "currency" => $req->currency,
                "userId" => $id,
                "siteLogo" => $filename
                ]);
            }



            else{
                $result = SettingModel::where("id",$req->userid)->update([
                    "siteTitle" => $req->siteTitle,
                    "currency" => $req->currency,
                    "userId" => $id
                    ]);   
                    
            }

             $result = SettingModel::where('id',$req->userid)->get();
            return redirect('/setting');
        }   


       public function UpdateHome(Request $req){
            $data = new Customize();

            $filename1 = $req->filename1;
            $filename2 = $req->filename2;
            
            if($req->file('file1')){
                $file1 = $req->file('file1');
                $filename1 = date('YmdHi').rand().$file1->getClientOriginalName();
                $file1->move('media/images', $filename1);
            }
            
            if($req->file('file2')){
                $file2 = $req->file('file2');
                $filename2 = date('YmdHi').rand().$file2->getClientOriginalName();
                $file2->move('media/images', $filename2);
            }

            $data->h1 = $req->h1;
            $data->s1 = $req->s1;
            $data->img1 = $filename1;
            $data->img2 = $filename2;
            $data->imglink1 = $req->imglink1;
            $data->imglink2 = $req->imglink2;
            $data->h2 = $req->h2;
            $data->s2 = $req->s2;
            $data->h3 = $req->h3;
            $data->s3 = $req->s3;

            $data->microtitle1 = $req->microtitle1;
            $data->microtitle2 = $req->microtitle2;

            $data->cardheading1 = $req->cardheading1;
            $data->cardheading2 = $req->cardheading2;

            $data->cardsubheading1 = $req->cardsubheading1;
            $data->cardsubheading2 = $req->cardsubheading2;

            $data->buttontext1 = $req->buttontext1;
            $data->buttontext2 = $req->buttontext2;

            $data->btnlink1 = $req->btnlink1;
            $data->btnlink2 = $req->btnlink2;
            
            $data->footer_desc = $req->footer_desc;
            $data->c_number = $req->c_number;
            $data->w_number = $req->w_number;
            
            $data->facebook =$req->facebook;
            $data->Twitter =$req->Twitter;
            $data->YouTube=$req->YouTube;
            $data->Instagram=$req->Instagram;
            
            $data->ameneties=$req->ameneties;
            
            $data->header_code = $req->header_code;
            $data->footer_code = $req->footer_code;
            
            $data->cUsEmail = $req->cUsEmail;
            $data->creersEmail = $req->creersEmail;
            
            $data->min_price_buy =$req->min_price_buy;
            $data->diff_val_buy =$req->diff_val_buy;
            $data->max_price_buy=$req->max_price_buy;
            $data->min_price_rent=$req->min_price_rent;
            $data->diff_val_rent=$req->diff_val_rent;
            $data->max_price_rent=$req->max_price_rent;
            
            
            $page_schema =trim($req->page_schema);
            
             $data->page_title=$req->page_title;
            $data->page_description=$req->page_description;
            $data->page_schema=$page_schema;
            
            
            $result = $data->save();
            
            return redirect('/setting');

        }
        
        public function getHomeData(){
                     $result = Customize::orderBy('id', 'DESC')->take(1)->get();
                     return $result;
        }
        
        public function getOtherData(){
         $result =  privacymodel::orderBy('id', 'DESC')->get()[0];
         return $result;
        }
        public function front_book(){
            return view('content.Appointment.frontendAppointment');
        }
        public function open_location(){
            return view('content.Map.Location');
        }
        
         public function privacy()
        {
           
            $result = privacymodel::orderBy('id', 'DESC')->get()[0]->privacy;
            return view('content.Setting.privacy')->with('tableData',$result);

        }
        
         public function term_condetion()
        {
            $result = privacymodel::orderBy('id', 'DESC')->get()[0]->term_condetion;
          
            return view('content.Setting.term_condetion')->with('tableData',$result);

        }
         public function who_we_are()
        {
            $result = privacymodel::orderBy('id', 'DESC')->get()[0]->who_we_are;
          
            return view('content.Setting.who_we_are')->with('tableData',$result);

        }
        
    public function updateprivacy(Request $req)

    {
         $id=1;
         $result =privacymodel::where('id',$id)->update(['privacy' =>$req->privacy]);
        return $result;
    }
       
     public function updateterm(Request $req)
    {
        $id=1;
        $result =privacymodel::where('id',$id)->update(['term_condetion' =>$req->term_condetion]);
        return $result;

    }
      public function updatewho(Request $req)

    {
        $id=1;
         $result =privacymodel::where('id',$id)->update(['who_we_are' =>$req->whoweare]);
        return $result;

    }
        
}