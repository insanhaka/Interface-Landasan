<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">

    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">


</head>
<body>


	<ul>
  		<a href="/"><img src="assets/backblack.png"></a>
	</ul>


	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<img src="assets/loginpik.png">
			</div>
			<div class="col-sm-5 offset-sm-3">
				<div class="boxlogin" style="padding: 70px; border-radius: 20px; background-color: #010a1b; box-shadow: 9px 11px 21px -5px rgba(0,0,0,0.93);">

				<h2>Login For Setting Monitoring Water Level System</h2>

				<div class="container">
					<div class="pesan">
						@include('alert')
					</div>
					<form class="form-signin" action="/postlogin" method="POST">
					{{csrf_field()}}
					    <div class="row">
					        <div class="col-md-12 form-group">
					        	<label for="exampleFormControlInput1">Email address</label>
					            <input type="email" id="Email" name="email" class="form-control" placeholder="name@example.com">
					        </div>
					    </div>
					    <div class="row">
					        <div class="col-md-12 form-group">
					        	<label for="exampleInputPassword1">Password</label>
					            <input type="password" id="Password" name="password" placeholder="Enter your Password" class="form-control">
					        </div>
					    </div>
					    <div class="row" style="margin-top: 20px;">
					        <div class="col-md-12 form-group">
					            <button type="submit" class="btn btn-block">Masuk</button>
					        </div>
					    </div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>


<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>