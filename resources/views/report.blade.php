@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-3">
                <div class="card">
                    <div class="card-header text-center">داشبورد ایجاد تیکت</div>

                    <div class="card-body text-center justify-content-center">
                        <form class="form" method="POST" action="{{ route('report_post') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                <label for="title" class="control-label sr-only">تیتر</label>
                                <input id="title" type="text" class="form-control text-center" name="title" value="{{ old('title') }}" placeholder="تیتر" required>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <label for="category_id" class="control-label sr-only">دسته بندی</label>
                                <select id="category_id" name="category_id" class="form-control" required>
                                    <option value="" selected>دسته بندی</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                <label for="title" class="control-label sr-only">
                                    متن
                                </label>
                                <div class="col-12">
                                    <label for="text" class="sr-only">متن</label>
                                    <textarea class="form-control text-center" id="text" name="text" rows="5" placeholder="متن" required></textarea>

                                    @if ($errors->has('text'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('text') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                <div class="col-12">
                                    <input id="file" type="file" class="form-control-file" name="file">

                                    @if ($errors->has('file'))
                                        <span class="help-block">
                                            <strong>
                                                {{ $errors->first('file') }}
                                            </strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    ثبت
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">داشبورد دسترسی {{$title->category}}</div>

                    <div class="card-body text-center justify-content-center">
                        @foreach($reports as $report)
                            <div class="card text-right">
                                <div class="card-body">
                                    <h5 class="card-title">{{$report->title}}</h5>
                                    <p class="card-text">{{$report->question}}</p>
                                    @if($report->question_file!=null)
                                        <a href="{{'/file/school/q/'.$report->id.'.'.$report->question_file}}" class="btn btn-primary btn-sm">دانلود فایل</a>
                                        <br>
                                        <br>
                                    @endif
                                    @if($report->answer!=null)
                                        <div class="card text-right">
                                            <div class="card-body">
                                                <p class="card-text">{{$report->answer}}</p>
                                                @if($report->answer_file!=null)
                                                    <a href="{{'/file/school/a/'.$report->id.'.'.$report->answer_file}}" class="btn btn-primary btn-sm">دانلود فایل</a>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        @if($reports->currentPage()==1 and $loop->iteration==1)
                                            <div class="card text-right">
                                                <div class="card-body">
                                                    <form class="form" method="POST" action="{{ route('report_post') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <label for="ref" class="sr-only">عدد</label>
                                                        <input hidden="" id="ref" type="text" class="form-control" name="ref" value="{{$report->id}}">

                                                        <div class="form-group{{ $errors->has('answer') ? ' has-error' : '' }}">
                                                            <div class="col-12">
                                                                <label for="answer" class="sr-only">پاسخ</label>
                                                                <textarea class="form-control text-center" id="answer" name="answer" rows="5" placeholder="پاسخ" required></textarea>
                                                                @if ($errors->has('answer'))
                                                                    <span class="help-block">
                                                                    <strong>{{ $errors->first('answer') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group{{ $errors->has('answer_file') ? ' has-error' : '' }}">
                                                            <div class="col-12">
                                                                <input id="answer_file" type="file" class="form-control-file" name="answer_file">
                                                                @if ($errors->has('answer_file'))
                                                                    <span class="help-block">
                                                                    <strong>
                                                                        {{ $errors->first('answer_file') }}
                                                                    </strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary btn-sm">
                                                                ثبت
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <br>
                        @endforeach
                        <div> {{$reports->links()}} </div>
                        <div> {{}} </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
