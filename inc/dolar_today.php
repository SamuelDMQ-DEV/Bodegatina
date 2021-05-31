<?php 
$dt_data = file_get_contents('https://s3.amazonaws.com/dolartoday/data.json');
$dt_data = utf8_encode($dt_data);
$dt_items = json_decode($dt_data, true);
$dolar_actual = $dt_items['USD']['dolartoday'];
?>