<?php
session_start();
session_regenerate_id(true);
 
if(isset($_SESSION["menber_login"]) === true) {
print "ようこそ";
    print $_SESSION["menber_name"];
    print "さん　";
    print "<a href='../menber_login/menber_logout.php'>ログアウト</a>";
    print "<br><br>";
}
 
?>
 
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>list</title>
<link rel="stylesheet" href="../style.css">
</head>
    
<body>
 
<?php
try{
 
$dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
$user = "root";
$password = "";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "SELECT code,name,price,gazou,explanation FROM mst_product WHERE category=?";
$stmt = $dbh -> prepare($sql);
$data[] = "書籍";
$stmt -> execute($data);
    
$dbh = null;
    
print "販売商品一覧";
print "　<a href='shop_cartlook.php'>カートを見る</a>";
print "<br><br>";
    
while(true) {
    $rec = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($rec === false) {
        break;
    }
    $code = $rec["code"];
    print "<a href='shop_product.php?code=".$code."'>";
    if(empty($rec["gazou"]) === true) {
        $gazou = "";
    } else {
        $gazou = "<img src='../product/gazou/".$rec['gazou']."'>";
    }
    print $gazou;
    print "<br>";
    print "商品名:".$rec["name"];
    print "<br>";
    print "価格:".$rec["price"]."円";
    print "<br>";
    print "詳細:".$rec["explanation"];
    print "</a>";
    print "<br>";
}
print "<br>";
 
}
catch(Exception $e) {
    print "只今障害が発生しております。<br><br>";
    print "<a href='../staff_login/staff_login.html'>ログイン画面へ</a>";
}
?>
<a href="shop_list.php">トップページへ戻る</a>
<br><br><br>
 
    
</body>
</html>