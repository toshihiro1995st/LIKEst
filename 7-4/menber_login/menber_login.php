<?php include('header.php');
  ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ログイン入力</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../style.css">
</head>
    
<body>

<div class="login">
<h9>LIKE point shopping</h9>    
<br><br>
<form action="menber_login_check.php" method="post">
mailアドレス<br>
<input type="text" name="email"required>
<br>
パスワード<br>
<input type="password" name="pass"required>
<br><br>
<input type="submit" value="ログイン">
<br><br>
<br>
<a href="./menber_login_db.php">パスワードをお忘れの方はこちら</a>
<br>
<a href="./menber_login_db.php">初回ログインの方はこちら</a>
    
</form>
</div>
<br><br>
<br><br>
<br><br>
<?php include('footer.php'); ?>        
    </div>
</body>
</html>