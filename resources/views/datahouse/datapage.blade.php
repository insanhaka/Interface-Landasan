<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pengaturan</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styledatapage.css">

    <script type="text/javascript" src="js/jquery.js"></script>


</head>
<body>

	<ul class="navbar">
		<a href="/pengaturan"><img src="assets/back.png"></a>
  		<h1>Halaman Data Pengukuran</h1>
	</ul>
	
	<!--
	<div class="datasheet">
		<div class="container">
			<h3>Data Pengukuran Ketinggian Air Pada Landasan Pacu</h3>
			<hr style="border: solid 1px #aaa; margin-bottom: 30px;">

			<label>Ambil data mulai dari :</label> <br>
			<input id="dataawal" type="datetime-local" name="awal">
			<label style="margin-right: 5px; margin-left: 5px;">Sampai dengan</label>
			<input id="dataakhir" type="datetime-local" name="akhir">
			
			<table class="table table-sm text-center">
			  <thead class="thead-light">
			    <tr>
			      <th scope="col">NO</th>
			      <th scope="col">Waktu</th>
			      <th scope="col">Ketinggian Air (mm)</th>
			      <th scope="col">IP Sensor</th>
			      <th scope="col">Status</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>--/--/----/--:--</td>
			      <td>2</td>
			      <td>192.168.1.11</td>
			      <td>Normal</td>
			    </tr>
			    <tr>
			      <th scope="row">2</th>
			      <td>--/--/----/--:--</td>
			      <td>1</td>
			      <td>192.168.1.12</td>
			      <td>Normal</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td>--/--/----/--:--</td>
			      <td>3</td>
			      <td>192.168.1.13</td>
			      <td>Normal</td>
			    </tr>
			  </tbody>
			</table>

		</div>
	</div>
	-->

	<!-- Data Print Disini -->
	<div id="dataprint"></div>


	<script type="text/javascript" src="../js/app.js"></script>
	
<!--
<script type="text/javascript">

	$('[name="awal"]').on('change',function() {
  		var dataAwal = $(this).val();
  		console.log((new Date(dataAwal)).getTime());
	})
	
</script>
-->

</body>
</html>