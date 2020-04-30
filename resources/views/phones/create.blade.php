@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $message)
                    <li>{{$message}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-header">Add Phone</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'phones.store']) !!}
                    <div class="form-group">
                        {!! Form::text('phone',null,['class'=>'form-control','placeholder'=>'Please enter your phone number']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Add',['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection