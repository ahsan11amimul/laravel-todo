@extends('layouts.app')
@section('title')
    Todos
@endsection

@section('content')
@include('partials.navbar')
<div class="container mt-3">
    <div class="row justify-content-center">
        
        <a href="/todos/create" class="btn btn-primary mb-3">Add New Todo</a>
      <table class="table">
         <thead>
             <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Description</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
             </tr>
         </thead>
         <tbody>
             @foreach ($todos as $item)
                  <tr>
                      <td>{{$item->id}}</td>
                      <td>{{$item->title}}</td>
                      <td>{{$item->description}}</td>
                      <td>{{$item->is_completed?'Completed':'Pending'}}</td>
                      <td>
                         <a href="{{url('todos/'.$item->id.'/edit')}}" class="btn btn-success">Edit</a> 
                         |&nbsp; 
                         <a href="{{url('todos/'.$item->id)}}" class="btn btn-primary">Show</a>  
                      </td>
                      <td>
                          <form action="{{route('todos.destroy',$item->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </td>
                  </tr>
             @endforeach
         </tbody>
      </table>
    </div>
</div>
@endsection