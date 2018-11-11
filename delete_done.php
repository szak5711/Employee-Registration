<?php
	
	header("Content-type: text/html; charset=utf-8");
	require_once("db_sample01.php");
	$mysqli = db_connect();

	//プリペアドステートメント
	$stmt = $mysqli->prepare("DELETE FROM employee WHERE code=?");
	
		//プレースホルダへ実際の値を設定する
		$stmt->bind_param('i', $code);
		$code = $_POST['code'];
				
		$stmt->execute();
		
		//変更された行の数が1かどうか
		if($stmt->affected_rows == 1){
			$seikou = "削除いたしました。";
		}else{
			$seikou = "削除失敗です";
		}
	
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
<h1>削除完了画面</h1> 
<p><?php print_r($seikou)?></p> 
<button type="reset"><a href="list.php">管理画面へ</a></button>

</body>
</html>