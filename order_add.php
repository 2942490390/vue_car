<?php
include_once('./db.php');

$data=$_POST;
// print_r($_POST);
// die;
$fitting=$_POST['fitting'];
$price=$_POST['price'];
$add_time=$_POST['add_time'];
$status=$_POST['status'];
$cs=$_POST['cs'];
$fitting_id=$_POST['fitting_id'];
$sql="insert into `tb_order` (`fitting`,`price`,`add_time`,`status`,`cs`,`fitting_id`)
 values('$fitting','$price','$add_time','$status','$cs','$fitting_id') ";
$result=mysqli_query($link,$sql);
//获取受影响的行数
$rows=mysqli_affected_rows($link);
if($rows>0){
    echo json_encode(['code'=>200,'msg'=>'添加成功']);
    die;
}else{
//输出API接口格式
    echo json_encode(array('code'=>404,'msg'=>'添加失败'));
    die;
}
//关闭连接
mysqli_close($link);
die;
?>