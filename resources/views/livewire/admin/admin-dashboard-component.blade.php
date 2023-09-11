@extends('layouts.app')
@section('content')
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-5">
              <h6 class="h2 text-white d-inline-block mb-0">Hàng hóa</h6>
            </div>
            <div class="col-lg-6 col-7 text-right">
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="them-hang-hoa.php" >
                      <div class="media align-items-center">
                          <span class="btn btn-sm btn-neutral">
                              <i class="ni ni-fat-add text-blue"></i> Thêm hàng hóa
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
                    <th scope="col" class="sort" data-sort="name" >Mã hàng</th>
                    <th scope="col" class="sort" data-sort="name">Tên hàng</th>
                    <th scope="col" class="sort" data-sort="name">Mã loại hàng</th>
                    <th scope="col" class="sort" data-sort="budget">Giá</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="list">
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                          <span class="name mb-0 text-sm">
                          </span>
                      </div>
                    </th>
                    <th>
                      <span class="name">
                      <a href="chi-tiet-hang-hoa.php?id=<?php echo $row["Id"]; ?>"><?php echo $row["TenHH"]; ?></a>
                      </span>
                    </th>
                    <th>
                      <span class="name"><?php echo $row["Idloai"]; ?></span>
                    </th>
                    <td>
                        <span class="budget"><?php echo $row["Gia"]; ?></span>
                    </td>
                    <td>
                    </td>
                    <td class="text-right">
                      <div class="dropdown">
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                          <a class="dropdown-item" href="chi-tiet-hang-hoa.php">Xem & chỉnh sửa</a>
                          <a class="dropdown-item" href="chi-tiet-hang-hoa.php">Xóa</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> 
@endsection