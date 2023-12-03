@extends('layouts.app')
@section('content')
<div>
	<section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate mb-5 text-center">
					<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Sản phẩm tìm kiếm <i class="fa fa-chevron-right"></i></span></p>
					<h2 class="mb-0 bread">Tìm kiếm: {{ $keyword }}</h2>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section">
		<div class="container">
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
							<input type="range" id="max_price" name="max_price" min="0" max="1000000" step="10" value="{{ request('max_price', 1000000) }}">
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
								@elseif ( Request::get('skinId'))
								<li>
									<a href="{{ route('user.shop', [
										'categoryId' => $category->id, 
										'skinId' => Request::get('skinId'),
										'min_price' => Request::get('min_price'),
										'max_price' => Request::get('max_price')
									])}}">
										{{$category->name}}
										<span class="fa fa-chevron-right"></span>
									</a>
								</li>
								@elseif ( Request::get('skinId') && Request::get('brandId'))
								<li>
									<a href="{{ route('user.shop', [
										'categoryId' => $category->id, 
										'brandId' => Request::get('brandId'),
										'skinId' => Request::get('skinId'),
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
								@elseif ( Request::get('skinId'))
								<li>
									<a href="{{ route('user.shop', [
										'brandId' => $brand->id, 
										'skinId' => Request::get('skinId'),
										'min_price' => Request::get('min_price'),
										'max_price' => Request::get('max_price')
									])}}">
										{{$brand->name}}
										<span class="fa fa-chevron-right"></span>
									</a>
								</li>
								@elseif ( Request::get('categoryId') && Request::get('skinId'))
								<li>
									<a href="{{ route('user.shop', [
										'brandId' => $brand->id, 
										'categoryId' => Request::get('categoryId'),
										'skinId' => Request::get('skinId'),
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
								<ul class="p-0">
									@if ( Request::get('categoryId'))
									<li>
										<a href="{{ route('user.shop', [
										'skinId' => $skin->id, 
										'categoryId' => Request::get('categoryId'),
										'min_price' => Request::get('min_price'),
										'max_price' => Request::get('max_price')
									])}}">
											{{$skin->name}}
											<span class="fa fa-chevron-right"></span>
										</a>
									</li>
									@elseif ( Request::get('brandId'))
									<li>
										<a href="{{ route('user.shop', [
										'skinId' => $skin->id, 
										'brandId' => Request::get('brandId'),
										'min_price' => Request::get('min_price'),
										'max_price' => Request::get('max_price')
									])}}">
											{{$skin->name}}
											<span class="fa fa-chevron-right"></span>
										</a>
									</li>
									@elseif ( Request::get('categoryId') && Request::get('brandId'))
									<li>
										<a href="{{ route('user.shop', [
										'skinId' => $skin->id, 
										'categoryId' => Request::get('categoryId'),
										'brandId' => Request::get('brandId'),
										'min_price' => Request::get('min_price'),
										'max_price' => Request::get('max_price')
									])}}">
											{{$skin->name}}
											<span class="fa fa-chevron-right"></span>
										</a>
									</li>
									@else
									<li>
										<a href="{{ route('user.shop', [
										'skinId' => $skin->id, 
										'min_price' => Request::get('min_price'),
										'max_price' => Request::get('max_price')
									])}}">
											{{$skin->name}}
											<span class="fa fa-chevron-right"></span>
										</a>
									</li>
									@endif
									<!-- <li><a href="{{ route('user.shop', ['brandId' => $brand->id]) }}">{{$brand->name}}<span class="fa fa-chevron-right"></span></a></li> -->
								</ul>
							</ul>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row">
						@foreach ($results as $result)
						<div class="col-md-4 d-flex">
							<div class="product ftco-animate">
								<div class="img d-flex align-items-center justify-content-center" style="background-image: url({{asset($result->image)}});">
									<div class="desc">
										<p class="meta-prod d-flex">
											<a href="{{route('add_to_cart',['id' => $result->id])}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
											<a href="{{ route('user.add_to_favorites', ['productId' => $result->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
											<a href="{{ route('user.product-details', ['product' => $result->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
										</p>
									</div>
								</div>
								<div class="text text-center">
									<span class="category">{{$result->category->name}}</span>
									<h2>{{ Illuminate\Support\Str::limit($result->name, 25) }}
									</h2>
									<p class="mb-0"><span class="price ">{{number_format($result->price,0, ',','.')}}</span></p>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
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