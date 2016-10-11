<?php
  $nickname = htmlspecialchars($_POST['nickname']);
  $email = htmlspecialchars($_POST['email']);
  $content = htmlspecialchars($_POST['content']);


  //データベースに接続する
  $dsn = 'mysql:dbname=phpkiso;host=localhost';   //同じサーバに入っていたらlocalhost
  $user = 'root';   //xampで決まってる
  $password='';     //xampで決まってる
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');    //これがないと文字化けしちゃうよ！

  //SQL文を実行する
  $sql = 'INSERT INTO `survey`(`nickname`, `email`, `content`) VALUES ("'. $nickname.'", "'.$email.'", "'.$content.'")';
  // var_dump($sql); 動いているかを確認するデバッグ
  $stmt = $dbh->prepare($sql);方法
  $stmt->execute();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>送信完了</title>
</head>
<body>
  <h1>お問い合わせありがとうございました！</h1>
  <div>
    <h3>お問い合わせ詳細内容</h3>
    <p>ニックネーム：<?php echo $nickname; ?></p>
    <p>メールアドレス：<?php echo $email; ?></p>
    <p>お問い合わせ内容：<?php echo $content; ?></p>
  </div>
</body>
</html>