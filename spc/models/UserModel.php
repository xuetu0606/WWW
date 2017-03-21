<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>用户模型层</title>
	</head>
	<body>
		<?php
			class UserModel{
				//获取所有的用户数据
				public function getAllUsers(){
					$array = array(
						array('id'=>1,'name'=>'jack','email'=>'jack@123.com'),
						array('id'=>2,'name'=>'mary','email'=>'mary@123.com'),	
						array('id'=>3,'name'=>'lili','email'=>'lili@123.com')	
					);
					return $array;
				}
			}
		?>
	</body>
</html>