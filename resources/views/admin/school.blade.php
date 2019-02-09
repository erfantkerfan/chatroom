@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">داشبورد دانش آموزان</div>

                    <div class="card-body text-center justify-content-center">
                        @foreach($students as $student)
                            <a href="{{Route('report',['id'=>$student->id])}}">
                                <button type="button" class="btn btn-primary">{{$student->name.' '.$student->l_name}}</button>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
