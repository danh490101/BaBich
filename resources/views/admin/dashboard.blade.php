@extends('layouts.app')
@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 300px;  background-size: cover; background-position: center top;">
    <span class="mask bg-primary opacity-8"></span>
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="display-3 text-white">Xin chào {{ Auth::user()->name}}</h1>
            </div>
        </div>
    </div>
</div>
<div class="loader">
  <div class="box box0">
    <div></div>
  </div>
  <div class="box box1">
    <div></div>
  </div>
  <div class="box box2">
    <div></div>
  </div>
  <div class="box box3">
    <div></div>
  </div>
  <div class="box box4">
    <div></div>
  </div>
  <div class="box box5">
    <div></div>
  </div>
  <div class="box box6">
    <div></div>
  </div>
  <div class="box box7">
    <div></div>
  </div>
  <div class="ground">
    <div></div>
  </div>
</div>
@endsection