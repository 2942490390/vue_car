<?php
include_once('./db.php');
$sql="select * from tb_order where 1 ";
$result=mysqli_query($link,$sql);
$list=[];
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        $list[]=$row;
    }
}else{
    echo json_encode(array('code'=>0,'msg'=>'没有数据'));
    die;
}

//输出API接口格式
// 将json格式的字符串转编码
echo json_encode($list,JSON_UNESCAPED_UNICODE);
//关闭连接
mysqli_close($link);
die;
?>