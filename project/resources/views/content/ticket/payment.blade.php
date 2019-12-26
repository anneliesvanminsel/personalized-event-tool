@extends('layouts.masterlayout')
@section('title')
	evento - maak event
@endsection
@section('content')
	<section class="page-alignment spacing-top-m">
		<h1>
			{{ $event['title'] }} - {{ $ticket['name'] }}
		</h1>
		<p>
			Na betaling zal het ticket in uw account op de website of via tickets in uw applicatie te vinden zijn. <br>
			U kunt niet afzien van de aankoop van het ticket.
		</p>
		
		<p class="spacing-top-m">
			Prijs: € {{ $ticket['price'] }}
		</p>
		
		<style>
			.btn {
				border-color: {{ $event['bkgcolor'] }};
				color: {{ $event['bkgcolor'] }}
			
			}
			
			.btn:hover {
				background-color: {{ $event['bkgcolor'] }};
				color: {{ $event['textcolor'] }};
			}
		</style>
		
		<form method="POST" action="{{ route('event.postcreate', ['organisation_id' => 1]) }}"
		      class="form spacing-top-m" enctype="multipart/form-data">
			@csrf
			
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mx-auto">
						<div class="card" style="border-color: {{ $event['bkgcolor'] }};">
							<div class="card-header">
								<div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
									<!-- Credit card form tabs -->
									<ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
										<li class="nav-item">
											<a data-toggle="pill" href="#credit-card" class="nav-link active ">
												<i class="fas fa-credit-card mr-2"></i>
												Credit Card
											</a>
										</li>
										<li class="nav-item">
											<a data-toggle="pill" href="#paypal" class="nav-link ">
												<i class="fab fa-paypal mr-2"></i>
												Paypal
											</a>
										</li>
										<li class="nav-item">
											<a data-toggle="pill" href="#net-banking" class="nav-link ">
												<i class="fas fa-mobile-alt mr-2"></i>
												Net Banking
											</a>
										</li>
									</ul>
								</div> <!-- End -->
								<!-- Credit card form content -->
								<div class="tab-content spacing-top-m">
									<!-- credit card info-->
									<div id="credit-card" class="tab-pane fade show active pt-3">
										<div class="form__group">
											<input
													class="form__input"
													type="text"
													name="username"
													placeholder="bv. Jan Peeters"
													style="border-color: {{ $event['bkgcolor'] }};"
											>
											<label class="form__label" for="username">
												Naam op de kaart
											</label>
										</div>
										
										<div class="form__group">
											<input type="text" name="cardNumber" placeholder="Valid card number"
											       class="form__input"
											       style="border-color: {{ $event['bkgcolor'] }};"
											>
											
											<label class="form__label" for="cardNumber">
												Kaartnummer
											</label>
										</div>
										
										<div class="row">
											<div class="col-sm-8 spacing-top-s">
												<h3>
													Expiration Date
												</h3>
												<div class="row row--stretch">
													<div class="form__group">
														<input type="number" placeholder="maand" name=""
														       class="form-control" style="border-color: {{ $event['bkgcolor'] }};"
														>
														<label class="form__label">
															maand
														</label>
													</div>
													<div class="form__group">
														<input type="number" placeholder="jaar" name=""
														       class="form-control" style="border-color: {{ $event['bkgcolor'] }};"
														>
														<label class="form__label">
															jaar
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="spacing-top-m">
											<button type="submit" class="btn">
												Betalen
											</button>
										</div>
									</div>
								</div> <!-- End -->
								<!-- Paypal info -->
								<div id="paypal" class="tab-pane fade pt-3">
									<h6 class="pb-2">Select your paypal account type</h6>
									<div class="form-group "><label class="radio-inline"> <input type="radio"
									                                                             name="optradio"
									                                                             checked> Domestic
										</label> <label class="radio-inline"> <input type="radio" name="optradio"
									                                                 class="ml-5">International </label>
									</div>
									<p>
										<button type="button" class="btn btn-primary ">
											<i class="fab fa-paypal mr-2"></i>
											Log into my Paypal
										</button>
									</p>
									<p class="text-muted"> Note: After clicking on the button, you will be directed to a
										secure gateway for payment. After completing the payment process, you will be
										redirected back to the website to view details of your order. </p>
								</div> <!-- End -->
								<!-- bank transfer info -->
								<div id="net-banking" class="tab-pane fade pt-3">
									<label class="form__label" for="Select Your Bank">
										Select your Bank
									</label>
									<div class="form-group ">
										<select class="form__input custom-select" id="ccmonth">
											<option value="" selected disabled>--Please select your Bank--</option>
											<option>Bank 1</option>
											<option>Bank 2</option>
											<option>Bank 3</option>
											<option>Bank 4</option>
											<option>Bank 5</option>
											<option>Bank 6</option>
											<option>Bank 7</option>
											<option>Bank 8</option>
											<option>Bank 9</option>
											<option>Bank 10</option>
										</select>
									
									</div>
									<div class="spacing-top-m">
										<button type="submit" class="btn">
											Betalen
										</button>
									</div>
									<p class="text-muted">Note: After clicking on the button, you will be directed to a
										secure gateway for payment. After completing the payment process, you will be
										redirected back to the website to view details of your order. </p>
								</div> <!-- End -->
								<!-- End -->
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<script>
                ( ()=> {
                    const buttons = document.querySelectorAll('.faq__question');
                    buttons.forEach((button) => {
                        button.addEventListener('click', () => {
                            const { target } = button.dataset;
                            document.getElementById(target).classList.toggle('is-open');
                        });
                    });
                })();
			</script>
			
		</form>
	</section>
@endsection