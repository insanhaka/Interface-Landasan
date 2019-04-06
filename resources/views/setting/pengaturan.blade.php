<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">

    <title>Pengaturan</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/stylepengaturan.css">

    <script type="text/javascript" src="js/jquery.js"></script>


</head>
<body>

	<ul>
		<a href="/dashboard"><img src="assets/back.png"></a>
  		<h1>Pengaturan Aplikasi</h1>
	</ul>

	<div class="exite">
		<a class="logout" style="color: #dff9fb;" href="/logout"><img src="assets/logout.png">Logout</a>
	</div>

	<div class="container">
	  <div class="row">
	    <div class="col-5">
	      <div class="card">
			  <div class="card-header" style="font-size: 18px; background-color: #dff9fb; border-radius: 10px;">
			    Pengaturan Treshold
			  </div>
			  <div class="card-body">
			    <blockquote class="blockquote mb-0">
			    	<table class="table">
					  <tbody>
					    <tr>
					      <th scope="row">Batas Normal</th>
					      <td>:</td>
					      <td>x</td>
					      <td><=</td>
					      <td id="normal1"></td>
					      <td>mm</td>
					    </tr>
					    <tr>
					      <th scope="row">Batas Waspada</th>
					      <td>:</td>
					      <td id="normal2"></td>
					      <td>< x <</td>
					      <td id="bahaya1"></td>
					      <td>mm</td>
					    </tr>
					    <tr>
					      <th scope="row">Batas Bahaya</th>
					      <td>:</td>
					      <td>x</td>
					      <td>>=</td>
					      <td id="bahaya2"></td>
					      <td>mm</td>
					    </tr>
					  </tbody>
					</table>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalBatasan">
					  Edit Treshold
					</button>
			    </blockquote>
			  </div>
			</div>
	    </div>
	    <div class="col-7">
	      <div class="card">
			  <div class="card-header" style="font-size: 18px; background-color: #dff9fb; border-radius: 10px;">
			    Pengaturan Admin
			  </div>
			  <div class="card-body">
			    <blockquote class="blockquote mb-0">
			    	<table class="table">
					  <thead class="thead-light">
					    <tr>
					      <th scope="col">Nama</th>
					      <th scope="col">Email</th>
					      <th scope="col">Pengaturan</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($data_admin as $admin)
					    <tr>
					      <td>{{$admin->name}}</td>
					      <td>{{$admin->email}}</td>
					      <td>
					      	<div class="row justify-content-center">
					      		<a class="btn btn-sm btn-danger" href="/admin/{{$admin->id}}/hapus" role="button">Hapus</a>
					      	</div>
					      </td>
					    </tr>
					    @endforeach
					  </tbody>
					</table>
					<a class="btn btn-primary" href="/register" role="button">Tambah Admin</a>
			    </blockquote>
			  </div>
			</div>
	    </div>
	  </div>
	</div>


	<!-- Modal Batasan -->
		<div class="modal fade" id="ModalBatasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Edit Treshold</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        	<form action="/insertbatasan" method="POST">
		        	{{ csrf_field() }}
					  <div class="form-group row">
					    <label for="inputnormal" class="col-4 col-form-label" style="margin-left: 20px;">Batas Normal  x <= </label>
					    <div class="col-7">
					      <input type="text" class="form-control" id="normal" name="normal" placeholder="Nilai dalam milimeter">
					    </div>
					  </div>
					  <div class="form-group row" style="margin-top: 10px;">
					    <label for="inputbahaya" class="col-4 col-form-label" style="margin-left: 20px;">Batas Bahaya  x >= </label>
					    <div class="col-7">
					      <input type="text" class="form-control" id="bahaya" name="bahaya" placeholder="Nilai dalam milimeter">
					    </div>
					  </div>
					  <button type="submit" class="btn btn-primary" style="margin-right: 20px; width: 100px;">
					  	Save
					  </button>
					</form>
		      </div>
		    </div>
		  </div>
		</div>

<script type="text/javascript">
            
      $(document).ready(function(){
         loadBatasan();
      })

      function loadBatasan() {
        $.getJSON('api/batasan', function(data){
        var normal=(data['batasan'][(Object.keys(data['batasan']).length)-1]['normal']);
        var bahaya=(data['batasan'][(Object.keys(data['batasan']).length)-1]['bahaya']);

        $('#normal1').html(normal);
        $('#bahaya1').html(bahaya);
        $('#normal2').html(normal);
        $('#bahaya2').html(bahaya);

	  })
      }

      setInterval(function(){
           loadBatasan();
      }, 1000);

</script>


<script src="js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>