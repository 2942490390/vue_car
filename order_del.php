<?php
include_once('./db.php');
// print_r($_GET);
// die;
$id=$_GET['id'];
 $sql="select * from `tb_order` where `id` ='$id' ";
$result=mysqli_query($link,$sql);
$row=$result->fetch_assoc();
if (empty($row)) { //如果没有这篇文章则跳转到list页面
    echo 2;
    die;
  }
//获取前端axios传递的数据
// print_r($_GET);
// die;
// die;
$del = "delete from `tb_order` where `id`=$id";
$query=mysqli_query($link,$del);
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