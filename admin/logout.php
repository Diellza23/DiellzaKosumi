<?php
session_start();
if(isset($_SESSION['email'])){
	session_destroy();
	echo "<script>location.href = '../index.php'</script>";
}
else{
	session_destroy();
	echo "<script>location.href = '../index.php'</script>";
}
?>