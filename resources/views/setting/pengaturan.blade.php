<!DOCTYPE html>
<html>
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">

    <title>Pengaturan</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/stylepengaturan.css">

    <script type="text/javascript" src="js/jquery.js"></script>


</head>
<body>

	<ul>
		<a href="/dashboard"><img src="assets/back.png"></a>
		<li class="exite">
			<a class="logout" style="color: #dff9fb;" href="/logout"><img src="assets/logout.png">Logout</a>
		</li>
  		<h1>Halaman Admin   ||</h1>
	</ul>

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
	  <div class="row">
	    <div class="col-5">
	  		<div class="card" style="width: 445px; margin-top: 30px;">
			  <div class="card-header" style="font-size: 18px; background-color: #dff9fb; border-radius: 10px;">
			    Pengaturan Alarm
			  </div>
			  <div class="card-body">
			    <blockquote>
			    	<table class="table">
					  <tbody>
					  	<tr>
					      <th scope="row">Banyak sensor yang digunakan</th>
					      <td> = </td>
					      <td id="banyaksensor1"></td>
					      <td> Buah </td>
					    </tr>
					    <tr>
					      <th scope="row">Alarm bunyi saat kondisi bahaya</th>
					      <td> > </td>
					      <td id="persentase1"></td>
					      <td> % </td>
					    </tr>
					  </tbody>
					</table>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAlarm">
					  Edit Alarm
					</button>
			    </blockquote>
			  </div>
			</div>
		</div>
		<div class="col-7">
			<div class="card">
			  <div class="card-header" style="font-size: 18px; background-color: #dff9fb; border-radius: 10px;">
			    Data House
			  </div>
			  <div class="card-body">
			    <blockquote class="blockquote mb-0 text-center">
			    	<div class="row" style="padding: 30px;">
			    		<div class="col-6">
			    			<a href="#"><img src="assets/graph.png" class="img-fluid" alt="Responsive image" data-toggle="modal" data-target="#ModalGraph" style="width: 80px; margin-bottom: 20px;"></a>
			    			<p style="font-size: 15px; font-weight: bold;">Live Grafik <br> Pengukuran</p>
			    		</div>
			    		<div class="col-6">
			    			<a href="/print"><img src="assets/pdf.png" class="img-fluid" alt="Responsive image" style="width: 80px; margin-bottom: 20px;"></a>
			    			<p style="font-size: 15px; font-weight: bold;">Cari Data</p>
			    		</div>
			    	</div>
			    </blockquote>
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
					  <hr style="border: solid 1px #eee;">
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

		<!-- Modal Alarm -->
		<div class="modal fade" id="ModalAlarm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Edit Alarm</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        	<form action="/insertalarm" method="POST">
		        	{{ csrf_field() }}
					  <div class="form-group row">
					  	<label for="inputnormal" class="col-6 col-form-label" style="margin-left: 20px;">Banyaknya sensor yang digunakan</label>
					    <div class="col-5" style="margin-top: 10px;">
					      <input type="text" class="form-control" id="banyaksensor" name="banyak" placeholder="Jumlah sensor">
					    </div>
					  </div>
					    <hr style="border: solid 1px #eee;">
					  <div class="form-group row">
					    <label for="inputnormal" class="col-6 col-form-label" style="margin-left: 20px;">Alarm berbunyi jika bahaya lebih dari </label>
					    <div class="col-5" style="margin-top: 10px;">
					      <input type="text" class="form-control" id="persentase" name="persentase" placeholder="Nilai persentase">
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

		<!-- Modal Live Grafik -->
		<div class="modal fade" id="ModalGraph" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document" id="modgraph">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Live Data</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div id="graph"></div>
		      </div>
		    </div>
		  </div>
		</div>

<script src="js/canvasjs.js"></script>

