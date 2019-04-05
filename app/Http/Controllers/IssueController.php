<?php

namespace App\Http\Controllers;

use App\Category;
use App\Issue;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use vendor\project\StatusTest;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info=[];
        $info['user_count'] = User::count();
        $info['issues_count'] = Issue::count();
        $info['new_count'] = Issue::where('status','Новая')->count();
        $info['success_count'] = Issue::where('status','Решена')->count();
        $info['danger_count'] = Issue::where('status','Отклонена')->count();
        $issues = Issue::where('status','Решена')->orderBy('created_at', 'desc')->paginate(8);
        return view('welcome', compact('issues','info'));
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
                'title' => $request->title,
                'desc' => $request->desc,
                'category_id' => $request->category_id,
                'start_photo' => $imageName,
                'user_id' => Auth::user()->id
            ]);
            Session::flash('message', 'Новая проблема успешно создана');
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors($valid->errors())->withInput();
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
        return view('issues.index', compact('issue'));
    }

    public function danger(Issue $issue, Request $request)
    {
        $valid = Validator::make($request->all(), [
            'desc' => ['required', 'string'],
        ], [
            'desc.required' => 'Введите причину отклонения'
        ]);
        if (!$valid->fails()) {
            $issue->update([
                'admin_message' => $request->desc,
                'status' => 'Отклонена'
            ]);
            Session::flash('message', 'Заявка успешно отклонена');
            return redirect()->route('issues.show',$issue);
        } else {
            return redirect()->back()->withInput()->withErrors($valid->errors());
        }
    }

    public function success(Issue $issue, Request $request)
    {
        $valid = Validator::make($request->all(), [
            'image' => ['required', 'image', 'mimes:jpeg,png,bmp', 'max:10240']
        ], [
            'image.required' => 'Загрузите изображение с решением пробелмы',
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
            $issue->update([
                'admin_message' => $request->desc,
                'end_photo'=>$imageName,
                'status' => 'Решена'
            ]);
            Session::flash('message', 'Заявка отмечена как решенная');
            return redirect()->route('issues.show',$issue);
        } else {
            return redirect()->back()->withInput()->withErrors($valid->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        if ($issue->status == 'Новая'){
            $issue->delete();
            Session::flash('message', 'Заявка удалена');
            return redirect()->route('home');
        }else{
            Session::flash('error','Заявку с статусом '.$issue->status. ' нельзя удалить!');
            return redirect()->back();
        }
    }
}
