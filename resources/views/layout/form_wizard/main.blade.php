<!DOCTYPE html>
<html lang="en">
<head>
<title> Wizard Form with Validation - Responsive</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="html.design">
<!-- description -->
<meta name="description" content="Wizard Form with Validation - Responsive">
<link rel="shortcut icon" href="{{ url('wizard_form/images/favicon.ico') }}">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ url('wizard_form/css/bootstrap.min.css') }}">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
<!-- Fonts and icons -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700" rel="stylesheet"> 
<!-- Reset CSS -->
<link rel="stylesheet" href="{{ url('wizard_form/css/reset.css') }}">
<!-- Style CSS -->
<link rel="stylesheet" href="{{ url('wizard_form/css/style.css') }}">
<!-- Responsive  CSS -->
<link rel="stylesheet" href="{{ url('wizard_form/css/responsive.css') }}">
</head>
<body>

<div class="wizard-main">
	<div id="particles-js"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="title-wb">Wizard Form with Validation</h2>
			</div>
		</div>
		<div class="row">
			{{-- <div class="col-lg-6 banner-sec">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<img class="d-block img-fluid" src="{{url('wizard_form/images/slider-01.jpg')}}" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text">
									<h2>This is Heaven</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
								</div>	
							</div>
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="{{url('wizard_form/images/slider-02.jpg')}}" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text">
									<h2>This is Heaven</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
								</div>	
							</div>
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="{{url('wizard_form/images/slider-03.jpg')}}" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text">
									<h2>This is Heaven</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
								</div>	
							</div>
						</div>
					</div>	   
				</div>
			</div> --}}
			<div class="col-lg-8 login-sec">
				<div class="login-sec-bg">
					<h2 class="text-center">Account Information</h2>
						@yield('container')
					{{-- <form id="example-advanced-form" action="#" style="display: none;">
						<h3>Account</h3>
						<fieldset class="form-input">
							<h4>Account Information</h4>

							<label for="userName">User name *</label>
							<input id="userName" name="userName" type="text" class="form-control required">
							<label for="password">Password *</label>
							<input id="password" name="password" type="text" class="form-control required">
							<label for="confirm">Confirm Password *</label>
							<input id="confirm" name="confirm" type="text" class="form-control required">
							<p>(*) Mandatory</p>
						</fieldset>

					</form>			 --}}
				</div>
			</div>			
		</div>
		<div class="row">
			<div class="col-lg-12">
				<p class="copyright text-center">All Rights Reserved. &copy; 2018 <a href="#">Wizard Form with Validation</a> Design By : 
					<a href="https://html.design/">html design</a>
				</p>
			</div>
		</div>
	</div>
</div>

<!-- jquery latest version -->
<script src="{{ url('wizard_form/js/jquery.min.js') }}"></script>
<!-- popper.min.js -->
<script src="{{ url('wizard_form/js/popper.min.js') }}"></script>    
<!-- bootstrap js -->
<script src="{{ url('wizard_form/js/bootstrap.min.js') }}"></script>
<!-- jquery.steps js -->
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js'></script>
<script src="{{ url('wizard_form/js/jquery.steps.js') }}"></script>
<!-- particles js -->
<script src="{{ url('wizard_form/js/particles.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		particlesJS("particles-js", 
			{
			  "particles": {
				"number": {
				  "value": 160,
				  "density": {
					"enable": true,
					"value_area": 800
				  }
				},
				"color": {
				  "value": "#ffffff"
				},
				"shape": {
				  "type": "circle",
				  "stroke": {
					"width": 0,
					"color": "#000000"
				  },
				  "polygon": {
					"nb_sides": 5
				  },
				  "image": {
					"src": "img/github.svg",
					"width": 100,
					"height": 100
				  }
				},
				"opacity": {
				  "value": 1,
				  "random": true,
				  "anim": {
					"enable": true,
					"speed": 1,
					"opacity_min": 0,
					"sync": false
				  }
				},
				"size": {
				  "value": 3,
				  "random": true,
				  "anim": {
					"enable": false,
					"speed": 4,
					"size_min": 0.3,
					"sync": false
				  }
				},
				"line_linked": {
				  "enable": false,
				  "distance": 150,
				  "color": "#ffffff",
				  "opacity": 0.4,
				  "width": 1
				},
				"move": {
				  "enable": true,
				  "speed": 1,
				  "direction": "none",
				  "random": true,
				  "straight": false,
				  "out_mode": "out",
				  "bounce": false,
				  "attract": {
					"enable": false,
					"rotateX": 600,
					"rotateY": 600
				  }
				}
			  },
			  "interactivity": {
				"detect_on": "canvas",
				"events": {
				  "onhover": {
					"enable": true,
					"mode": "bubble"
				  },
				  "onclick": {
					"enable": true,
					"mode": "repulse"
				  },
				  "resize": true
				},
				"modes": {
				  "grab": {
					"distance": 400,
					"line_linked": {
					  "opacity": 1
					}
				  },
				  "bubble": {
					"distance": 250,
					"size": 0,
					"duration": 2,
					"opacity": 0,
					"speed": 3
				  },
				  "repulse": {
					"distance": 400,
					"duration": 0.4
				  },
				  "push": {
					"particles_nb": 4
				  },
				  "remove": {
					"particles_nb": 2
				  }
				}
			  },
			  "retina_detect": true
			}
    	);
	});
