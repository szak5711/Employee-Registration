<?php
 $number = $_POST['number'];
 $yourname = $_POST['yourname'];
 $department = $_POST['department'];
 $seibetu = $_POST['seibetu'];
?>
 
<!DOCTYPE html>
<html>
<head>
<title>変更画面</title>
</head>
<body>
<h1>変更画面</h1> 
 
<p>名前を変更して下さい。</p>
<?=htmlspecialchars($number, ENT_QUOTES, 'UTF-8')."さん。"?>
<?=htmlspecialchars($yourname, ENT_QUOTES, 'UTF-8')."さん。"?>
<?=htmlspecialchars($department, ENT_QUOTES, 'UTF-8')."さん。"?>
<?=htmlspecialchars($seibetu, ENT_QUOTES, 'UTF-8')."さん。"?>
<?php
print '<form method="post" action="input_done.php">';
     print '<input name="number" type="hidden" value="'.$number.'">';
     print '<input name="yourname" type="hidden" value="'.$yourname.'">';
     print '<input name="department" type="hidden" value="'.$department.'">';
     print '<input name="seibetu" type="hidden" value="'.$seibetu.'">';
     print '<input type="button" onclick="history.back()" value="戻る">';
     print '<input type="submit" value="OK">';
     print '</form>';
     ?>

<button type="reset"><a href="list.php">管理画面へ</a></button>
</body>
</html>