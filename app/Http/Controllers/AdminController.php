<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(Request $request){
        if ($request->has('search')){
            if ($request->search!= 'null'){
                $issues = Issue::where('status',$request->search)->orderBy('status')->orderBy('created_at','desc')->paginate(8);
                $search = $request->search;
                return view('admin.index', compact('issues','search'));
            }
        }
        $issues = Issue::orderBy('status')->orderBy('created_at','desc')->paginate(8);
        return view('admin.index', compact('issues'));
    }
}
