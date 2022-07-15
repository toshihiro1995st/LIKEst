<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ログイン実行</title>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="context">
        <h1>welcome to LIKE point shopping!!</h1>
    </div>


<div class="area" >
            <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
    

    
<body>
 
<?php
    try{
 
require_once("../common/common.php");
 
$post = sanitize($_POST);
 
$email = $post["email"];
$pass = $post["pass"];
        
$pass = md5($pass);
        
$dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
$user = "root";
$password = "";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
$sql = "SELECT code, name FROM menber WHERE email=? AND password=?";
$stmt = $dbh -> prepare($sql);
$data[] = $email;
$data[] = $pass;
$stmt -> execute($data);
        
$dbh = null;
        
$rec = $stmt -> fetch(PDO::FETCH_ASSOC);
        
if(empty($rec["name"]) === true) {
    print "<h7>ログイン情報が間違っています。</h7><br>";
    print "<a href='menber_login.php'><h8>ログインページへ戻る</h8></a>";
    exit();
} 
session_start();
$_SESSION["menber_login"] = 1;
$_SESSION["menber_name"] = $rec["name"];
$_SESSION["menber_code"] = $rec["code"];
print "<a href='../shop/shop_list.php'><h2>メインページはこちらから<h2></a>";
        
}
catch(Exception $e) {
   print "只今障害が発生しております。";
   print "a href='menber_login.php'>ログインページへ戻る</a>";
   exit();
}


?>
</ul>
</div >
</head>

    <br><br>
    <?php include('footer.php'); ?>  
</body>
</html>