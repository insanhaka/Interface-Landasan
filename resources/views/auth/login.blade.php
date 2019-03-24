<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">

    <title>Login</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css">


</head>
<body>

	<ul>
	</ul>

	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<img src="assets/logo.png">
			</div>
			<div class="col-sm-5 offset-sm-3">
				<div class="container" style="border: solid 1px #00475b; padding: 70px; border-radius: 20px; background-color: #00475b; box-shadow: 9px 11px 21px -5px rgba(0,0,0,0.93);">

				<h2>Login Aplikasi Monitoring Water Level</h2>

				<div class="container">
					<div class="pesan">
						@include('alert')
					</div>
					<form class="form-signin" action="/postlogin" method="POST">
					{{csrf_field()}}
					    <div class="row">
					        <div class="col-md-12 form-group">
					            <input type="email" id="Email" name="email" class="form-control" placeholder="Enter your email">
					        </div>
					    </div>
					    <div class="row">
					        <div class="col-md-12 form-group">
					            <input type="password" id="Password" name="password" placeholder="Enter your Password" class="form-control">
					        </div>
					    </div>
					    <div class="row">
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


<script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>