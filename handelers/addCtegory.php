<?php 
session_start();
$_SESSION['errors'] = [];

if(isset($_POST['category_name'])){

    $category_name = filter_var($_POST['category_name'],FILTER_SANITIZE_STRING);

    if(strlen($category_name) < 3){
        $_SESSION['errors'][] = "name must be grater than 3";
    }

    if(strlen($category_name) > 50){
        $_SESSION['errors'][] = "name must be smaller than 50";
    }
    if(empty($_SESSION['errors'])){
        $conn = mysqli_connect("localhost","root","","product_management2");
        if(!$conn){
            die("econnection Error : ". mysqli_connect_error());
        }

        $sql = "INSERT INTO categories(`name`) VALUES('$category_name') ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn) > 0){
            $_SESSION['success'] = "data inserted succedully";
            header("refresh:3;url=../add.php" );
        }else{
            echo "Problem" . mysqli_error($conn);
        }
    }

    header("location:../add.php");
    


}