</script>

<script>
    $(document).ready(function () {
       $(document).on('change','.province',function() {
           let provId = $(this).val();

					 let div = $(this).parent();	
					 let add = " ";

					 $.ajax({
						 type:'get',
						 url:'{{ route('getregencies') }}',
						 data:{'id':provId},
						 success:function(data) {
							//  add += '<option value="0" selected disabled>-Kabupaten-</option>';
							 for(let i=0; i<data.length; i++){
								 add += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
							 }

							 div.find('.regencie').html(" ");
							 div.find('.regencie').append(add);
						 },
						 error:function() {
							 
						 }
					 });
       });

       $(document).on('change','.regencie',function() {
           let regencyId = $(this).val();

					 let div = $(this).parent();	
					 let add = " ";

					 $.ajax({
						 type:'get',
						 url:'{{ route('getdistricts') }}',
						 data:{'id':regencyId},
						 success:function(data) {
							 for(let i=0; i<data.length; i++){
								 add += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
							 }

							 div.find('.district').html(" ");
							 div.find('.district').append(add);
						 },
						 error:function() {
							 
						 }
					 });
       }); 
       
			 $(document).on('change','.district',function() {
           let districtId = $(this).val();

					 let div = $(this).parent();	
					 let add = " ";

					 $.ajax({
						 type:'get',
						 url:'{{ route('getvillages') }}',
						 data:{'id':districtId},
						 success:function(data) {
							 for(let i=0; i<data.length; i++){
								 add += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
							 }

							 div.find('.village').html(" ");
							 div.find('.village').append(add);
						 },
						 error:function() {
							 
						 }
					 });
       }); 

    });
</script>

{{-- <script>
	var form = $("#example-advanced-form").show();

	form.steps({
		headerTag: "h3",
		bodyTag: "fieldset",
		transitionEffect: "slideLeft",
		onStepChanging: function (event, currentIndex, newIndex)
		{
			// Allways allow previous action even if the current form is not valid!
			if (currentIndex > newIndex)
			{
				return true;
			}
			// Forbid next action on "Warning" step if the user is to young
			if (newIndex === 3 && Number($("#age").val()) < 18)
			{
				return false;
			}
			// Needed in some cases if the user went back (clean up)
			if (currentIndex < newIndex)
			{
				// To remove error styles
				form.find(".body:eq(" + newIndex + ") label.error").remove();
				form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
			}
			form.validate().settings.ignore = ":disabled,:hidden";
			return form.valid();
		},
		onStepChanged: function (event, currentIndex, priorIndex)
		{
			// Used to skip the "Warning" step if the user is old enough.
			if (currentIndex === 2 && Number($("#age").val()) >= 18)
			{
				form.steps("next");
			}
			// Used to skip the "Warning" step if the user is old enough and wants to the previous step.
			if (currentIndex === 2 && priorIndex === 3)
			{
				form.steps("previous");
			}
		},
		onFinishing: function (event, currentIndex)
		{
			form.validate().settings.ignore = ":disabled";
			return form.valid();
		},
		onFinished: function (event, currentIndex)
		{
			alert("Submitted!");
		}
	}).validate({
		errorPlacement: function errorPlacement(error, element) { element.before(error); },
		rules: {
			confirm: {
				equalTo: "#password"
			}
		}
	});
</script> --}}

</body>
</html>