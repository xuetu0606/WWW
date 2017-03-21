<?php
	/**
	 * 数据库基本操作
	 */
	class TestController{
		public function test_mysqli(){
			/*面向过程
			#获取数据库连接
			#mysqli_connect('IP','用户名','密码','数据库');
			$connect = mysqli_connect('localhost','root','666666','test');
			var_dump($connect);
			#选择数据库字符集
			#mysqli_set_charset("字符集");
			mysqli_set_charset("utf8");
			#选择数据库
			#mysqli_select_db('数据库名');
			mysqli_select_db('lgzx');
			#执行SQL语句
			#mysqli_query('SQL语句')
			mysqli_query('select * from dual');
			#获取一个带键值的数组(第一条数据)
			$array = mysqli_fetch_array($result,MYSQLI_ASSOC);
			#获取一个带键值的数组(所有数据)
			$array = mysqli_fetch_all($result,MYSQLI_ASSOC);
			#关闭数据库连接
			mysqli_close($connect);
			*/
			#获取数据库连接
			$connect = new mysqli('localhost','root','666666');
			#设置数据库字符集
			$connect->set_charset("utf8");
			#选择数据库
			$database_bool = $connect->select_db('lgzx');
			#执行SQL语句
			$result = $connect->query("select * from userlist");
			#获取受影响行数/获取数据行数
			$list = $result->num_rows;
			#获取一个带键值的数组(第一条数据)
			$array = $result->fetch_array($result,MYSQLI_ASSOC);
			#获取一个带键值的数组(所有数据)
			$array = $result->fetch_all($result,MYSQLI_ASSOC);
			#关闭数据库连接
			$connect->close();
		}
	}
?>