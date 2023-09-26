<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-11">
                            <h3 class="mb-0">Thông tin </h3>
                        </div>
                        <div class="col-1">
                            <span class="ni ni-bell-55" data-toggle="tooltip" data-placement="left" title="Mã sản phẩm sẽ được tạo tự động"></span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">

                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                    <form  action="{{ route('admin.category.add') }}" method="GET" enctype="multipart/form-data" >
                    @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="name">Tên hàng</label>
                                        <span class="text-warning" data-toggle="tooltip" data-placement="left" title="Thông tin bắt buộc nhập">(*)</span>
                                        <input type="text" wire:model="name" name="name" class="form-control" placeholder="Tên sản phẩm" value="" wire:model="name">
                                            @error('name')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <div class="form-group">
                                            <a href="hang-hoa.php" class="btn btn-sm btn-outline-primary">Quay lại</a>
                                        </div>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="form-group">
                                            <button wire:click="save" type="button" class="btn btn-sm btn-primary"> Thêm hàng hóa </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>