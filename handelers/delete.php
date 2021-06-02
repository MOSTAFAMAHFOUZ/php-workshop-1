<?php 
session_start();
if(isset($_GET['id'])){
    $id = (int) $_GET['id'];
    $conn = mysqli_connect("localhost","root","","product_management2");
    if(!$conn){
        die("econnection Error : ". mysqli_connect_error());
    }
    $sql = "SELECT * FROM categories WHERE `id`='$id' ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn) > 0){
        // $row = mysqli_fetch_row($result);
        $sql = "DELETE FROM categories WHERE id='$id' ";
        $result = mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn) > 0){
            echo "data deleted successfully";
            header("refresh:3;url=../add.php" );
        }
    }else{
        $_SESSION['erros'][] = "Erorr";
    }
}
// echo $_GET['id'];