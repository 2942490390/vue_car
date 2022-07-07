<?php
include_once('./db.php');
// print_r($_GET);
// die;
$id=$_GET['id'];
 $sql="select * from `tb_user` where `id` ='$id' ";
$result=mysqli_query($link,$sql);
$row=$result->fetch_assoc();
if (empty($row)) { 
    echo 2;
    die;
  }
//获取前端axios传递的数据
// print_r($_GET);
// die;
// die;
$del = "delete from `tb_user` where `id`=$id";
$query=mysqli_query($link,$del);
//获取影响行数
$num=mysqli_affected_rows($link);

// echo json_encode($row);
if($num>0){
    echo 1;
}else{
    echo 0;
}
?>