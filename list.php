<?php
 
header("Content-type: text/html; charset=utf-8");
 
require_once("db_sample01.php");
$mysqli = db_connect();
 
 $sql = "SELECT * FROM employee ";
//$sql = 'SELECT * FROM employee inner join assignment on employee.department = assignment.id'; 
$result = $mysqli -> query($sql);
 
//クエリー失敗
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
<button type="reset"><a href="input_form.html">社員追加登録</a></button> 
<table border='1'>
<tr><td>社員番号</td><td>name</td><td>部署名</td><td>名前を変更する</td><td>名前を削除する</td><td>詳細</td></tr>
 
<?php 
foreach($rows as $row){
 ?>
 
<tr> 
	<td><?=$row['number']?></td>
	<td><?=htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8')?></td>
	<td><?=htmlspecialchars($row['department'], ENT_QUOTES, 'UTF-8')?></td>
	<td>
		<form action="update_check.php" method="post">
		<input type="submit" value="変更">
		<input type="hidden" name="code" value="<?=$row['code']?>">
		</form>
	</td>
	<td>
		<form action="delete_check.php" method="post">
		<input type="submit" value="削除">
		<input type="hidden" name="code" value="<?=$row['code']?>">
		</form>
	</td>
	<td>
		<form action="reference.php" method="post">
		<input type="submit" value="参照">
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