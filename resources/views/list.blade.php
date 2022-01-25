@extends('layout')
@section('content')
<div>
    <h1>List of Restaurant</h1>
    @if(Session::get('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

    @endif
    <table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Name</th>
      <th scope="col">Email Id</th>
      <th scope="col">Address</th>
      <th>Operations</th>

    </tr>
  </thead>
  <tbody>
  @foreach($data as $item)
    <tr>
      <th scope="row">{{$item->id}}</th>
      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->address}}</td>
      <td><a href="delete/{{$item->id}}"><i class="fa fa-trash"></i>
        <a href="edit/{{$item->id}}"><i class="fa fa-edit"></i>

    </tr>
    @endforeach
  </tbody>
</table>
    <!-- {{print_r($data)}} all data show hota hai array ke sath-->

    <!-- <p>{{$item->name}}</p> -->

</div>
@stop
