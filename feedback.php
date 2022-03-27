<?php
include("configure.php");
$sql="SELECT * FROM contact;";
$result = mysqli_query($link, $sql);
$resultCheck = mysqli_num_rows($result);
?>