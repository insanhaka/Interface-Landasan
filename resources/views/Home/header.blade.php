<!DOCTYPE html>
<html>
  <head>

     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Water Level Monitoring</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="css/font.css" rel="stylesheet">

  </head>
  <body>

  	<ul>
  		<li><img src="assets/logo.png"></li>
      <!--
      <li><img class="knkt" src="assets/knkt.png"></li>
      -->
      <li><img class="undip" src="assets/undip.png"></li>
      @auth
        <li><a href="/pengaturan">
            <img src="assets/homepage.png">
        </a></li>
      @else
        <li><a href="/login">
            <img src="assets/setting.png">
        </a></li>
      @endauth
      <li><p>Water Level Monitoring System</p></li>
	 </ul>