<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">

    <title>Record Data</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styledatapage.css">

	<link rel="stylesheet" href="css/fontawesome.css">
	<link rel="stylesheet" href="css/all.css">
	<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
	<link href="css/icon.css" rel="stylesheet">

    <script type="text/javascript" src="js/jquery.js"></script>

    <!-- Plotly.js -->
  	<script type="text/javascript" src="js/plotly.min.js"></script>


</head>
<body>

	<ul class="navbar">
		<a href="/pengaturan"><img src="assets/back.png"></a>
  		<h1>Record Data Pengukuran</h1>
	</ul>

	<div class="container" style="margin-top: 3%;">
		<p style="font-size: 21px; font-weight: bold;">Pilih record data yang dibutuhkan berdasarkan tanggal dan waktu</p>
		<div class="row justify-content-start">
		    <div class="col-3">
		      	<div class="input-group mb-2">
			        <input type="text" class="form-control" id="waktuawal" placeholder="Select date and time">
			        <div class="input-group-prepend">
			          <i class="material-icons md-36" id='datetimepicker1'>date_range</i>
			        </div>
			    </div>
		    </div>
		    <div class="col-1">
		    	<p style="margin-top: 5px;">Sampai</p>
		    </div>
		    <div class="col-3">
		      <div class="input-group mb-2">
			        <input type="text" class="form-control" id="waktuakhir" placeholder="Select date and time">
			        <div class="input-group-prepend">
			          <i class="material-icons md-36" id='datetimepicker1'>date_range</i>
			        </div>
			    </div>
		    </div>
		    <div class="col-1">
		    	<button class="btn btn-primary" type="submit" id="cari" style="width: 80px;">Cari</button>
		    </div>
		</div>
	</div>
	<div class="container" style="margin-top: 3%;">
		<p style="font-size: 18px; font-weight: bold;">Hasil data yang ditemukan pada database</p>
		<div id="myDiv"><!-- Plotly chart will be drawn inside this DIV --></div>
	</div>


	<!-- KOMPONEN DATE TIME PICKER -->
	<script src="js/moment-with-locales.min.js" type="text/javascript"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>
    <!-- // KOMPONEN DATE TIME PICKER -->


    <script type="text/javascript">

    	$(document).ready(function(){
              dataSensor();
              dataTreshold();
              handleCari();
            })

		//Semua data sensor
		var datasensor = {};

		// Data Treshold
		var bahaya = [];
		var normal = [];

		//Data waktu pilihan
		var startTime = [];
		var finishTime = [];


		//Get Data Batsan
		function dataTreshold() {
			$.getJSON('api/batasan', function(data){
				var nilaibatasan = data['batasan'];

				 for (var i = 0; i < nilaibatasan.length; i++) {
					var batasnormal = nilaibatasan[i].normal;
					var batasbahaya = nilaibatasan[i].bahaya;

					bahaya = batasbahaya;
					normal = batasnormal;
	            }
				
			});
		}
		//Akhir get data batasan

		//Get Data Sensor
		function dataSensor() {
			$.getJSON('/api/data-print', function(data){
				var sensor = data['dataprint'];
				datasensor = sensor;

				var now = Math.floor(new Date().getTime()/1000)+3*8395;
			});
		}
		//Akhir Get Data Sensor

		//Coding Filter Data
		function handleCari() {

			$('#cari').click(function() {
				var dataSortir = datasensor
				.filter(function(data) {
					var datawaktu = Date.parse(data.waktu)/1000 + 3 * 8400;
					//console.log(datawaktu);
					return (datawaktu > startTime && datawaktu < finishTime)
				});

				//Data Untuk Grafik
			//DATA SENSOR BARIS 1
				//Data 11
				var datasensor11 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.11')
				});
				var level11 = datasensor11
				.map(function (data, index) {
					return(data.level)
				});
				var waktu11 = datasensor11
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 12
				var datasensor12 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.12')
				});
				var level12 = datasensor12
				.map(function (data, index) {
					return(data.level)
				});
				var waktu12 = datasensor12
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 13
				var datasensor13 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.13')
				});
				var level13 = datasensor13
				.map(function (data, index) {
					return(data.level)
				});
				var waktu13 = datasensor13
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 14
				var datasensor14 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.14')
				});
				var level14 = datasensor14
				.map(function (data, index) {
					return(data.level)
				});
				var waktu14 = datasensor14
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 15
				var datasensor15 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.15')
				});
				var level15 = datasensor15
				.map(function (data, index) {
					return(data.level)
				});
				var waktu15 = datasensor15
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 16
				var datasensor16 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.16')
				});
				var level16 = datasensor16
				.map(function (data, index) {
					return(data.level)
				});
				var waktu16 = datasensor16
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 17
				var datasensor17 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.17')
				});
				var level17 = datasensor17
				.map(function (data, index) {
					return(data.level)
				});
				var waktu17 = datasensor17
				.map(function (data, index) {
					return(data.waktu)
				});
		//DATA SENSOR BARIS 2
				//Data 21
				var datasensor21 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.21')
				});
				var level21 = datasensor21
				.map(function (data, index) {
					return(data.level)
				});
				var waktu21 = datasensor21
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 22
				var datasensor22 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.22')
				});
				var level22 = datasensor22
				.map(function (data, index) {
					return(data.level)
				});
				var waktu22 = datasensor22
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 23
				var datasensor23 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.23')
				});
				var level23 = datasensor23
				.map(function (data, index) {
					return(data.level)
				});
				var waktu23 = datasensor23
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 24
				var datasensor24 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.24')
				});
				var level24 = datasensor24
				.map(function (data, index) {
					return(data.level)
				});
				var waktu24 = datasensor24
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 25
				var datasensor25 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.25')
				});
				var level25 = datasensor25
				.map(function (data, index) {
					return(data.level)
				});
				var waktu25 = datasensor25
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 26
				var datasensor26 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.26')
				});
				var level26 = datasensor26
				.map(function (data, index) {
					return(data.level)
				});
				var waktu26 = datasensor26
				.map(function (data, index) {
					return(data.waktu)
				});
				//Data 27
				var datasensor27 = dataSortir
				.filter(function (val) {
					return (val.ip == '192.168.1.27')
				});
				var level27 = datasensor27
				.map(function (data, index) {
					return(data.level)
				});
				var waktu27 = datasensor27
				.map(function (data, index) {
					return(data.waktu)
				});

			
			//DATA GRAFIK BARIS 1
				var trace11 = {
				  x: waktu11,
				  y: level11,
				  mode: 'lines+markers',
				  name: 'Sensor11',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace12 = {
				  x: waktu12,
				  y: level12,
				  mode: 'lines+markers',
				  name: 'Sensor12',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace13 = {
				  x: waktu13,
				  y: level13,
				  mode: 'lines+markers',
				  name: 'Sensor13',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace14 = {
				  x: waktu14,
				  y: level14,
				  mode: 'lines+markers',
				  name: 'Sensor14',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace15 = {
				  x: waktu15,
				  y: level15,
				  mode: 'lines+markers',
				  name: 'Sensor15',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace16 = {
				  x: waktu16,
				  y: level16,
				  mode: 'lines+markers',
				  name: 'Sensor16',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace17 = {
				  x: waktu17,
				  y: level17,
				  mode: 'lines+markers',
				  name: 'Sensor17',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};

			//DATA GRAFIK BARIS 2
				var trace21 = {
				  x: waktu21,
				  y: level21,
				  mode: 'lines+markers',
				  name: 'Sensor21',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace22 = {
				  x: waktu22,
				  y: level22,
				  mode: 'lines+markers',
				  name: 'Sensor22',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace23 = {
				  x: waktu23,
				  y: level23,
				  mode: 'lines+markers',
				  name: 'Sensor23',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace24 = {
				  x: waktu24,
				  y: level24,
				  mode: 'lines+markers',
				  name: 'Sensor24',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace25 = {
				  x: waktu25,
				  y: level25,
				  mode: 'lines+markers',
				  name: 'Sensor25',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace26 = {
				  x: waktu26,
				  y: level26,
				  mode: 'lines+markers',
				  name: 'Sensor26',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};
				var trace27 = {
				  x: waktu27,
				  y: level27,
				  mode: 'lines+markers',
				  name: 'Sensor27',
				  line: {shape: 'spline'},
				  type: 'scatter'
				};


				var data = [trace11, trace12, trace13, trace14, trace15, trace16, trace17, trace21, trace22, trace23, trace24, trace25, trace26, trace27];

				var layout = {
				  title: 'Grafik Record Data Pengukuran Sensor',
				  xaxis: {
				    //range: [0.75, 5.25],
				    autorange: true,
				    title: 'Tanggal Dan Waktu',
				    showline: true,
				    type: "date",
				  },
				  yaxis: {
				    range: [0, 10],
				    autorange: false,
				    title: 'Level Air (mm)',
				    showline: true,
				    rangemode: 'tozero',
				    scaleratio: 0.5,
				  },
				  legend: {
				    y: 1,
				    traceorder: 'reversed',
				    font: {
				      size: 12
				    },
				    yref: 'paper',
				  }
				};

				Plotly.newPlot('myDiv', data, layout);

			});

		}
		//Akhir coding Filter Data


		$('#waktuawal').datetimepicker({
            locale: 'id',
            format: 'Do MMMM YYYY,  HH : mm',
       	}).on('dp.change', function(waktuawal){
		    var awal = waktuawal.date['_d'].getTime()/1000 + 3 * 8398;
			startTime = awal;
			//console.log(awal);
		})

    
    	$('#waktuakhir').datetimepicker({
            locale: 'id',
            format: 'Do MMMM YYYY,  HH : mm',
    	}).on('dp.change', function(waktuakhir){
		    var akhir = waktuakhir.date['_d'].getTime()/1000 + 3 * 8398;
			finishTime = akhir;
			//console.log(akhir);
		})


		setInterval(function(){
		   dataSensor();
		 }, 1000);

    </script>


</body>
</html>