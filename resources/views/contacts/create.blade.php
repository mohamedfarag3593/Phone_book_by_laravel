@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('error'))
            <div class="alert alert-danger"> {{ session()->get('error') }} </div>
            @endif
            <div class="card">
                <div class="card-header">Add Contact</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'contacts.store']) !!}
                    <div class="form-group">
                        {!! Form::text('username',null,['class'=>'form-control','placeholder'=>'Please enter your contact Username']) !!}
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