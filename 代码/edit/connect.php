<?php

function mysqli (){
		 $host			="localhost";
		 $user			="root";
		 $password		="";
		 $db			="data";
		
		$mysqli=new MYSQLi($host,$user,$password,$db);
			if($mysqli->connect_error){
					die("���ݿ�����ʧ��");
				}
			$mysqli->query("set names 'utf8'");
		return $mysqli;
		
}











?>
