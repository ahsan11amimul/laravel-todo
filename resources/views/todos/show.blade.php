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
            
                  <tr>
                      <td>{{$todo->id}}</td>
                      <td>{{$todo->title}}</td>
                      <td>{{$todo->description}}</td>
                      <td>{{$todo->is_completed?'Completed':'Pending'}}</td>
                      <td>
                         <a href="{{url('todos/'.$todo->id.'/edit')}}" class="btn btn-success">Edit</a> 
                         |&nbsp; 
                         <a href="{{url('todos/'.$todo->id.'/show')}}" class="btn btn-primary">Show</a>  
                      </td>
                      <td>
                          <form action="{{route('todos.destroy',$todo->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </td>
                  </tr>
             
         </tbody>
      </table>
    </div>
</div>
@endsection