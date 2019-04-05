<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (auth()->user()->isAdmin){
            return redirect()->route('admin.index');
        }else{
            if ($request->has('search')){
                if ($request->search!= 'null'){
                    $issues = auth()->user()->issues()->where('status',$request->search)->orderBy('status')->orderBy('created_at','desc')->paginate(8);
                    $search = $request->search;
                    return view('home',compact('issues','search'));
                }
            }
            $issues = auth()->user()->issues()->orderBy('status')->orderBy('created_at','desc')->paginate(8);
            return view('home',compact('issues'));
        }

    }
}
