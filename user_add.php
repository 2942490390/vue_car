<?php
include_once('./db.php');
$data=$_POST;
if(!empty($data)){
    // print_r($data);
    // die;
    $username=$_POST['username'];
    $tel=$_POST['tel'];
    $user_id=$_POST['user_id'];
    $password=$_POST['password'];
    $password=md5($password);
    $sql="insert into `tb_user` (`username`,`tel`,`user_id`,`password`)
     value ('$username','$tel','$user_id','$password') ";
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
}

//关闭连接
mysqli_close($link);
die;
?>