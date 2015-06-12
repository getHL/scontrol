<?php
//写的过程中，我自己定义了一个data数据库，在里面建立了一个machine_1的表，
//表内有5个字段，分别是id,switch,current,voltage,time
//这是后台查找的页面，供Ajax调用,实现无闪烁刷新

include("connect.php");

$sqli=mysqli();

$sql="select * from machine_1 order by time desc limit 0,1";

$data="";
if($res=$sqli->query($sql)){
		$row=$res->fetch_array();
	$data='{"switch":"'.$row['switch'].'","voltage":"'.$row['voltage'].'","current":"'.$row['current'].'","time":"'.date("Y-m-d H:i:s",$row['time']).'"}';
	echo $data;
}
else echo "";

?>