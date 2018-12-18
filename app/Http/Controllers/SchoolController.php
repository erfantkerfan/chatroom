<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $schools = $user->school()->get();
        return view('school')->with(compact('schools'));
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
        $notif = 'تیتر با موفقیت ایجاد شد';
        return back()->with(compact('notif'));
    }
}
