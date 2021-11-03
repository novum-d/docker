<?php
$data = json_decode(file_get_contents("php://input"),true);
$filename= "json2-4.csv";
$current = file_get_contents($filename);
foreach ($data as $key => $value) {
    if (is_array($value)) {
        $string = "";
        foreach ($value as $details) {
             if (is_array($details)) {
                 foreach ($details as $d) {
                     $string .= $d  . ",";
                 }
             } else {
                 $string .= $details;
             }
        }
        $current .= $key . "=" . $string . ",";
    } else {
        $current .= $key . "=" . $value . ",";
    }
}
file_put_contents($filename, rtrim($current, ',')."\n");
echo json_encode($data);
?>