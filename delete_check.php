<?php
 
header("Content-type: text/html; charset=utf-8");
 
require_once("db_sample01.php");
$mysqli = db_connect();
 	
		//プリペアドステートメント
		$stmt = $mysqli->prepare("SELECT * FROM name WHERE id=?");
	
			//プレースホルダへ実際の値を設定する
			$stmt->bind_param('i', $id);
			$id = $_POST['id'];
			
			//クエリ実行
			$stmt->execute();
			
			//結果変数のバインド
			$stmt->bind_result($id,$name);
			// 値の取得
			$stmt->fetch();
						
			//ステートメント切断
			$stmt->close();
	
            // データベース切断
            $mysqli->close();
?>


<!DOCTYPE html>
<html>
<head>
<title>変更画面</title>
</head>
<body>
<h1>削除画面</h1> 
 
<form action="delete_done.php" method="post">
<p><?=htmlspecialchars($name, ENT_QUOTES, 'UTF-8')?></p>
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="削除する">
</form>
<button type="reset"><a href="list.php">管理画面へ</a></button>
</body>
</html>