<?php
 
header("Content-type: text/html; charset=utf-8");
 
require_once("db_sample01.php");
$mysqli = db_connect();
 	
		//プリペアドステートメント
		$stmt = $mysqli->prepare("SELECT * FROM employee WHERE code=?");
		 
		 //$stmt = $mysqli->prepare("SELECT * FROM employee inner join assignment on employee.department = assignment.id WHERE code=?");
		//$stmt = $mysqli->prepare("SELECT * FROM employee inner join assignment on employee.department = assignment.id WHERE code=?");
		
			//プレースホルダへ実際の値を設定する
			$stmt->bind_param('i', $code);
			$code = $_POST['code'];


			$number = $_POST['number'];
			$name = $_POST['name'];
			$department = $_POST['department'];
			$seibetu = $_POST['seibetu'];
			//クエリ実行
			$stmt->execute();
			
			//結果変数のバインド
			// $stmt->bind_result($code,$number,$name,$dedepartmentpartment,$seibetu);
			$stmt->bind_result($code,$number,$name,$department,$seibetu);
			
			// 値の取得
			$stmt->fetch();
						
			//ステートメント切断
			$stmt->close();
	
            // データベース切断
			$mysqli->close();
			var_dump($number);
			var_dump($department);
			var_dump($name);
			var_dump($seibetu);

?>


<!DOCTYPE html>
<html>
<head>
<title>変更画面</title>
</head>
<body>
<h1>削除画面</h1> 
 
<p>社員番号：<?=htmlspecialchars($number, ENT_QUOTES, 'UTF-8')?></p>
<p>氏名：<?=htmlspecialchars($name, ENT_QUOTES, 'UTF-8')?></p>
<p>配属部署：<?=htmlspecialchars($department, ENT_QUOTES, 'UTF-8')?></p>
<p>性別：<?=htmlspecialchars($seibetu, ENT_QUOTES, 'UTF-8')?></p>

<button type="reset"><a href="list.php">管理画面へ</a></button>
</body>
</html>