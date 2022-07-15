<?php include('header.php');
  ?>
<?php
session_start();
session_regenerate_id(true);
 
if(isset($_SESSION["menber_login"]) === true) {
print "ようこそ";
    print $_SESSION["menber_name"];
    print "さん　";
    print "<a>現在のポイントは22000pointです</a>";
    print "<br>";
    print "<a href='../menber_login/menber_logout.php'>ログアウト</a>";
    print "<br><br>";
}
 
?>

<!DOCTYPE html>
<html lang="ja">
<head>    
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>LIKE point shopping</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>評価</h1>
    <div style="width: 600px;">
        <canvas id="chart" width="700" height="500" ></canvas>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <script>
        var ctx = $('#chart');
        var mychart = new Chart(ctx, {
            type: 'radar',
            data: {
                labels: [
                    '勤務実績',
                    '勤務態度',
                    '能力評価',
                    '職務評価',
                    '役割評価'
                ],
                datasets: [{
                    label: 'クライアント評価',
                    data: [
                        10,40,20,10,20
                    ],
                    backgroundColor: 'rgba(241, 107, 141, 0.5)',
                    borderColor: 'rgba(0, 0, 0, 0)',
                    borderWidth: 1,
                    pointBackgroundColor: 'rgb(46,106,177)',
                },{
                    label: '人事評価',
                    data: [
                        40,10,5,15,30
                    ],
                    backgroundColor: 'rgba( 31, 167, 165, 0.5)',
                    borderColor: 'rgba(0, 0, 0, 0)',
                    borderWidth: 1,
                    pointBackgroundColor: 'rgb(46,106,177)',
                }]
            },
            options: {
                title: {
                    display: true,
                    text: '',
                },
                scale: {
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 100,
                        stepSize: 10,
                        callback: function(value, index, values){
                            return  value +  ''
                        }
                    },
                }
            }
        });
    </script>
</body>
</html>
<body>
<warapper>
<main> 
<?php
try{
 
$dsn = "mysql:host=localhost;dbname=shop;charset=utf8";
$user = "root";
$password = "";
$dbh = new PDO($dsn, $user, $password);
$dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
$sql = "SELECT code,name,price,gazou,explanation FROM mst_product WHERE1";
$stmt = $dbh -> prepare($sql);
$stmt -> execute();

$dbh = null;

print "商品一覧";
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
    print "<div class='box'>";
    print "<div class='list'>";
    print "<div class='img'>";
    print $gazou;
    print "</div>";
    print "<div class='npe'>";
    print "商品名:".$rec["name"];
    print "<br>";
    print "価格:".$rec["price"]."円";
    print "<br>";
    print "詳細:".$rec["explanation"];
    print "</div>";
    print "</div>";
    print "</div>";
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
<nav id="menu" class="close"> 
<h4>カテゴリ検索</h4>
    <ul>
        <li><a href="shop_list_eart.php">食品</a></li>
        <li><a href="shop_list_kaden.php">家電</a></li>
        <li><a href="shop_list_book.php">書籍</a></li>
        <li><a href="shop_list_niti.php">日用品</a></li>
        <li><a href="shop_list_sonota.php">その他</a></li>
    </ul>
</nav> 
<aside>
<div class="box">
<div class="box">
<h4>ポータルサイトへアクセス</h4>
<div class="img"><a href="https://sites.google.com/like-st.co.jp/expert/%E3%83%9B%E3%83%BC%E3%83%A0"><img src="logo.svg"></a>
</div></div>
</aside>  
</main>
<aside>
</aside>
</warapper>     
    <?php include('footer.php'); ?>
</body>
</html>