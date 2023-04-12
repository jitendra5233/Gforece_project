<?php

namespace App\Http\Controllers\gforce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gforce\Branch;

class BranchCon extends Controller
{
    public function addBranch(){
        return view('content.Branch.addbranch');
    }

    public function allBranch(){
        $tableData = Branch::all();
        return view('content.Branch.allbranch')->with('tableData',$tableData);
    }

    public function submitBranch(Request $req){
        $data = new Branch;
        $data->name = $req->name;
        $data->fulllocation = $req->location;
        $data->city = '$req->city';
        $data->state = '$req->state';
        $data->country = '$req->country';
        $res = $data->save();
        return $res;
    }
}
