<?php 
require_once "dbcon.php";

$sql = "insert into sprint values ('sprint1test', '2018-05-06', '2018-05-11', 15);";
$result = mysqli_query($conn, $sql);
echo $result;

?>
