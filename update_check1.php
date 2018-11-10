<?php
 
header("Content-type: text/html; charset=utf-8");
 
require_once("db_sample01.php");
$mysqli = db_connect();
 
$sql = "SELECT * FROM employee";
 
$result = $mysqli -> query($sql);
 
//クエリ失敗
if(!$result) {
	echo $mysqli->error;
	exit();
}
 
//連想配列で取得
while($row = $result->fetch_array(MYSQLI_ASSOC)){
	$rows[] = $row;
}
 
//結果セットを解放
$result->free();
 
// データベース切断
$mysqli->close();
 
?>
 
<!DOCTYPE html>
<html>
<head>
<title>name一覧</title>
</head>
<body>
<h1>name一覧</h1> 
 
<table border='1'>
<tr><td>code</td><td>name</td><td>名前を変更する</td></tr>
 
<?php 
foreach($rows as $row){
 ?>
 
<tr> 
	<td><?=$row['code']?></td>
	<td><?=htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8')?></td>
	<td>
		<form action="update2.php" method="post">
		<input type="submit" value="変更する">
		<input type="hidden" name="code" value="<?=$row['code']?>">
		</form>
	</td>
</tr>
 
 <?php 
 } 
 ?>
 
</table>
 
</body>
</html>