$(document).ready(function(){
              loadData();
            })

	  
	  	var suara = document.createElement('audio');
		  	suara.src = "assets/alarm.mp3";
		  	//suara.load();
		  	//suara.autoPlay = false;
		  	suara.loop = false;
		  	//suara.preLoad = true;
			//suara.controls = true;
		  	suara.muted = false 


      function loadData() {
        $.getJSON('api/batasan', function(data){
        var normal=(data['batasan'][(Object.keys(data['batasan']).length)-1]['normal']);
        var awas=(data['batasan'][(Object.keys(data['batasan']).length)-1]['bahaya']);

        $.getJSON('api/data-sensor', function(data){
        var val = data['datasensor'];
        var res = data['nilaisensor'];
        var sensor = val;
        var nilai = res;

        var Aman = ('AMAN');
	      var Waspada = ('WASPADA');
	      var Bahaya = ('BAHAYA');
	      var On = ('ON');
      	var Off = ('OFF');
      	var mati = ('---');
      	var nilaioff = ('-');
      	var now = Math.floor(new Date().getTime()/1000)+3*8395;

		var syaratbunyi = awas * 14 * 0.25 ;
		
		var total = 0;
		for (var i = 0; i < sensor.length; i++) {
			total += parseInt(sensor[i].level);

			if (total >= syaratbunyi) {
				suara.play();
			}else{
				suara.pause();
			}
		}
		
        for (var i in sensor){
          if (sensor[i].ip == "192.168.1.11") {
            var sensor11 = sensor[i].level;
            var waktusensor11 = sensor[i].waktu;
			
            if (sensor11 >= awas){
            	$('#indikatora').removeClass('ubahwarnaorange');
	            $('#indikatora').removeClass('ubahwarnahijau');
	            $('#indikatora').addClass('ubahwarnamerah');
	            $('#Statusa').html(Bahaya);
	            $('#Statusa').removeClass('warnaorange');
	            $('#Statusa').removeClass('warnahijau');
	            $('#Statusa').addClass('warnamerah');
            }else if (sensor11 > normal) {
	            $('#indikatora').removeClass('ubahwarnamerah');
	            $('#indikatora').removeClass('ubahwarnahijau');
	            $('#indikatora').addClass('ubahwarnaorange');
	            $('#Statusa').html(Waspada);
	            $('#Statusa').removeClass('warnamerah');
	            $('#Statusa').removeClass('warnahijau');
	            $('#Statusa').addClass('warnaorange');
	          }else {
	            $('#indikatora').removeClass('ubahwarnamerah');
	            $('#indikatora').removeClass('ubahwarnaorange');
	            $('#indikatora').addClass('ubahwarnahijau');
	            $('#Statusa').html(Aman);
	            $('#Statusa').removeClass('warnaorange');
	            $('#Statusa').removeClass('warnamerah');
	            $('#Statusa').addClass('warnahijau');
	          }
	         if (waktusensor11 < now){
	         	$('#ONa').html(Off);
	         	$('#ONa').removeClass('warnaon');
	         	$('#ONa').addClass('warnaoff');
	            $('#indikatora').addClass('warnaoff');
	            $('#Statusa').addClass('warnaoff');
	            $('#ketinggiana').html(nilaioff);
	            $('#Statusa').html(mati);
	         }else{
	         	$('#ONa').html(On);
	         	$('#ONa').removeClass('warnaoff');
	         	$('#ONa').addClass('warnaon');
	         	$('#indikatora').removeClass('warnaoff');
	         	$('#Statusa').removeClass('warnaoff');
	         	$('#ketinggiana').html(sensor11);
	         }

            

          }else if (sensor[i].ip == "192.168.1.12") {
            var sensor12 = sensor[i].level;
            var waktusensor12 = sensor[i].waktu;

            if (sensor12 >= awas){
            	$('#indikatorb').removeClass('ubahwarnaorange');
	            $('#indikatorb').removeClass('ubahwarnahijau');
	            $('#indikatorb').addClass('ubahwarnamerah');
	            $('#Statusb').html(Bahaya);
	            $('#Statusb').removeClass('warnaorange');
	            $('#Statusb').removeClass('warnahijau');
	            $('#Statusb').addClass('warnamerah');
            }else if (sensor12 > normal) {
	            $('#indikatorb').removeClass('ubahwarnamerah');
	            $('#indikatorb').removeClass('ubahwarnahijau');
	            $('#indikatorb').addClass('ubahwarnaorange');
	            $('#Statusb').html(Waspada);
	            $('#Statusb').removeClass('warnamerah');
	            $('#Statusb').removeClass('warnahijau');
	            $('#Statusb').addClass('warnaorange');
	          }else {
	            $('#indikatorb').removeClass('ubahwarnamerah');
	            $('#indikatorb').removeClass('ubahwarnaorange');
	            $('#indikatorb').addClass('ubahwarnahijau');
	            $('#Statusb').html(Aman);
	            $('#Statusb').removeClass('warnaorange');
	            $('#Statusb').removeClass('warnamerah');
	            $('#Statusb').addClass('warnahijau');
	          }
	          if (waktusensor12 < now){
	         	$('#ONb').html(Off);
	         	$('#ONb').removeClass('warnaon');
	         	$('#ONb').addClass('warnaoff');
	            $('#indikatorb').addClass('warnaoff');
	            $('#Statusb').addClass('warnaoff');
	            $('#ketinggianb').html(nilaioff);
	            $('#Statusb').html(mati);
	         }else{
	         	$('#ONb').html(On);
	         	$('#ONb').removeClass('warnaoff');
	         	$('#ONb').addClass('warnaon');
	         	$('#indikatorb').removeClass('warnaoff');
	         	$('#Statusb').removeClass('warnaoff');
	         	$('#ketinggianb').html(sensor12);
	         }

            //$('#ketinggianb').html(sensor12);

          }else if (sensor[i].ip == "192.168.1.13") {
            var sensor13 = sensor[i].level;
            var waktusensor13 = sensor[i].waktu;

            if (sensor13 >= awas){
            	$('#indikatorc').removeClass('ubahwarnaorange');
	            $('#indikatorc').removeClass('ubahwarnahijau');
	            $('#indikatorc').addClass('ubahwarnamerah');
	            $('#Statusc').html(Bahaya);
	            $('#Statusc').removeClass('warnaorange');
	            $('#Statusc').removeClass('warnahijau');
	            $('#Statusc').addClass('warnamerah');
            }else if (sensor13 > normal) {
	            $('#indikatorc').removeClass('ubahwarnamerah');
	            $('#indikatorc').removeClass('ubahwarnahijau');
	            $('#indikatorc').addClass('ubahwarnaorange');
	            $('#Statusc').html(Waspada);
	            $('#Statusc').removeClass('warnamerah');
	            $('#Statusc').removeClass('warnahijau');
	            $('#Statusc').addClass('warnaorange');
	          }else {
	            $('#indikatorc').removeClass('ubahwarnamerah');
	            $('#indikatorc').removeClass('ubahwarnaorange');
	            $('#indikatorc').addClass('ubahwarnahijau');
	            $('#Statusc').html(Aman);
	            $('#Statusc').removeClass('warnaorange');
	            $('#Statusc').removeClass('warnamerah');
	            $('#Statusc').addClass('warnahijau');
	          }
	          if (waktusensor13 < now){
	         	$('#ONc').html(Off);
	         	$('#ONc').removeClass('warnaon');
	         	$('#ONc').addClass('warnaoff');
	            $('#indikatorc').addClass('warnaoff');
	            $('#Statusc').addClass('warnaoff');
	            $('#ketinggianc').html(nilaioff);
	            $('#Statusc').html(mati);
	         }else{
	         	$('#ONc').html(On);
	         	$('#ONc').removeClass('warnaoff');
	         	$('#ONc').addClass('warnaon');
	         	$('#indikatorc').removeClass('warnaoff');
	         	$('#Statusc').removeClass('warnaoff');
	         	$('#ketinggianc').html(sensor13);
	         }

            //$('#ketinggianc').html(sensor13);

          }else if (sensor[i].ip == "192.168.1.14") {
            var sensor14 = sensor[i].level;
            var waktusensor14 = sensor[i].waktu;

            if (sensor14 >= awas){
            	$('#indikatord').removeClass('ubahwarnaorange');
	            $('#indikatord').removeClass('ubahwarnahijau');
	            $('#indikatord').addClass('ubahwarnamerah');
	            $('#Statusd').html(Bahaya);
	            $('#Statusd').removeClass('warnaorange');
	            $('#Statusd').removeClass('warnahijau');
	            $('#Statusd').addClass('warnamerah');
            }else if (sensor14 > normal) {
	            $('#indikatord').removeClass('ubahwarnamerah');
	            $('#indikatord').removeClass('ubahwarnahijau');
	            $('#indikatord').addClass('ubahwarnaorange');
	            $('#Statusd').html(Waspada);
	            $('#Statusd').removeClass('warnamerah');
	            $('#Statusd').removeClass('warnahijau');
	            $('#Statusd').addClass('warnaorange');
	          }else {
	            $('#indikatord').removeClass('ubahwarnamerah');
	            $('#indikatord').removeClass('ubahwarnaorange');
	            $('#indikatord').addClass('ubahwarnahijau');
	            $('#Statusd').html(Aman);
	            $('#Statusd').removeClass('warnaorange');
	            $('#Statusd').removeClass('warnamerah');
	            $('#Statusd').addClass('warnahijau');
	          }
	          if (waktusensor14 < now){
	         	$('#ONd').html(Off);
	         	$('#ONd').removeClass('warnaon');
	         	$('#ONd').addClass('warnaoff');
	            $('#indikatord').addClass('warnaoff');
	            $('#Statusd').addClass('warnaoff');
	            $('#ketinggiand').html(nilaioff);
	            $('#Statusd').html(mati);
	         }else{
	         	$('#ONd').html(On);
	         	$('#ONd').removeClass('warnaoff');
	         	$('#ONd').addClass('warnaon');
	         	$('#indikatord').removeClass('warnaoff');
	         	$('#Statusd').removeClass('warnaoff');
	         	$('#ketinggiand').html(sensor14);
	         }

            //$('#ketinggiand').html(sensor14);

          }else if (sensor[i].ip == "192.168.1.15") {
            var sensor15 = sensor[i].level;
            var waktusensor15 = sensor[i].waktu;

            if (sensor15 >= awas){
            	$('#indikatore').removeClass('ubahwarnaorange');
	            $('#indikatore').removeClass('ubahwarnahijau');
	            $('#indikatore').addClass('ubahwarnamerah');
	            $('#Statuse').html(Bahaya);
	            $('#Statuse').removeClass('warnaorange');
	            $('#Statuse').removeClass('warnahijau');
	            $('#Statuse').addClass('warnamerah');
            }else if (sensor15 > normal) {
	            $('#indikatore').removeClass('ubahwarnamerah');
	            $('#indikatore').removeClass('ubahwarnahijau');
	            $('#indikatore').addClass('ubahwarnaorange');
	            $('#Statuse').html(Waspada);
	            $('#Statuse').removeClass('warnamerah');
	            $('#Statuse').removeClass('warnahijau');
	            $('#Statuse').addClass('warnaorange');
	          }else {
	            $('#indikatore').removeClass('ubahwarnamerah');
	            $('#indikatore').removeClass('ubahwarnaorange');
	            $('#indikatore').addClass('ubahwarnahijau');
	            $('#Statuse').html(Aman);
	            $('#Statuse').removeClass('warnaorange');
	            $('#Statuse').removeClass('warnamerah');
	            $('#Statuse').addClass('warnahijau');
	          }
	          if (waktusensor15 < now){
	         	$('#ONe').html(Off);
	         	$('#ONe').removeClass('warnaon');
	         	$('#ONe').addClass('warnaoff');
	            $('#indikatore').addClass('warnaoff');
	            $('#Statuse').addClass('warnaoff');
	            $('#ketinggiane').html(nilaioff);
	            $('#Statuse').html(mati);
	         }else{
	         	$('#ONe').html(On);
	         	$('#ONe').removeClass('warnaoff');
	         	$('#ONe').addClass('warnaon');
	         	$('#indikatore').removeClass('warnaoff');
	         	$('#Statuse').removeClass('warnaoff');
	         	$('#ketinggiane').html(sensor15);
	         }

            //$('#ketinggiane').html(sensor15);

          }else if (sensor[i].ip == "192.168.1.16") {
            var sensor16 = sensor[i].level;
            var waktusensor16 = sensor[i].waktu;

            if (sensor16 >= awas){
            	$('#indikatorf').removeClass('ubahwarnaorange');
	            $('#indikatorf').removeClass('ubahwarnahijau');
	            $('#indikatorf').addClass('ubahwarnamerah');
	            $('#Statusf').html(Bahaya);
	            $('#Statusf').removeClass('warnaorange');
	            $('#Statusf').removeClass('warnahijau');
	            $('#Statusf').addClass('warnamerah');
            }else if (sensor16 > normal) {
	            $('#indikatorf').removeClass('ubahwarnamerah');
	            $('#indikatorf').removeClass('ubahwarnahijau');
	            $('#indikatorf').addClass('ubahwarnaorange');
	            $('#Statusf').html(Waspada);
	            $('#Statusf').removeClass('warnamerah');
	            $('#Statusf').removeClass('warnahijau');
	            $('#Statusf').addClass('warnaorange');
	          }else {
	            $('#indikatorf').removeClass('ubahwarnamerah');
	            $('#indikatorf').removeClass('ubahwarnaorange');
	            $('#indikatorf').addClass('ubahwarnahijau');
	            $('#Statusf').html(Aman);
	            $('#Statusf').removeClass('warnaorange');
	            $('#Statusf').removeClass('warnamerah');
	            $('#Statusf').addClass('warnahijau');
	          }
	          if (waktusensor16 < now){
	         	$('#ONf').html(Off);
	         	$('#ONf').removeClass('warnaon');
	         	$('#ONf').addClass('warnaoff');
	            $('#indikatorf').addClass('warnaoff');
	            $('#Statusf').addClass('warnaoff');
	            $('#ketinggianf').html(nilaioff);
	            $('#Statusf').html(mati);
	         }else{
	         	$('#ONf').html(On);
	         	$('#ONf').removeClass('warnaoff');
	         	$('#ONf').addClass('warnaon');
	         	$('#indikatorf').removeClass('warnaoff');
	         	$('#Statusf').removeClass('warnaoff');
	         	$('#ketinggianf').html(sensor16);
	         }

            //$('#ketinggianf').html(sensor16);
            
          }else if (sensor[i].ip == "192.168.1.17") {
            var sensor17 = sensor[i].level;
            var waktusensor17 = sensor[i].waktu;

            if (sensor17 >= awas){
            	$('#indikatorg').removeClass('ubahwarnaorange');
	            $('#indikatorg').removeClass('ubahwarnahijau');
	            $('#indikatorg').addClass('ubahwarnamerah');
	            $('#Statusg').html(Bahaya);
	            $('#Statusg').removeClass('warnaorange');
	            $('#Statusg').removeClass('warnahijau');
	            $('#Statusg').addClass('warnamerah');
            }else if (sensor17 > normal) {
	            $('#indikatorg').removeClass('ubahwarnamerah');
	            $('#indikatorg').removeClass('ubahwarnahijau');
	            $('#indikatorg').addClass('ubahwarnaorange');
	            $('#Statusg').html(Waspada);
	            $('#Statusg').removeClass('warnamerah');
	            $('#Statusg').removeClass('warnahijau');
	            $('#Statusg').addClass('warnaorange');
	          }else {
	            $('#indikatorg').removeClass('ubahwarnamerah');
	            $('#indikatorg').removeClass('ubahwarnaorange');
	            $('#indikatorg').addClass('ubahwarnahijau');
	            $('#Statusg').html(Aman);
	            $('#Statusg').removeClass('warnaorange');
	            $('#Statusg').removeClass('warnamerah');
	            $('#Statusg').addClass('warnahijau');
	          }
	          if (waktusensor17 < now){
	         	$('#ONg').html(Off);
	         	$('#ONg').removeClass('warnaon');
	         	$('#ONg').addClass('warnaoff');
	            $('#indikatorg').addClass('warnaoff');
	            $('#Statusg').addClass('warnaoff');
	            $('#ketinggiang').html(nilaioff);
	            $('#Statusg').html(mati);
	         }else{
	         	$('#ONg').html(On);
	         	$('#ONg').removeClass('warnaoff');
	         	$('#ONg').addClass('warnaon');
	         	$('#indikatorg').removeClass('warnaoff');
	         	$('#Statusg').removeClass('warnaoff');
	         	$('#ketinggiang').html(sensor17);
	         }

            //$('#ketinggiang').html(sensor17);
            
          }else if (sensor[i].ip == "192.168.1.21") {
            var sensor21 = sensor[i].level;
            var waktusensor21 = sensor[i].waktu;

            if (sensor21 >= awas){
            	$('#indikatorh').removeClass('ubahwarnaorange');
	            $('#indikatorh').removeClass('ubahwarnahijau');
	            $('#indikatorh').addClass('ubahwarnamerah');
	            $('#Statush').html(Bahaya);
	            $('#Statush').removeClass('warnaorange');
	            $('#Statush').removeClass('warnahijau');
	            $('#Statush').addClass('warnamerah');
            }else if (sensor21 > normal) {
	            $('#indikatorh').removeClass('ubahwarnamerah');
	            $('#indikatorh').removeClass('ubahwarnahijau');
	            $('#indikatorh').addClass('ubahwarnaorange');
	            $('#Statush').html(Waspada);
	            $('#Statush').removeClass('warnamerah');
	            $('#Statush').removeClass('warnahijau');
	            $('#Statush').addClass('warnaorange');
	          }else {
	            $('#indikatorh').removeClass('ubahwarnamerah');
	            $('#indikatorh').removeClass('ubahwarnaorange');
	            $('#indikatorh').addClass('ubahwarnahijau');
	            $('#Statush').html(Aman);
	            $('#Statush').removeClass('warnaorange');
	            $('#Statush').removeClass('warnamerah');
	            $('#Statush').addClass('warnahijau');
	          }
	          if (waktusensor21 < now){
	         	$('#ONh').html(Off);
	         	$('#ONh').removeClass('warnaon');
	         	$('#ONh').addClass('warnaoff');
	            $('#indikatorh').addClass('warnaoff');
	            $('#Statush').addClass('warnaoff');
	            $('#ketinggianh').html(nilaioff);
	            $('#Statush').html(mati);
	         }else{
	         	$('#ONh').html(On);
	         	$('#ONh').removeClass('warnaoff');
	         	$('#ONh').addClass('warnaon');
	         	$('#indikatorh').removeClass('warnaoff');
	         	$('#Statush').removeClass('warnaoff');
	         	$('#ketinggianh').html(sensor21);
	         }

            //$('#ketinggianh').html(sensor21);
            
          }else if (sensor[i].ip == "192.168.1.22") {
            var sensor22 = sensor[i].level;
            var waktusensor22 = sensor[i].waktu;

            if (sensor22 >= awas){
            	$('#indikatori').removeClass('ubahwarnaorange');
	            $('#indikatori').removeClass('ubahwarnahijau');
	            $('#indikatori').addClass('ubahwarnamerah');
	            $('#Statusi').html(Bahaya);
	            $('#Statusi').removeClass('warnaorange');
	            $('#Statusi').removeClass('warnahijau');
	            $('#Statusi').addClass('warnamerah');
            }else if (sensor22 > normal) {
	            $('#indikatori').removeClass('ubahwarnamerah');
	            $('#indikatori').removeClass('ubahwarnahijau');
	            $('#indikatori').addClass('ubahwarnaorange');
	            $('#Statusi').html(Waspada);
	            $('#Statusi').removeClass('warnamerah');
	            $('#Statusi').removeClass('warnahijau');
	            $('#Statusi').addClass('warnaorange');
	          }else {
	            $('#indikatori').removeClass('ubahwarnamerah');
	            $('#indikatori').removeClass('ubahwarnaorange');
	            $('#indikatori').addClass('ubahwarnahijau');
	            $('#Statusi').html(Aman);
	            $('#Statusi').removeClass('warnaorange');
	            $('#Statusi').removeClass('warnamerah');
	            $('#Statusi').addClass('warnahijau');
	          }
	          if (waktusensor22 < now){
	         	$('#ONi').html(Off);
	         	$('#ONi').removeClass('warnaon');
	         	$('#ONi').addClass('warnaoff');
	            $('#indikatori').addClass('warnaoff');
	            $('#Statusi').addClass('warnaoff');
	            $('#ketinggiani').html(nilaioff);
	            $('#Statusi').html(mati);
	         }else{
	         	$('#ONi').html(On);
	         	$('#ONi').removeClass('warnaoff');
	         	$('#ONi').addClass('warnaon');
	         	$('#indikatori').removeClass('warnaoff');
	         	$('#Statusi').removeClass('warnaoff');
	         	$('#ketinggiani').html(sensor22);
	         }

            //$('#ketinggiani').html(sensor22);
            
          }else if (sensor[i].ip == "192.168.1.23") {
            var sensor23 = sensor[i].level;
            var waktusensor23 = sensor[i].waktu;

            if (sensor23 >= awas){
            	$('#indikatorj').removeClass('ubahwarnaorange');
	            $('#indikatorj').removeClass('ubahwarnahijau');
	            $('#indikatorj').addClass('ubahwarnamerah');
	            $('#Statusj').html(Bahaya);
	            $('#Statusj').removeClass('warnaorange');
	            $('#Statusj').removeClass('warnahijau');
	            $('#Statusj').addClass('warnamerah');
            }else if (sensor23 > normal) {
	            $('#indikatorj').removeClass('ubahwarnamerah');
	            $('#indikatorj').removeClass('ubahwarnahijau');
	            $('#indikatorj').addClass('ubahwarnaorange');
	            $('#Statusj').html(Waspada);
	            $('#Statusj').removeClass('warnamerah');
	            $('#Statusj').removeClass('warnahijau');
	            $('#Statusj').addClass('warnaorange');
	          }else {
	            $('#indikatorj').removeClass('ubahwarnamerah');
	            $('#indikatorj').removeClass('ubahwarnaorange');
	            $('#indikatorj').addClass('ubahwarnahijau');
	            $('#Statusj').html(Aman);
	            $('#Statusj').removeClass('warnaorange');
	            $('#Statusj').removeClass('warnamerah');
	            $('#Statusj').addClass('warnahijau');
	          }
	          if (waktusensor23 < now){
	         	$('#ONj').html(Off);
	         	$('#ONj').removeClass('warnaon');
	         	$('#ONj').addClass('warnaoff');
	            $('#indikatorj').addClass('warnaoff');
	            $('#Statusj').addClass('warnaoff');
	            $('#ketinggianj').html(nilaioff);
	            $('#Statusj').html(mati);
	         }else{
	         	$('#ONj').html(On);
	         	$('#ONj').removeClass('warnaoff');
	         	$('#ONj').addClass('warnaon');
	         	$('#indikatorj').removeClass('warnaoff');
	         	$('#Statusj').removeClass('warnaoff');
	         	$('#ketinggianj').html(sensor23);
	         }

            //$('#ketinggianj').html(sensor23);
            
          }else if (sensor[i].ip == "192.168.1.24") {
            var sensor24 = sensor[i].level;
            var waktusensor24 = sensor[i].waktu;

            if (sensor24 >= awas){
            	$('#indikatork').removeClass('ubahwarnaorange');
	            $('#indikatork').removeClass('ubahwarnahijau');
	            $('#indikatork').addClass('ubahwarnamerah');
	            $('#Statusk').html(Bahaya);
	            $('#Statusk').removeClass('warnaorange');
	            $('#Statusk').removeClass('warnahijau');
	            $('#Statusk').addClass('warnamerah');
            }else if (sensor24 > normal) {
	            $('#indikatork').removeClass('ubahwarnamerah');
	            $('#indikatork').removeClass('ubahwarnahijau');
	            $('#indikatork').addClass('ubahwarnaorange');
	            $('#Statusk').html(Waspada);
	            $('#Statusk').removeClass('warnamerah');
	            $('#Statusk').removeClass('warnahijau');
	            $('#Statusk').addClass('warnaorange');
	          }else {
	            $('#indikatork').removeClass('ubahwarnamerah');
	            $('#indikatork').removeClass('ubahwarnaorange');
	            $('#indikatork').addClass('ubahwarnahijau');
	            $('#Statusk').html(Aman);
	            $('#Statusk').removeClass('warnaorange');
	            $('#Statusk').removeClass('warnamerah');
	            $('#Statusk').addClass('warnahijau');
	          }
	          if (waktusensor24 < now){
	         	$('#ONk').html(Off);
	         	$('#ONk').removeClass('warnaon');
	         	$('#ONk').addClass('warnaoff');
	            $('#indikatork').addClass('warnaoff');
	            $('#Statusk').addClass('warnaoff');
	            $('#ketinggiank').html(nilaioff);
	            $('#Statusk').html(mati);
	         }else{
	         	$('#ONk').html(On);
	         	$('#ONk').removeClass('warnaoff');
	         	$('#ONk').addClass('warnaon');
	         	$('#indikatork').removeClass('warnaoff');
	         	$('#Statusk').removeClass('warnaoff');
	         	$('#ketinggiank').html(sensor24);
	         }

            //$('#ketinggiank').html(sensor24);
            
          }else if (sensor[i].ip == "192.168.1.25") {
            var sensor25 = sensor[i].level;
            var waktusensor25 = sensor[i].waktu;

            if (sensor25 >= awas){
            	$('#indikatorl').removeClass('ubahwarnaorange');
	            $('#indikatorl').removeClass('ubahwarnahijau');
	            $('#indikatorl').addClass('ubahwarnamerah');
	            $('#Statusl').html(Bahaya);
	            $('#Statusl').removeClass('warnaorange');
	            $('#Statusl').removeClass('warnahijau');
	            $('#Statusl').addClass('warnamerah');
            }else if (sensor25 > normal) {
	            $('#indikatorl').removeClass('ubahwarnamerah');
	            $('#indikatorl').removeClass('ubahwarnahijau');
	            $('#indikatorl').addClass('ubahwarnaorange');
	            $('#Statusl').html(Waspada);
	            $('#Statusl').removeClass('warnamerah');
	            $('#Statusl').removeClass('warnahijau');
	            $('#Statusl').addClass('warnaorange');
	          }else {
	            $('#indikatorl').removeClass('ubahwarnamerah');
	            $('#indikatorl').removeClass('ubahwarnaorange');
	            $('#indikatorl').addClass('ubahwarnahijau');
	            $('#Statusl').html(Aman);
	            $('#Statusl').removeClass('warnaorange');
	            $('#Statusl').removeClass('warnamerah');
	            $('#Statusl').addClass('warnahijau');
	          }
	          if (waktusensor25 < now){
	         	$('#ONl').html(Off);
	         	$('#ONl').removeClass('warnaon');
	         	$('#ONl').addClass('warnaoff');
	            $('#indikatorl').addClass('warnaoff');
	            $('#Statusl').addClass('warnaoff');
	            $('#ketinggianl').html(nilaioff);
	            $('#Statusl').html(mati);
	         }else{
	         	$('#ONl').html(On);
	         	$('#ONl').removeClass('warnaoff');
	         	$('#ONl').addClass('warnaon');
	         	$('#indikatorl').removeClass('warnaoff');
	         	$('#Statusl').removeClass('warnaoff');
	         	$('#ketinggianl').html(sensor25);
	         }

            //$('#ketinggianl').html(sensor25);
            
          }else if (sensor[i].ip == "192.168.1.26") {
            var sensor26 = sensor[i].level;
            var waktusensor26 = sensor[i].waktu;

            if (sensor26 >= awas){
            	$('#indikatorm').removeClass('ubahwarnaorange');
	            $('#indikatorm').removeClass('ubahwarnahijau');
	            $('#indikatorm').addClass('ubahwarnamerah');
	            $('#Statusm').html(Bahaya);
	            $('#Statusm').removeClass('warnaorange');
	            $('#Statusm').removeClass('warnahijau');
	            $('#Statusm').addClass('warnamerah');
            }else if (sensor26 > normal) {
	            $('#indikatorm').removeClass('ubahwarnamerah');
	            $('#indikatorm').removeClass('ubahwarnahijau');
	            $('#indikatorm').addClass('ubahwarnaorange');
	            $('#Statusm').html(Waspada);
	            $('#Statusm').removeClass('warnamerah');
	            $('#Statusm').removeClass('warnahijau');
	            $('#Statusm').addClass('warnaorange');
	          }else {
	            $('#indikatorm').removeClass('ubahwarnamerah');
	            $('#indikatorm').removeClass('ubahwarnaorange');
	            $('#indikatorm').addClass('ubahwarnahijau');
	            $('#Statusm').html(Aman);
	            $('#Statusm').removeClass('warnaorange');
	            $('#Statusm').removeClass('warnamerah');
	            $('#Statusm').addClass('warnahijau');
	          }
	          if (waktusensor26 < now){
	         	$('#ONm').html(Off);
	         	$('#ONm').removeClass('warnaon');
	         	$('#ONm').addClass('warnaoff');
	            $('#indikatorm').addClass('warnaoff');
	            $('#Statusm').addClass('warnaoff');
	            $('#ketinggianm').html(nilaioff);
	            $('#Statusm').html(mati);
	         }else{
	         	$('#ONm').html(On);
	         	$('#ONm').removeClass('warnaoff');
	         	$('#ONm').addClass('warnaon');
	         	$('#indikatorm').removeClass('warnaoff');
	         	$('#Statusm').removeClass('warnaoff');
	         	$('#ketinggianm').html(sensor26);
	         }

            //$('#ketinggianm').html(sensor26);
            
          }else {
            var sensor27 = sensor[i].level;
            var waktusensor27 = sensor[i].waktu;

            if (sensor27 >= awas){
            	$('#indikatorn').removeClass('ubahwarnaorange');
	            $('#indikatorn').removeClass('ubahwarnahijau');
	            $('#indikatorn').addClass('ubahwarnamerah');
	            $('#Statusn').html(Bahaya);
	            $('#Statusn').removeClass('warnaorange');
	            $('#Statusn').removeClass('warnahijau');
	            $('#Statusn').addClass('warnamerah');
            }else if (sensor27 > normal) {
	            $('#indikatorn').removeClass('ubahwarnamerah');
	            $('#indikatorn').removeClass('ubahwarnahijau');
	            $('#indikatorn').addClass('ubahwarnaorange');
	            $('#Statusn').html(Waspada);
	            $('#Statusn').removeClass('warnamerah');
	            $('#Statusn').removeClass('warnahijau');
	            $('#Statusn').addClass('warnaorange');
	          }else {
	            $('#indikatorn').removeClass('ubahwarnamerah');
	            $('#indikatorn').removeClass('ubahwarnaorange');
	            $('#indikatorn').addClass('ubahwarnahijau');
	            $('#Statusn').html(Aman);
	            $('#Statusn').removeClass('warnaorange');
	            $('#Statusn').removeClass('warnamerah');
	            $('#Statusn').addClass('warnahijau');
	          }
	          if (waktusensor27 < now){
	         	$('#ONn').html(Off);
	         	$('#ONn').removeClass('warnaon');
	         	$('#ONn').addClass('warnaoff');
	            $('#indikatorn').addClass('warnaoff');
	            $('#Statusn').addClass('warnaoff');
	            $('#ketinggiann').html(nilaioff);
	            $('#Statusn').html(mati);
	         }else{
	         	$('#ONn').html(On);
	         	$('#ONn').removeClass('warnaoff');
	         	$('#ONn').addClass('warnaon');
	         	$('#indikatorn').removeClass('warnaoff');
	         	$('#Statusn').removeClass('warnaoff');
	         	$('#ketinggiann').html(sensor27);
	         }

            //$('#ketinggiann').html(sensor27);
            
          }

      }


      for (var i in nilai){
      		if (nilai[i].ip == "192.168.1.31") {
            var sensor31 = nilai[i].level;
            var waktusensor31 = nilai[i].waktu;

            if (waktusensor31 < now){
	         	$('#ONo').html(Off);
	         	$('#ONo').removeClass('warnaon');
	         	$('#ONo').addClass('warnaoff');
	            $('#debit').html(nilaioff);
	         }else{
	         	$('#ONo').html(On);
	         	$('#ONo').removeClass('warnaoff');
	         	$('#ONo').addClass('warnaon');
	         	$('#debit').html(sensor31);
	         }

            //$('#debit').html(sensor31);
      	}else {
      		var sensor41 = nilai[i].level;
            var waktusensor41 = nilai[i].waktu;

            if (waktusensor41 < now){
	         	$('#ONp').html(Off);
	         	$('#ONp').removeClass('warnaon');
	         	$('#ONp').addClass('warnaoff');
	            $('#resistiv').html(nilaioff);
	         }else{
	         	$('#ONp').html(On);
	         	$('#ONp').removeClass('warnaoff');
	         	$('#ONp').addClass('warnaon');
	         	$('#resistiv').html(sensor41);
	         }

            //$('#resistiv').html(sensor41);
      	}
  	}


    });
    });
    }

      setInterval(function(){
           loadData();
           }, 1000);