<script type="text/javascript">
            
      $(document).ready(function(){
         loadBatasan();
         loadAlarm();
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

      function loadAlarm() {
      	$.getJSON('api/alarm', function(data){
        var persentase=(data['alarm'][(Object.keys(data['alarm']).length)-1]['persentase']);
        var banyak=(data['alarm'][(Object.keys(data['alarm']).length)-1]['banyak']);

        $('#persentase1').html(persentase);
        $('#banyaksensor1').html(banyak);
        //console.log(persentase);
        //console.log(banyak);

	  })
      }

      setInterval(function(){
           loadBatasan();
      }, 3000);

      setInterval(function(){
           loadAlarm();
      }, 2000);
</script>

<script type="text/javascript">

window.onload = function () {
	var dataPoints11 = [];
	var dataPoints12 = [];
	var dataPoints13 = [];
	var dataPoints14 = [];
	var dataPoints15 = [];
	var dataPoints16 = [];
	var dataPoints17 = [];
	var dataPoints21 = [];
	var dataPoints22 = [];
	var dataPoints23 = [];
	var dataPoints24 = [];
	var dataPoints25 = [];
	var dataPoints26 = [];
	var dataPoints27 = [];

	console.log(dataPoints12);

	var chart = new CanvasJS.Chart("graph", {
		zoomEnabled: true,
		title: {
			text: "Realtime Grafik Pengukuran",
			fontSize: 22,
			margin: 20,
			fontWeight: "bold", 
			fontFamily: "calibri",
			padding: 10
		},
		axisX: {
			title: "chart updates every 1 secs",
			titleFontSize: 20,
			labelFontSize: 12,
		},
		axisY:{
			//prefix: "mm",
			labelFontSize: 12,
			includeZero: false
		}, 
		toolTip: {
			shared: true
		},
		legend: {
			cursor:"pointer",
			//verticalAlign: "bottom",
			fontSize: 15,
			fontColor: "dimGrey",
			itemclick : toggleDataSeries
		},
		data: [{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					xValueFormatString: "HH:mm:ss",
					showInLegend: true,
					name: "Sensor 11",
					dataPoints: dataPoints11
				},
				{				
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 12" ,
					dataPoints: dataPoints12
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 13",
					dataPoints: dataPoints13
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 14",
					dataPoints: dataPoints14
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 15",
					dataPoints: dataPoints15
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 16",
					dataPoints: dataPoints16
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 17",
					dataPoints: dataPoints17
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 21",
					dataPoints: dataPoints21
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 22",
					dataPoints: dataPoints22
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 23",
					dataPoints: dataPoints23
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 24",
					dataPoints: dataPoints24
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 25",
					dataPoints: dataPoints25
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 26",
					dataPoints: dataPoints26
				},
				{ 
					type: "line",
					xValueType: "dateTime",
					yValueFormatString: "##.0 mm",
					showInLegend: true,
					name: "Sensor 27",
					dataPoints: dataPoints27
				}]
	});

	function toggleDataSeries(e) {
		if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
			e.dataSeries.visible = false;
		}
		else {
			e.dataSeries.visible = true;
		}
		chart.render();
	}

	var updateInterval = 1000;

	// initial value
	/**
	var yValue11 = 1;
	var yValue12 = 2;
	var yValue13 = 3;
	var yValue14 = 1;
	var yValue15 = 2;
	var yValue16 = 4;
	var yValue17 = 5; 
	var yValue21 = 2;
	var yValue22 = 4;
	var yValue23 = 3;
	var yValue24 = 5;
	var yValue25 = 1;
	var yValue26 = 2;
	var yValue27 = 5;
	**/

	var time = new Date;
	// starting at 9.30 am
	time.getHours();
	time.getMinutes();
	time.getSeconds();
	time.getMilliseconds();

	function updateChart() {
		$.getJSON('api/data-sensor', function(data){
        var val = data['datasensor'];
        var sensor = val;
        //console.log(sensor);

		var deltaY11, deltaY12, deltaY13, deltaY14, deltaY15, deltaY16, deltaY17, deltaY21, deltaY22, deltaY23, deltaY24, deltaY25, deltaY26, deltaY27;
		time.setTime(time.getTime()+ updateInterval);
		
		deltaY11 = parseInt(sensor[0].level);
		deltaY12 = parseInt(sensor[1].level);
		deltaY13 = parseInt(sensor[2].level);
		deltaY14 = parseInt(sensor[3].level);
		deltaY15 = parseInt(sensor[4].level);
		deltaY16 = parseInt(sensor[5].level);
		deltaY17 = parseInt(sensor[6].level);

		deltaY21 = parseInt(sensor[7].level);
		deltaY22 = parseInt(sensor[8].level);
		deltaY23 = parseInt(sensor[9].level);
		deltaY24 = parseInt(sensor[10].level);
		deltaY25 = parseInt(sensor[11].level);
		deltaY26 = parseInt(sensor[12].level);
		deltaY27 = parseInt(sensor[13].level);

		// pushing the new values
		dataPoints11.push({
			x: time.getTime(),
			y: deltaY11
		});
		dataPoints12.push({
			x: time.getTime(),
			y: deltaY12
		});
		dataPoints13.push({
			x: time.getTime(),
			y: deltaY13
		});
		dataPoints14.push({
			x: time.getTime(),
			y: deltaY14
		});
		dataPoints15.push({
			x: time.getTime(),
			y: deltaY15
		});
		dataPoints16.push({
			x: time.getTime(),
			y: deltaY16
		});
		dataPoints17.push({
			x: time.getTime(),
			y: deltaY17
		});
		dataPoints21.push({
			x: time.getTime(),
			y: deltaY21
		});
		dataPoints22.push({
			x: time.getTime(),
			y: deltaY22
		});
		dataPoints23.push({
			x: time.getTime(),
			y: deltaY23
		});
		dataPoints24.push({
			x: time.getTime(),
			y: deltaY24
		});
		dataPoints25.push({
			x: time.getTime(),
			y: deltaY25
		});
		dataPoints26.push({
			x: time.getTime(),
			y: deltaY26
		});
		dataPoints27.push({
			x: time.getTime(),
			y: deltaY27
		});

		// updating legend text with  updated with y Value 
		chart.options.data[0].legendText = " Sensor11 : " + deltaY11 + "mm";
		chart.options.data[1].legendText = " Sensor12 : " + deltaY12 + "mm";
		chart.options.data[2].legendText = " Sensor13 : " + deltaY13 + "mm";
		chart.options.data[3].legendText = " Sensor14 : " + deltaY14 + "mm";
		chart.options.data[4].legendText = " Sensor15 : " + deltaY15 + "mm";
		chart.options.data[5].legendText = " Sensor16 : " + deltaY16 + "mm";
		chart.options.data[6].legendText = " Sensor17 : " + deltaY17 + "mm";
		chart.options.data[7].legendText = " Sensor21 : " + deltaY21 + "mm";
		chart.options.data[8].legendText = " Sensor22 : " + deltaY22 + "mm";
		chart.options.data[9].legendText = " Sensor23 : " + deltaY23 + "mm";
		chart.options.data[10].legendText = " Sensor24 : " + deltaY24 + "mm";
		chart.options.data[11].legendText = " Sensor25 : " + deltaY25 + "mm";
		chart.options.data[12].legendText = " Sensor26 : " + deltaY26 + "mm";
		chart.options.data[13].legendText = " Sensor27 : " + deltaY27 + "mm";
		chart.render();
		});
	}
	// generates first set of dataPoints 
	updateChart(1000);	
	setInterval(function(){updateChart()}, updateInterval);

	}
</script>


<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>