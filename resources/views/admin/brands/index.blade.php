@extends('layouts.app')
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">THƯƠNG HIỆU</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="{{ route('admin.brands.create')}}" role="button">
                            <div class="media align-items-center">
                                <span class="btn btn-sm btn-neutral">
                                    <i class="ni ni-fat-add text-blue"></i>
                                    <span> Thêm thương hiệu</span>
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
                                <th scope="col" class="sort" data-sort="name">Tên thương hiệu</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody class="list">
                            @foreach($brands as $brand)
                            <tr>
                                <td>
                                    <a href="">
                                        <span>
                                            {{$brand->id}}
                                        </span>
                                    </a>
                                </td>
                                <td>
                                    <span>
                                        {{$brand->name}}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('admin.brands.edit', ['brand' => $brand->id]) }}">Xem & chỉnh sửa</a>


                                            <form action="{{ route('admin.brands.destroy', ['brand' => $brand->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item" type="submit">Xóa</button>
                                            </form>
                                            <script>
                                                function alertFunction(brand) {
                                                    console.log(brand);
                                                    event.preventDefault();
                                                    // if (confirm("Are you sure to delete")) {
                                                    //     document.getElementById('delete-form-{{ $brand->id }}').submit();
                                                    // }
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer py-4 page-link">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-start">
                                {{$brands->links("pagination::bootstrap-4")}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection