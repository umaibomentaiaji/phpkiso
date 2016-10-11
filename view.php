<?php
  
  //1.データベースに接続する
  $dsn = 'mysql:dbname=phpkiso;host=localhost';   //同じサーバに入っていたらlocalhost
  $user = 'root';   //xampで決まってる
  $password='';     //xampで決まってる
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');    //これがないと文字化けしちゃうよ！

  //2.SQL文を実行する
  $sql = 'SELECT * FROM `survey`';
  // var_dump($sql); 動いているかを確認するデバッグ
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

//  while (1) {
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($rec == false) {
    break;
  }
  echo $rec['code'] . '<br>';
  echo $rec['nickname'] . '<br>';
  echo $rec['email'] . '<br>';
  echo $rec['content'] . '<br>';
  echo '<hr>';
//}

  //データベースを切断する
  $dbh = null;
?>

