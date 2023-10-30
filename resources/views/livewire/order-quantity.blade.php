<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">Thống Kê Số Lượng Đơn Hàng</div>

                <div class="col-lg-6 d-flex justify-content-end">
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

        <div class="card body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Năm</th>
                            <th scope="col">Số Lượng Đơn hàng</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($yearlyOrders as $yearlyOrder)
                        <tr>
                            <td>{{ $yearlyOrder->year }}</td>
                            <td>{{ $yearlyOrder->total_orders }}</td>
                        </tr>
                        @endforeach
                        @if(! $yearlyOrders->count())
                        <tr>
                            <td colspan="100%" class="text-center">Không có đơn hàng nào</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>


            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Quý</th>
                            <th scope="col">Số Lượng Đơn Hàng</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($quarterlyOrders as $quarterlyOrder)
                        <tr>
                            <td>{{ $quarterlyOrder->quarter }}</td>
                            <td>{{ $quarterlyOrder->total_orders }}</td>
                        </tr>
                        @endforeach
                        @if(! $quarterlyOrders->count())
                        <tr>
                            <td colspan="100%" class="text-center">Không có đơn hàng nào</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tháng</th>
                            <th scope="col">Số Lượng Đơn Hàng</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($monthlyOrders as $monthlyOrder)
                        <tr>
                            <td>{{ $monthlyOrder->month }}</td>
                            <td>{{ $monthlyOrder->total_orders }}</td>
                        </tr>
                        @endforeach
                        @if(! $monthlyOrders->count())
                        <tr>
                            <td colspan="100%" class="text-center">Không có đơn hàng nào</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>