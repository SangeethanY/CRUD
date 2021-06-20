<?php 
$action=1;
$name="";
$city="";
$id="";
session_start();
$con=new mysqli("localhost","root","","admin01");
$sql="select * from user01";
$result=$con->query($sql);

if(isset($_POST["save"])){
    $name=$_POST["name"];
    $city=$_POST["city"];
    $sql="insert into user01(name,address) values('$name','$city')";
    $con->query($sql) ;
    $_SESSION['msg']="data saved";
    header("location:index.php");
   
}
if(isset($_GET["edit"])){
    $action=2;
    $id=$_GET['edit'];
    $sql="select * from user01 where id=$id";
    $resul=$con->query($sql);
    $a=mysqli_fetch_array($resul);
    $name=$a['name'];
    $city=$a['address'];
    
    
    
}
if(isset($_POST['update'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $city=$_POST['city'];
    $sql="update user01 set name='$name',address='$city' where id='$id'";
    $con->query($sql);
    $_SESSION["msg"]="updated";
    header("location:index.php");
}
 
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $sql="delete from user01 where id=$id";
    $con->query($sql);
    $_SESSION["msg"]="delete";
    header("location:index.php");
}
?>