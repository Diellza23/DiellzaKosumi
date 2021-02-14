<?php
	$conn = mysqli_connect("localhost","root","","login");
    $query="SELECT * FROM njoftimet";
    $result = mysqli_query($conn, $query);              
?>