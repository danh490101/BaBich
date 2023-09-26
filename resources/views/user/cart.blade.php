@extends('layouts.app')
@section('content')
<div>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate mb-5 text-center">
                    <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Cart <i class="fa fa-chevron-right"></i></span></p>
                    <h2 class="mb-0 bread">My Cart</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>total</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $id => $detail)
                            @if (!is_numeric($id)) @continue @endif
                            <tr class="alert" role="alert" data-id="{{ $detail['id'] }}">
                                <td>
                                    <label class="checkbox-wrap checkbox-primary">
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="img" style="background-image: url({{asset('storage/'.$detail['image'])}});"></div>
                                </td>
                                <td>
                                    <div class="name">
                                        <span>{{ $detail['name'] }}</span>
                                    </div>
                                </td>
                                <td>{{ $detail['price'] }}</td>
                                <td class="quantity">
                                    <div class="input-group">
                                        <input type="text" name="quantity" class="quantity form-control input-number" value="{{ $detail['quantity'] }}" min="1" max="100">
                                    </div>
                                </td>
                                <td>{{ number_format($detail['price']*$detail['quantity'],3) }}</td>
                                <td>
                                    <button type="button" onclick="Testfunction()" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                        <p class="d-flex">
                            <span>Subtotal</span>
                            <span>{{ number_format($cart['totalPrice'],3) }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Delivery</span>
                            <span>{{ number_format(round($cart['totalPrice']*0.05),3) }}</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>00</span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>{{ number_format(round($cart['totalPrice']*0.05 + $cart['totalPrice']),3) }}</span>
                        </p>
                    </div>
                    <p class="text-center"><a href="{{route('user.checkout.index')}}" class="btn btn-primary py-3 px-4">Đặt hàng</a></p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(".cart_update").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: "{{ route('update_cart') }}",
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });

    function Testfunction() {
        e.preventDefault();
        console.log('222');
    };

    $(".cart_remove").click(function (e) {
        e.preventDefault();
        var_dump("hello");
        die();
   
        var ele = $(this);
   
        if(confirm("Do you really want to remove?")) {
            $.ajax({
                url: "{{ route('remove_from_cart') }}",
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
   
</script>
@endsection