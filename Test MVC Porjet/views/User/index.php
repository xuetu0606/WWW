<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>用户模块</title>
	</head>
	<body>
		<h1>这是UserController控制器的index方法的视图</h1>
		<?php
			foreach($array as $value){
				foreach($value as $key=>$val){
					echo $key."=".$val."<br/>";
				}
			}
		?>
	</body>
</html>