<?php
include_once('./db.php');
$data=$_POST;
// print_r($data);
// die;
$uname=$data['uname'];
$password=$data['password'];
$sql="select * from `tb_admin` where `uname` = '$uname' and `password` = md5('$password') ";
$query=mysqli_query($link,$sql);

$result=mysqli_fetch_assoc($query); //转成数组
// print_r($result);
// die;
if (!empty($result)) {
    echo json_encode(   //转成json格式
        array(
            'code'=>200,
            'msg'=>'登录成功',
            //用户名
            'uname'=>$result['uname'],
            //用户头像
            'image'=>$result['image'],
            //密码
            'password'=>$result['password'],
            //用户id
            'id'=>$result['id']

        )
    );
}else{
    echo json_encode(array('code'=>404,'msg'=>'用户名或密码错误'));
}
//关闭连接
mysqli_close($link);



?>