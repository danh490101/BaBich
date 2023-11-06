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

<div class="container">
  <div class="row">
    <div class="col-lg-6">
      <livewire:order-chart wire:key="orderChart"></livewire:order-chart>
    </div>
    <div class="col-lg-6">
      <livewire:revenue-chart wire:key="revenueChart"></livewire:revenue-chart>
    </div>
  </div>
</div>
@endsection