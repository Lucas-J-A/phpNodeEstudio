<?php 
date_default_timezone_set('America/Sao_paulo');//fuso horario
echo date('d/m/Y H:i:s');
echo "<hr>";

$date = date('Y-m-d');
$datetime = date('Y-m-d H:i:s');
echo $datetime."<br><hr>";

//TIME formatado
$time = time();
echo date('d/m/Y', $time);

//MKTIME data futura
echo "<br><hr>";
$data_pagamento = MKTIME(15, 30, 00, 02, 15, 2023);
echo date('d/m - h:i', $data_pagamento);

echo "<br><hr>";
//STRTOTIME
$data = '2019-04-10 13:30:00';
$data = strtotime($data);

echo date('d/m/Y', $data);
?>