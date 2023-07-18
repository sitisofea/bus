@extends('layouts.auth')
@section('content')
    <div class="card">
        <div class="p-4">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Show SMS</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-outline-primary btn-uppercase" href="{{ route('sms.index') }}">Back</a>
                    </div>
                </div>
            </div><br>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        {{ $sms->title }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Content:</strong>
                        {{ $sms->content }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Publish Date:</strong>
                        {{ $sms->date }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Publish Time:</strong>
                        {{ $sms->Time }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Status:</strong>
                        @if ($sms->status)
                            Publish
                        @else
                            Draft
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
