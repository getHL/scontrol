<?php

function mysqli (){
		 $host			="localhost";
		 $user			="root";
		 $password		="";
		 $db			="data";
		
		$mysqli=new MYSQLi($host,$user,$password,$db);
			if($mysqli->connect_error){
					die("数据库连接失败");
				}
			$mysqli->query("set names 'utf8'");
		return $mysqli;
		
}











?>
