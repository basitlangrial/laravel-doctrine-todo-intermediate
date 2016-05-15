@extends('templates.main')

@section('content')
<div class="content">
                <div class="title">Laravel 5</div>
                <div>Scientist Table</div>
               <table class="table">
    <thead>
      <tr>
      <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $dat)
      <tr>
      <td>{{$dat->getId()}}</td>
        <td>{{$dat->getFirstName()}}</td>
        <td>{{$dat->getLastName()}}</td>
        <td>{{$dat->getEmail()}}</td>
      </tr>
     @endforeach
    </tbody>
  </table>
                <button class="btn btn-default"><a href="{{route('home')}}">Home</a></button>
            </div>

@endsection