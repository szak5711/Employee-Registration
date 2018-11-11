<?php
 
header("Content-type: text/html; charset=utf-8");
 
require_once("db_sample01.php");
$mysqli = db_connect();
 
if(empty($_POST)) {
	echo "<a href='update1.php'>update1.php</a>←こちらのページからどうぞ";
	exit();
}else{
	if (!isset($_POST['code'])  || !is_numeric($_POST['code']) ){
		echo "codeエラー";
		exit();
	}else{
		//プリペアドステートメント
		$stmt = $mysqli->prepare("SELECT * FROM employee WHERE code=?");
		if ($stmt) {
			//プレースホルダへ実際の値を設定する
			$stmt->bind_param('i', $code);
			$code = $_POST['code'];
			
			//クエリ実行
			$stmt->execute();
			
			//結果変数のバインド
			$stmt->bind_result($code,$number,$name,$department,$seibetu);
			// 値の取得
			$stmt->fetch();
						
			//ステートメント切断
			$stmt->close();
		}else{
			echo $mysqli->errno . $mysqli->error;
		}
	}
}
 
// データベース切断
$mysqli->close();
 
?>
 
<!DOCTYPE html>
<html>
<head>
<title>変更画面</title>
</head>
<body>
<h1>変更画面</h1> 
 
<p>名前を変更して下さい。</p>
<form action="update_done.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($name, ENT_QUOTES, 'UTF-8')?>">
<input type="hidden" name="code" value="<?=$code?>">
<input type="submit" value="変更する">
</form>
<button type="reset"><a href="list.php">管理画面へ</a></button>
</body>
</html>