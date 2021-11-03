<?php
$data = json_decode(file_get_contents("php://input"),true);
$filename= "json2-3.csv";
file_put_contents($filename, file_get_contents($filename).implode(",", $data)."\n");
echo json_encode($data);
?>