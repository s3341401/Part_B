<?php

 
require('db.php');
if (!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW)) {
echo 'Could not connect to mysql on ' . DB_HOST . "\n";
exit;
}
echo 'Connected to mysql on ' . DB_HOST . "\n";
if (!mysql_select_db(DB_NAME, $dbconn)) {
echo 'Could not use database ' . DB_NAME . "\n";
echo mysql_error() . "\n";
exit;
}
echo 'Connected to database ' . DB_NAME . "\n";


 
mysql_connect(DB_HOST, DB_USER, DB_PW);
mysql_select_db(DB_NAME);

 
$query=mysql_real_escape_string($_GET['query']);
 
$query_for_result=mysql_query("SELECT wine_name,variety,year,winery_name,region_name,cost,price,SUM(qty),qty*price FROM wine JOIN winery ON wine.winery_id = winery.winery_id  JOIN region ON region.region_id = winery.region_id 
   JOIN wine_variety ON wine_variety.wine_id = wine.wine_id JOIN grape_variety ON grape_variety.variety_id = wine_variety.variety_id 
   JOIN inventory ON inventory.wine_id = wine.wine_id JOIN items ON items.wine_id = wine.wine_id WHERE wine_name like '%".$query."%'");
echo "<h2>Search Results</h2><ol>";

if($query_for_result=="")
{
echo "No Result Found";
}
else
{
echo('%".$query."%');
}

echo "</ol>";
 
mysql_close();
?>

echo "</ol>";
 
mysql_close();
?>
