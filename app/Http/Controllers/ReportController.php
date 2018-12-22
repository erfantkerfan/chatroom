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
        $reports = Report::where('school_id','=',$id)->orderby('created_at','desc')->paginate('5');
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
        return back();
    }

    public function patch(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'answer' => 'required|string',
        ]);

        if($request->hasFile('answer_file')){
            $answer_file = $request->file('answer_file')->getClientOriginalExtension();
        }else{
            $answer_file = null;
        }

        $report = Report::FindOrFail($request->ref);
        $report->answer = $request->answer;
        $report->answer_file = $answer_file;
        $report->save();

        $file_name = $report->id .'.'.$answer_file;
        if($request->hasFile('answer_file')) {
            $request->file('answer_file')->move(public_path('file/school/a'), $file_name);
        }
        return back();
    }
}
