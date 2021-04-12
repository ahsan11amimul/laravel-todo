@extends('layouts.app')
@section('title')
    Login Page
@endsection

@section('content')
@include('partials.navbar')
<div class="container mt-3">
    <div class="row justify-content-center">
       {{auth()->user()->name}}
    </div>
</div>
@endsection