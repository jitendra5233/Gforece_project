<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ace\Customize;
class MailController extends Controller
{

    public function sendMail(Request $req){
        
    
    $file = $req->file('file');
    $filename =$file->getClientOriginalName();
    
    $path=base_path('attachments');
    $files= $file->move($path,$filename);     
// Recipient 
  $result = Customize::orderBy('id', 'DESC')->take(1)->get();
         foreach($result as $row)
         {
           $carrermail=$row->creersEmail;  
         }
         
  $to=$carrermail;
 
// Sender 
$from = $req->email; 
$fromName = $req->name; 
 
$subject = "Query Coming From Career Page"; 
 
$htmlContent = ' 
    <html> 
    <head> 
        <title>Welcome to Ace Capital</title> 
    </head> 
    <body> 
        <h1>Thanks you for joining with us!</h1> 
        <table cellspacing="0" style="border: 2px dashed #FB4314; width: 100%;"> 
            <tr> 
                <th>Name:</th><td>'.$req->name.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Email:</th><td>'.$req->email.'</td> 
            </tr> 
            <tr style="background-color: #e0e0e0;"> 
                <th>Phone:</th><td>'.$req->phone.'</td> 
            </tr>
              <tr style="background-color: #e0e0e0;"> 
                <th>Message:</th><td>'.$req->message.'</td> 
            </tr>
            <tr> 
                <th>Resume:</th><td><a href=https://dashboard.acecapitalrealty.com/attachments/'.$filename.'>'.$filename.'</a></td> 
            </tr> 
        </table> 
    </body> 
    </html>'; 
 
// Set content-type header for sending HTML email 
$headers = "MIME-Version: 1.0" . "\r\n"; 
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
// $cc_mail=env('CC_MAIL');
// $bcc_mail=env('BCC_MAIL');
// Additional headers 
$headers .= 'From: '.$fromName.'<'.$from.'>' . "\r\n"; 
// $headers .= 'Cc: '.$cc_mail.' ' . "\r\n"; 
// $headers .= 'Cc: '.$bcc_mail.' ' . "\r\n"; 
// Send email 
if(mail($to, $subject, $htmlContent, $headers)){ 
  return 1; 
}else{ 
  return 0;
}
        
        

    }
}
