<?php

namespace App\Http\Controllers\gforce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gforce\Package;
use App\Models\Gforce\Branch;

class PackageCon extends Controller
{
    public function addPackage(){
        $tableData = Branch::all();
        return view('content.Package.addPackage')->with('tableData',$tableData);
    }

    public function allPackage(){
        $package = Package::all();

        foreach($package as $row){
            $branch = Branch::where('id',$row->branch)->get();
            if(count($branch) != 0){
                $row['branchName'] = $branch[0]->name;
            }else{
                $row['branchName'] = '';
            }
        }
        return view('content.Package.allPackage')->with('package',$package);
    }

    public function editPackage($id){
        $branch = Branch::all();
        $package = Package::where('id',$id)->get();
        return view('content.Package.editPackage')->with('branch',$branch)->with('package',$package);
    }

    public function updatePackage(Request $req){
        $result = Package::where("id",$req->packageID)->update([
            "name"=>$req->packageName,
            "price"=>$req->price,
            "credit"=>$req->credit,
            "expire"=>$req->expire,
            "branch"=>$req->branch,
            "image"=>$req->image,
            "package_limit"=>$req->limit,
            "description"=>$req->description,
        ]); 
        return redirect('/editPackage/'.$req->packageID);
    }

    public function deletePackage(Request $req){
        $result = Package::where('id',$req->id)->delete();
        return $result;
    }

    public function viewPackage($id){
        $branch = Branch::all();
        $package = Package::where('id',$id)->get();
        return view('content.Package.showPackage')->with('branch',$branch)->with('package',$package);
    }

    public function submitPackage(Request $req){
        $data = new Package;
        $data->name = $req->packageName;
        $data->price = $req->price;
        $data->credit = $req->credit;
        $data->expire = $req->expire;
        $data->branch = $req->branch;
        $data->image = $req->image;
        $data->description = $req->description;
        $data->package_limit = $req->limit;
        $res = $data->save();
        return redirect('/allPackage');
    }
}
