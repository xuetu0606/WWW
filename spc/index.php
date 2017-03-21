<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>项目入口</title>
	</head>
	<body>
		<?php
			//连接数据库
			// $conn = @mysqli_connect('localhost','root','666666'); 
			// var_dump($conn);
			//UTF-8的字符集
			header("Content-Type:text/html;charset=UTF-8");
			//这是入口文件
			//获取控制器名称
			if($_GET){
				$c = $_GET['c'];
				//包含控制器
				include './controllers/'.$c.'Controller.php';
				//实例化控制器对象
				$ClassName = $c.'Controller';
				$controller = new $ClassName();
				//访问方法名
				$m = $_GET['m'];
				//调用方法
				$controller->$m();
			}
		?>
	</body>
</html>