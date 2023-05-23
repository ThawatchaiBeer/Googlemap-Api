<?php
require("db.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


// Select all the rows in the markers table
$query = "SELECT * FROM markers";
$result = mysqli_query($conn,$query);
if (!$result) {
die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");


echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind=0;

while ($row = @mysqli_fetch_assoc($result)){

echo '<marker ';
echo 'id="' . $row['id'] . '" ';
echo 'name="' . parseToXML($row['name']) . '" ';
echo 'address="' . parseToXML($row['address']) . '" ';
echo 'lat="' . $row['lat'] . '" ';
echo 'lng="' . $row['lng'] . '" ';
echo 'type="' . $row['type'] . '" ';
echo '/>';
$ind = $ind + 1;
}


echo '</markers>';

?>
