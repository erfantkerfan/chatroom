<?php

namespace App\Http\Controllers;

use App\Report;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        $categories = $user->school()->get();
        $title = School::where('id','=',$id)->first();
        $reports = Report::where('school_id','=',$id)->paginate('5');
        return view('report')->with(compact('reports','categories','title'));
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title' => 'required|string',
            'text' => 'required|string',
        ]);

        if($request->hasFile('file')){
            $file = $request->file('file')->getClientOriginalExtension();
        }else{
            $file = null;
        }

        $report = new Report(array(
            'title' => $request['title'],
            'question' => $request['text'],
            'school_id' => $request['category_id'],
            'question_file' => $file ,
        ));

        $report->save();
        $file_name = $report->id .'.'.$file;
        if($request->hasFile('file')) {
            $request->file('file')->move(public_path('file/school/q'), $file_name);
        }
        $notif = 'گزارش با موفقیت ایجاد شد';
        return back()->with(compact('notif'));
    }
}
