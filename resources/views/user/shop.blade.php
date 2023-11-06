@extends('layouts.app')
@section('content')
<div>
	<section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate mb-5 text-center">
					<p class="breadcrumbs mb-0"><span class="mr-2"><a href="#">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Sản phẩm <i class="fa fa-chevron-right"></i></span></p>
					<h2 class="mb-0 bread">Sản phẩm</h2>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section">
		<div class="container">
			@if(isset($filters))
			<div class="row">
				<div class="col-md-3">
					<div class="sidebar-box ftco-animate">
						<form action="{{ route('user.shop') }}" method="GET">
							<label for="min_price">Giá tối thiểu:</label>
							<input type="range" id="min_price" name="min_price" min="0" max="1000000" step="10" value="{{ request('min_price', 0) }}">
							<label for="max_price">Giá tối đa:</label>
							<input type="range" id="max_price" name="max_price" min="0" max="1000000" step="10" value="{{ request('max_price', 1000) }}">
							<button type="submit">Lọc</button>
						</form>
					</div>
					<div class="sidebar-box ftco-animate">
						<div class="categories">
							<h3>Phân loại</h3>
							@foreach($categories as $category)
							<ul class="p-0">
								<li><a href="{{ route('user.shop', ['categoryId' => $category->id]) }}">{{$category->name}}<span class="fa fa-chevron-right"></span></a></li>
							</ul>
							@endforeach
						</div>
					</div>

				</div>
			</div>
			@else
			<div class="row">
				<div class="col-md-3">
					<div class="sidebar-box ftco-animate">
						<form action="{{ route('user.shop') }}" method="GET">
							<label for="min_price">Giá tối thiểu:</label><span id="min_price_display"></span>
							<br>
							<input type="hidden" name="brandId" value="{{ Request::get('brandId', null) }}">
							<input type="hidden" name="categoryId" value="{{ Request::get('categoryId', null) }}">
							<input type="range" id="min_price" name="min_price" min="0" max="1000000" step="10" value="{{ request('min_price', 0) }}">
							<br>
							<label for="max_price">Giá tối đa:</label><span id="max_price_display"></span>
							<br>
							<input type="range" id="max_price" name="max_price" min="0" max="1000000" step="10" value="{{ request('max_price', 1000) }}">
							<br>
							<button class="cta" type="submit">
								<span>Lọc theo giá</span>
								<svg viewBox="0 0 13 10" height="10px" width="15px">
									<path d="M1,5 L11,5"></path>
									<polyline points="8 1 12 5 8 9"></polyline>
								</svg>
							</button>
						</form>
					</div>
					<div class="sidebar-box ftco-animate">
						<div class="categories">
							<h3>Phân loại</h3>
							@foreach($categories as $category)
							<ul class="p-0">
								@if ( Request::get('brandId'))
								<li>
									<a href="{{ route('user.shop', [
										'categoryId' => $category->id, 
										'brandId' => Request::get('brandId'),
										'min_price' => Request::get('min_price'),
										'max_price' => Request::get('max_price')
									])}}">
										{{$category->name}}
										<span class="fa fa-chevron-right"></span>
									</a>
								</li>
								@else
								<li>
									<a href="{{ route('user.shop', [
										'categoryId' => $category->id, 
										'min_price' => Request::get('min_price'),
										'max_price' => Request::get('max_price')
									])}}">
										{{$category->name}}
										<span class="fa fa-chevron-right"></span>
									</a>
								</li>
								@endif
								<!-- <li><a href="{{ route('user.shop', ['categoryId' => $category->id]) }}">{{$category->name}}<span class="fa fa-chevron-right"></span></a></li> -->
							</ul>
							@endforeach
						</div>
					</div>
					<div class="sidebar-box ftco-animate">
						<div class="categories">
							<h3>Thương hiệu</h3>
							@foreach($brands as $brand)
							<ul class="p-0">
								@if ( Request::get('categoryId'))
								<li>
									<a href="{{ route('user.shop', [
										'brandId' => $brand->id, 
										'categoryId' => Request::get('categoryId'),
										'min_price' => Request::get('min_price'),
										'max_price' => Request::get('max_price')
									])}}">
										{{$brand->name}}
										<span class="fa fa-chevron-right"></span>
									</a>
								</li>
								@else
								<li>
									<a href="{{ route('user.shop', [
										'brandId' => $brand->id, 
										'min_price' => Request::get('min_price'),
										'max_price' => Request::get('max_price')
									])}}">
										{{$brand->name}}
										<span class="fa fa-chevron-right"></span>
									</a>
								</li>
								@endif
								<!-- <li><a href="{{ route('user.shop', ['brandId' => $brand->id]) }}">{{$brand->name}}<span class="fa fa-chevron-right"></span></a></li> -->
							</ul>
							@endforeach
						</div>
					</div>
					<div class="sidebar-box ftco-animate">
						<div class="categories">
							<h3>Loại da</h3>
							@foreach($skins as $skin)
							<ul class="p-0">
								<li><a href="#">{{$skin->name}}<span class="fa fa-chevron-right"></span></a></li>
							</ul>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						@foreach ($products as $product)
						<div class="col-md-4 d-flex">
							<div class="product ftco-animate">
								<div class="img d-flex align-items-center justify-content-center" style="background-image: url({{asset($product->image)}});">
									<div class="desc">
										<p class="meta-prod d-flex">
											<a href="{{route('add_to_cart',['id' => $product->id])}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
											<a href="{{ route('user.product-details', ['product' => $product->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
										</p>
									</div>
								</div>
								<div class="text text-center">
									<span class="category">{{$product->category->name}}</span>
									<h2>{{ Illuminate\Support\Str::limit($product->name, 25) }}
									</h2>
									<p class="mb-0"><span class="price ">{{$product->price}}</span></p>
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
				<!-- <div class="col-md-3">
					<div class="sidebar-box ftco-animate">
						<div class="categories">
							<h3>Phân loại</h3>
							@foreach($categories as $category)
							<ul class="p-0">
								<li><a href="{{ route('user.shop', ['categoryId' => $category->id]) }}">{{$category->name}}<span class="fa fa-chevron-right"></span></a></li>
							</ul>
							@endforeach
						</div>
					</div>
				</div> -->
			</div>
			@endif
		</div>
	</section>
</div>
@endsection
@section('scripts')
<script>
	const minPriceRange = document.getElementById('min_price');
	const maxPriceRange = document.getElementById('max_price');
	const minPriceDisplay = document.getElementById('min_price_display');
	const maxPriceDisplay = document.getElementById('max_price_display');
	minPriceRange.addEventListener('input', function() {
		minPriceDisplay.textContent = minPriceRange.value;
	});
	maxPriceRange.addEventListener('input', function() {
		maxPriceDisplay.textContent = maxPriceRange.value;
	});
	minPriceDisplay.textContent = minPriceRange.value;
	maxPriceDisplay.textContent = maxPriceRange.value;
</script>
@endsection