@extends('layouts.master')
@section('title','Admin Dashboard')
@section("page-level-scripts-up")
<!-- Custom styles for this page -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
  .grow {
    transition: all .2s ease-in-out;
  }

  .grow:hover {
    transform: scale(1.1);
  }
</style>
@endsection
@section('page-name', 'Admin Dashboard')

@section('stats')
@include('includes.stats')
@endsection

@section('main-content')

@include('flash-message')
@endsection