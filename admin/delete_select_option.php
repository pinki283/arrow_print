<?php
session_start();

$user_profile=$_SESSION['user_name'];
if($user_profile==true){

}else{
    header('location:index.php');
}
?>
<?php
include("db_connect.php");
if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];

    $sql="delete from select_option where select_option_id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:select_option.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>