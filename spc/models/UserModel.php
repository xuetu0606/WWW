<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>�û�ģ�Ͳ�</title>
	</head>
	<body>
		<?php
			class UserModel{
				//��ȡ���е��û�����
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