<?php

namespace App\Http\Controllers;

use App\Category;
use App\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::orderBy('created_at','desc')->paginate(8);
        return view('welcome',compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('issues.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'string'],
            'category_id' => ['exists:categories,id'],
            'image' => ['required', 'image', 'mimes:jpeg,png,bmp', 'max:10240']
        ], [
            'title.required' => 'Введите название проблемы',
            'desc.required' => 'Введите описание проблемы',
            'category_id.exists' => 'В базе нет такой категории',
            'image.required' => 'Загрузите изображение с проблемой',
            'image.image' => 'Файл должен быть изображением',
            'image.mimes' => 'Изобращение должно быть только форматов: jpg, jpeg, png, bmp',
            'image.max' => 'Изобращение не должно быть весить больше 10Мб',
        ]);
        if (!$valid->fails()) {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(storage_path('images'), $imageName);

            }
            $issue = Issue::create([
                'title'=>$request->title,
                'desc'=>$request->desc,
                'category_id'=>$request->category_id,
                'start_photo'=>$imageName,
                'user_id'=>Auth::user()->id
            ]);
            $message = 'Новая проблема успешно создана';
            return redirect()->route('home')->with($message);
        } else {
            $errors = $valid->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Issue $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        return view('issues.index',compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Issue $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Issue $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }
}
