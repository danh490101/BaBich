@extends('layouts.app')
@section('content')
<div>
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">THỐNG KÊ</h6>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row text-center py-4">
            <div class="col-xl-3 col-md-6">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Tổng doanh thu tính tới hiện tại: </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$numberStatis}}.000 VNĐ</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số lượng đơn hàng:
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$numberOrder}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Số lượng người khách hàng: </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$numberUser}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
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

            <div class="col-lg-12">
                <livewire:top-selling-product wire:ket="topSellingProduct"></livewire:top-selling-product>
            </div>

            <div class="col-lg-12">
                <livewire:order-quantity wire:key="orderQuantity"></livewire:order-quantity>
            </div>
        </div>
    </div>
</div>
@endsection