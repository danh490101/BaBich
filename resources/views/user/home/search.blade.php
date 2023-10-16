@extends('layouts.app')
@section('content')
<div>
	<section class="hero-wrap hero-wrap-2" style="background-image: url('asset/images/bg_2.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-end justify-content-center">
				<div class="col-md-9 ftco-animate mb-5 text-center">
					<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Trang chủ <i class="fa fa-chevron-right"></i></a></span> <span>Sản phẩm tìm kiếm <i class="fa fa-chevron-right"></i></span></p>
					<h2 class="mb-0 bread">Tìm kiếm</h2>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						@foreach ($results as $result)
						<div class="col-md-4 d-flex">
							<div class="product ftco-animate">
								<div class="img d-flex align-items-center justify-content-center" style="background-image: url({{asset('storage/'.$result->image)}})">
									<div class="desc">
										<p class="meta-prod d-flex">
											<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
											<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
											<a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
										</p>
									</div>
								</div>
								<div class="text text-center">
									<!-- <span class="sale">Sale</span> -->
									<span class="category">Brandy</span>
									<h2>{{$result->name}}</h2>
									<p class="mb-0"><span class="price ">{{$result->price}}</span></p>
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
				<div class="col-md-3">
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