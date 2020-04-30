@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            @forelse ($phones as $phone)
            <div class="card text-center">
                <div class="card-header">Phone Details</div>

                <div class="card-body">
                    <h2>Phone Num: {{$phone->phone}}</h2>
                    <a class="btn btn-warning" href="{{ route('phones.edit' , $phone->id) }}">{{ __('Edit') }}</a>
                    {!! Form::open(['route' => ['phones.destroy',$phone->id] ,'method' => 'delete', 'style'=>'display:inline-block']) !!}
                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            @empty
            <div class="card">
                <div class="card-header">Add your first phone</div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('phones.create') }}">{{ __('Add Phone') }}</a>
                </div>
            </div>

            @endforelse
        </div>
    </div>
</div>
@endsection