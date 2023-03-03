<?php
 $DB_HOST = 'localhost';
$DB_USER = 'travelsd_zapbookuser';
$DB_PASS = 'yG{xg.ermR!c';
$DB_NAME = 'travelsd_zapbooking';
 
$conn    = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME) or die(mysqli_connect_error()); 
$file = fopen("NewAiportList.csv","r");
$i =0;
while (($data = fgetcsv($file, 1000, ",")) !== FALSE) 
  {	
$i++;
	if($i == 1){
		continue;
	}	
	 $sqls = "SELECT * FROM airports WHERE airport_code = '".$data[0]."'";
	 $results = mysqli_query($conn, $sqls);
	  if(mysqli_num_rows($results) > 0){
	  }else{
	$sql = "INSERT INTO airports (airport_code, airport_name, city_code, city_name, country_name, country_code, created_at, updated_at) VALUES ('".$data[0]."', '".mysqli_real_escape_string($conn, $data[1])."', '".$data[2]."', '".mysqli_real_escape_string($conn, $data[3])."', '".mysqli_real_escape_string($conn, $data[4])."', '".$data[5]."', Now(), Now())";
	
	$result = mysqli_query($conn, $sql);
	  }
    // Read the data from a single line  
	
  }
fclose($file); 
?>