<!DOCTYPE html>
<html lang="en" xml:lang="en">


        <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Rakendus</title>
        <link rel="stylesheet" type="text/css" href="http://valgahaiglacatering.rf.gd/styles/style.css">


        </head>
        <body>
<div class="header">
<h1><a href="http://valgahaiglacatering.rf.gd/">Esilehele</a></h1>

<?php         	
if($this->session->userdata('logged_in')){
     	$session_data = $this->session->userdata('username');
     	echo 'Oled sisse loginud kasutajaga <b>'.$session_data.'</b>';
        echo '<br/><a href="http://valgahaiglacatering.rf.gd/index.php/login/logout">Logi välja</a>';
 } ?>

</div>

<div class="content">




