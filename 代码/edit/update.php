<?php
//写的过程中，我自己定义了一个data数据库，在里面建立了一个machine_1的表，
//表内有5个字段，分别是id,switch,current,voltage,time
//这是后台更改数据的页面，供Ajax调用,实现无闪烁刷新

include("connect.php");				//写了一个实例化MySQLi的方法

$sqli=mysqli();	


//更新页面修改传来的数据,根据页面数据传来的时间判断修改的数据记录
$sql="update  machine_1 set voltage='".$_POST['voltage']."',current='".$_POST['current']."' 
, switch='".$_POST['switch']."' where time ='".strtotime($_POST['time'])."'";

if($sqli->query($sql)){
		echo "更新成功";
}
else echo "更新失败";








?>