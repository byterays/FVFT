
		<!--Top Companies-->
		<section class="sptb bg-white">
			<div class="container">
				<div class="section-title center-block text-center">
					<h1>Top Companies</h1>
					{{-- <p>Mauris ut cursus nunc. Morbi eleifend, ligula at consectetur vehicula</p> --}}
				</div>
				<div id="company-carousel" class="owl-carousel owl-carousel-icons4">
				   @foreach ($companies as $item)
					   
				   <div class="item">
					   <div class="card mb-0">
						   <div class="card-body">
							   <img src="{{asset('/')}}{{$item->company_logo ?? 'uploads/defaultimage.jpg'}}" alt="company1">
						   </div>
					   </div>
				   </div>
				   @endforeach
				</div>
			</div>
		</section>
		<!--/Top Companies-->