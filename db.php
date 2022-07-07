<?php
header("Content-Type:text/html;charset=utf-8");
header('Access-Control-Allow-Origin:*'); //允许所有域名跨域
//json格式输出
header('Content-Type:application/json; charset=utf-8');
//设置亚洲时区
date_default_timezone_set('Asia/Shanghai');
//连接数据库
$mysql_name='car';
$link = mysqli_connect('localhost','root','',$mysql_name);
//  var_dump($link);
if($link===false){
    echo "<script>
    alert('数据库连接失败');
    history.back();
    </script>".mysqli_connect_error();
    die;
}
// //设置与数据库连接编码
mysqli_query($link,"set names utf8");
//创建session
session_start();
//include_once('fun.php');

?>
