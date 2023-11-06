<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">Top 10 Sản phẩm bán chạy</div>

                <div class="col-lg-6 d-flex justify-content-end">
                    <select name="month" id="month" wire:model="month" class="form-control-md">
                        @for ($i = 1; $i <= 12; $i++) <option value="{{ $i }}" @if ($month==$i) selected @endif>{{ $i }}</option>
                            @endfor
                    </select>

                    <select name="year" id="year" wire:model="year" class="form-control-md">
                        @php
                        $currentYear = date('Y');
                        @endphp
                        @for ($i = $currentYear; $i >= $currentYear - 4; $i--)
                        <option value="{{ $i }}" @if ($year==$i) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số Lượng Còn Lại</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topSellingProducts as $key => $product)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ Illuminate\Support\Str::limit($product->name, 25)}}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                    </tr>
                    @endforeach
                    @if(! $topSellingProducts->count())
                    <tr>
                        <td colspan="100%" class="text-center">Không có sản phẩm nào</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>