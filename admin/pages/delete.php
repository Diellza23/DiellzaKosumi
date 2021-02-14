<?php
    session_start();
    if(isset($_SESSION['email'])){
        include '../includes/connection.php';
        $id = $_GET['id'];
        $query = "DELETE FROM njoftimet WHERE id = '$id'";

        $data = mysqli_query($conn,$query);

        if($data){
            header('Location: ../admin.php');
        }
        else{
            echo "Njoftimi nuk u fshi!";
        }
    }
    else{
        echo "<script>location.href='../logout.php'</script>";
    }
?>