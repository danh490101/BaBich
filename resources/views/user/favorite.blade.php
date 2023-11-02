@extends('layouts.app')
@section('content')
<div>
	<section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate mb-5 text-center">
					<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Sản phẩm yêu thích <i class="fa fa-chevron-right"></i></span></p>
					<h2 class="mb-0 bread">Sản phẩm yêu thích</h2>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						@foreach ($products as $product)
						<div class="col-md-4 d-flex">
							<div class="product ftco-animate">
								<div class="img d-flex align-items-center justify-content-center" style="background-image: url({{asset('storage/'.$product->image)}});">
									<div class="desc">
										<p class="meta-prod d-flex">
											<a href="{{route('add_to_cart',['id' => $product->id])}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
											<a href="{{ route('user.add_to_favorites', ['productId' => $product->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
											<a href="{{ route('user.product-details', ['product' => $product->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
										</p>
									</div>
								</div>
								<div class="text text-center">
									<span class="sale">Sale</span>
									<span class="category">Brandy</span>
									<h2>{{$product->name}}</h2>
									<p class="mb-0"><span class="price ">{{number_format($product->price,0, ',','.')}}</span></p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="row mt-5">
						<div class="col text-center">
							<div class="block-27">
								<ul>
									<li><a href="#">&lt;</a></li>
									<li class="active"><span>1</span></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">&gt;</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection