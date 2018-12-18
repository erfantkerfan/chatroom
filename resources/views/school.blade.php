@extends('layouts.app')
@section('content')
    @include('partials.header')
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">داشبورد مدرسه</div>

                    <div class="card-body text-center justify-content-center">
                        @foreach($schools as $school)
                            <a href="{{Route('report',['id'=>$school->id])}}">
                                <button type="button" class="btn btn-primary">{{$school->category}}</button>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header text-center">داشبورد ایجاد موضوع</div>

                    <div class="card-body text-center justify-content-center">
                        <form class="form" method="POST" action="{{ route('school') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                                <label for="expense" class="control-label sr-only">
                                    عنوان
                                </label>
                                <div class="col-12">
                                    <input id="school" type="text" class="form-control text-center" name="school" value="{{ old('school') }}" placeholder="عنوان" required>

                                    @if ($errors->has('school'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('school') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    ثبت موضوع
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
