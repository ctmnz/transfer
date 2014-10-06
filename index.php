<?php



// $storagefolder = "/data/www/transfer/uploads/";
$storagefolder = "./uploads/";

$wwwurl = $_SERVER['SERVER_NAME'];
$fname = $_GET['filename']; 
$timenow = time();
$hacktime = base_convert($timenow, 10 , 2);
$hackfname = $hacktime."-".$fname;

$url = "http://".$wwwurl."/uploads/".$hackfname; 

/* PUT data comes in on the stdin stream */
$putdata = fopen("php://input", "r");

///




/* Open a file for writing */
#$fp = fopen("/data/www/transfer/uploads/myputfile.ext", "w");
$fp = fopen($storagefolder.$hackfname, "w");

/* Read the data 1 KB at a time
   and write to the file */
while ($data = fread($putdata, 1024))
  fwrite($fp, $data);

/* Close the streams */
fclose($fp);
fclose($putdata);

echo $url;


echo "\n ---------------------- \n";

print_r($_SERVER); 


// print_r($_SERVER);
//print_r($_GET);

//  echo $fname;

// echo "time " . time() . " ";
//print_r($_PUT);
 

// echo "hash " .  base_convert($timenow, 10 , 2);

?>

