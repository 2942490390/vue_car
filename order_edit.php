<?php
include_once('./db.php');
// print_r($_POST);
// die;
$id=$_POST['id'];
 $sql="select * from `tb_order` where `id` =$id";
$result=mysqli_query($link,$sql);
$row=$result->fetch_assoc();

//获取前端axios传递的数据
// print_r($_POST);
// die;
$fitting=$_POST['fitting'];
$price=$_POST['price'];
$add_time=$_POST['add_time'];
$status=$_POST['status'];
$cs=$_POST['cs'];
$fitting_id=$_POST['fitting_id'];
// die;
$sql2="update `tb_order` set `fitting`='$fitting',`price`='$price',`add_time`='$add_time',`status`='$status',`cs`='$cs',`fitting_id`='$fitting_id' where `id`=$id ";
$query=mysqli_query($link,$sql2);
//获取影响行数
$num=mysqli_affected_rows($link);

// echo json_encode($row);
if($num>0){
    echo 1;
    die;
}else{
    echo 0;
    die;
}
?>