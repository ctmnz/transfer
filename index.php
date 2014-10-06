<?php



$storagefolder = "./uploads/";

$wwwurl = $_SERVER['SERVER_NAME'];
$fname = $_GET['filename']; 
$timenow = time();
$hacktime = base_convert($timenow, 10 , 2);
$hackfname = $hacktime."-".$fname;

$url = "http://".$wwwurl."/uploads/".$hackfname; 

$putdata = fopen("php://input", "r");

///




$fp = fopen($storagefolder.$hackfname, "w");

while ($data = fread($putdata, 1024))
  fwrite($fp, $data);

fclose($fp);
fclose($putdata);

echo $url;


?>

