<?php
require("phpsqlajax_dbinfo.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

$dsn = 'mysql:dbname=id751473_jobs;host=localhost';
$user = 'id751473_jobsclick';
$password = 'hello';

$dbh = new PDO($dsn, $user, $password);

try 
{
    $connection = new PDO($dsn, $user, $password);
}
catch( PDOException $Exception ) 
{   
     echo "Unable to connect to database.";
     exit;
}

$SQL = 'SELECT * FROM job WHERE 1';

$result = $connection->query($SQL);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = $result->fetch()){
  // Add to XML document node
  echo '<marker ';
  echo 'id="' . parseToXML($row['id']) . '" ';
  echo 'name="' . parseToXML($row['jobTitle']) . '" ';
  echo 'address="' . parseToXML($row['address']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'type="' . $row['jobType'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';

?>