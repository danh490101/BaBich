@extends('layouts.app')
@section('content')
<div>
	<section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate mb-5 text-center">
					<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i class="fa fa-chevron-right"></i></a></span> <span>Products <i class="fa fa-chevron-right"></i></span></p>
					<h2 class="mb-0 bread">Products</h2>
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
								<div class="img d-flex align-items-center justify-content-center" style="background-image: url(asset/images/{{$product->image}});">
									<div class="desc">
										<p class="meta-prod d-flex">
											<a href="{{ route('add_to_cart', $product->id)}}" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
											<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
											<a href="{{ route('product.details', ['id' => $product->id]) }}" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
										</p>
									</div>
								</div>
								<div class="text text-center">
									<span class="sale">Sale</span>
									<span class="category">Brandy</span>
									<h2>{{$product->name}}</h2>
									<p class="mb-0"><span class="price ">{{$product->price}}</span></p>
								</div>
							</div>
						</div>
						<!-- <div class="col-md-4 d-flex">
							<div class="product ftco-animate">
								<div class="img d-flex align-items-center justify-content-center" style="background-image: url(asset/images/prod-4.jpg);">
									<div class="desc">
										<p class="meta-prod d-flex">
											<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
											<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
											<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
										</p>
									</div>
								</div>
								<div class="text text-center">
									<span class="category">Rum</span>
									<h2>The Glenlivet</h2>
									<span class="price">$69.00</span>
								</div>
							</div>
						</div> -->
						
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

				<div class="col-md-3">
					<div class="sidebar-box ftco-animate">
						<div class="categories">
							<h3>Product Types</h3>
							@foreach($categories as $category)
							<ul class="p-0">
								<li><a href="#">{{$category->name}}<span class="fa fa-chevron-right"></span></a></li>
								<!-- <li><a href="#">Gin <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Rum <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Tequila <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Vodka <span class="fa fa-chevron-right"></span></a></li>
								<li><a href="#">Whiskey <span class="fa fa-chevron-right"></span></a></li> -->
							</ul>
							@endforeach
						</div>
					</div>

					<div class="sidebar-box ftco-animate">
						<h3>Recent Blog</h3>
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url(asset/images/image_1.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
								<div class="meta">
									<div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
									<div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
								</div>
							</div>
						</div>
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url(asset/images/image_2.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
								<div class="meta">
									<div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
									<div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
								</div>
							</div>
						</div>
						<div class="block-21 mb-4 d-flex">
							<a class="blog-img mr-4" style="background-image: url(asset/images/image_3.jpg);"></a>
							<div class="text">
								<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
								<div class="meta">
									<div><a href="#"><span class="fa fa-calendar"></span> Apr. 18, 2020</a></div>
									<div><a href="#"><span class="fa fa-comment"></span> 19</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection