@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tình trạng da</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="/admin/skins/create/" role="button">
                            <div class="media align-items-center">
                                <span class="btn btn-sm btn-neutral">
                                    <i class="ni ni-fat-add text-blue"></i>
                                    <span> Thêm phân loại da</span>
                                </span>
                            </div>
                        </a>
                    </li>
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
                                <th scope="col" class="sort" data-sort="name">Tên tình trạng da</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach($skins as $skin)
                            <tr>
                                <td>
                                    <a href="">
                                        <span>
                                            {{$skin->id}}
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <span>
                                        {{$skin->name}}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('admin.skins.edit', ['skin' => $skin]) }}">Xem & chỉnh sửa</a>
                                            <a class="dropdown-item" href="{{ route('admin.skins.destroy', ['skin' => $skin]) }}" onclick="alertFunction()">Xóa</a>

                                            <form id="delete-form-{{ $skin->id }}" action="{{ route('admin.skins.destroy', ['skin' => $skin]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <script>
                                                function alertFunction() {
                                                    event.preventDefault();
                                                    if (confirm("Are you sure to delete")) {
                                                        document.getElementById('delete-form-{{ $skin->id }}').submit();
                                                    }
                                                }
                                            </script>
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