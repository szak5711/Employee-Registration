 <?php
    $number = $_POST['number'];
    $yourname = $_POST['yourname'];
    $department = $_POST['department'];
    $seibetu = $_POST['seibetu'];

var_dump($_POST['number']);

    header("Content-type: text/html; charset=utf-8");
	$dsn = 'mysql:host=localhost:3306;dbname=company;charset=utf8';
	$user = 'root';
	$password = 'root';
 
	
		$dbh = new PDO($dsn, $user, $password);
		// $statement = $dbh->prepare("INSERT INTO employee (code, number, name, department, seibetu) VALUES (:code,:number, :name, :department, :seibetu)");
        $statement = $dbh->prepare("INSERT INTO employee (number, name, department, seibetu) VALUES (:number, :name, :department, :seibetu)");
        
        //プレースホルダへ実際の値を設定する
        $statement->bindValue(':number', $number, PDO::PARAM_STR);
        $statement->bindValue(':name', $yourname, PDO::PARAM_STR);
        $statement->bindValue(':department', $department, PDO::PARAM_STR);
        $statement->bindValue(':seibetu', $seibetu, PDO::PARAM_STR);
        $statement->execute();
        //データベース接続切断
        $dbh = null;
        
?>

<!DOCTYPE html>
<html>
<head>
<title>登録画面</title>
<meta charset="utf-8">
</head>
<body>


<p><?=htmlspecialchars($yourname, ENT_QUOTES, 'UTF-8')."さんで登録いたしました。"?></p>


<button type="reset"><a href="list.php">社員登録</a></button> 
</body>
</html>