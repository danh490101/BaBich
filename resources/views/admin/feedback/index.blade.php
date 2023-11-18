@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Đánh giá</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Mã </th>
                                <th scope="col" class="sort" data-sort="name">Tên sản phẩm</th>
                                <th scope="col" class="sort" data-sort="name">Tên khách hàng</th>
                                <th scope="col" class="sort" data-sort="name">Bình luận</th>
                                <th scope="col" class="sort" data-sort="name">Đánh giá</th>
                                <th scope="col" class="sort" data-sort="name">Trạng thái</th>
                                <th scope="col"></th>

                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($feedbacks as $feedback)
                            <tr>
                                <td>
                                    <a href="">
                                        <span>
                                            {{$feedback->id}}
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <span>
                                        {{ Illuminate\Support\Str::limit($feedback->product->name, 20) }}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$feedback->user->name}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$feedback->comment}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{$feedback->rating}} sao
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        @if ($feedback->status)
                                        Hiện
                                        @else
                                        Ẩn
                                        @endif
                                    </span>
                                </td>
                                <!-- <td>
                                    <label class="rocker rocker-small">
                                        <input type="checkbox">
                                        <span class="switch-left">Yes</span>
                                        <span class="switch-right">No</span>
                                    </label>
                                </td> -->
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('admin.feedback.changeStatus', ['feedback' => $feedback->id]) }}">Thay đổi</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection