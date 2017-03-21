<!doctype html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>用户控制器</title>
	</head>
	<body>
		<?php
			class UserController{
				public function index(){
					//echo "这是User控制器的index方法";
					//包含模型文件
					include './models/UserModel.php';
					//实例化一个模型
					$model = new UserModel();
					//通过模型获取数据
					$array = $model->getAllUsers();
					//让视图从处理并显示数据
					include './views/User/index.php';
				}
				//连接数据库
				public function test_mysqli(){
					$conn = @mysqli_connect('localhost','root','666666'); 
					echo '<pre>';
					var_dump($conn);
					echo '</pre>';
				}
			}
		?>
	</body>
</html>