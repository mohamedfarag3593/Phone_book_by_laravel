@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert"> {{ session()->get('success') }} </div>
            @endif
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phones</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1 ?>
                    @forelse ($contacts as $contact)
                    <tr>
                        <th scope="row">{{$count++}}</th>
                        <td>{{ $contact->name }}</td>
                        <td>
                            <ul>
                                @forelse($contact->phones as $phone)
                                <li> {{ $phone->phone }} </li>
                                @empty
                                <li>there are no phones</li>
                                @endforelse
                            </ul>
                        </td>                        
                        <td>
                            {!! Form::open(['route' => ['contacts.destroy',$contact->id], 'method' =>
                            'delete','class' => 'float-left mr-3']) !!}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="7">There is No Contracts</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection