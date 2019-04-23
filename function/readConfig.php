<?php 

$lines_array = file("file.txt");
$hostf = "";
$passf = "";
$userf = "";
$dbnamef = "";

foreach($lines_array as $line) {
	if(strpos($line, "host") !== false) {
		$r_host = explode("=", $line);
		$hostf = $r_host[1];
	} elseif (strpos($line, "username") !== false) {
		$r_user = explode("=", $line);
		$userf = $r_user[1];
	} elseif (strpos($line, "dbname") !== false) {
		$r_dbname = explode("=", $line);
		$dbnamef = $r_dbname[1];
	} elseif (strpos($line, "password") !== false) {
		$r_pass = explode("=", $line);
		$passf = $r_pass[1];
	}
}

echo $hostf;
echo $userf;
echo $passf;
echo $dbnamef;

?>