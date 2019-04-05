<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $issues = Issue::orderBy('status')->orderBy('created_at','desc')->paginate(8);
        return view('admin.index', compact('issues'));
    }
}
