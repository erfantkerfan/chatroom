<?php

namespace App\Http\Controllers;

use App\School;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (in_array($user->access, array(12, 11))) {
            $schools = $user->school()->get();
            return view('school')->with(compact('schools'));
        }elseif(in_array($user->access, array(23))){
            $gender = $user->gender;
            $zone = $user->zone;
            $district = $user->district;
            $grade = $user->grade;
            $students = User::where('gender','=',$gender)->where('zone','=',$zone)->where('district','=',$district)
                ->where('grade','=',$grade)->where('admin','=',0)->get();
            return view('admin.school')->with(compact('students'));
        }else{
            abort(403);
        }
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'school' => 'required|string',
        ]);

        $school = new School(array(
            'category' => $request['school'],
            'user_id' => $user->id,
        ));

        $school->save();
        return back();
    }
}
