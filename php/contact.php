<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
  $to = htmlspecialchars($_POST['email'], ENT_QUOTES);
  $contents = htmlspecialchars($_POST['contents'], ENT_QUOTES);
}

if (isset($_POST["submit"])) {

  header("Content-Type: text/html;charset=utf-8");
  mb_language('ja');
  mb_internal_encoding( "utf-8" );

  $subject = "【函館発新体験開発プロジェクト2017】お問い合わせメール";
  $from = "b1015056@fun.ac.jp";

  $body = <<< EOM

  {$name}　様

  お問い合わせありがとうございます。
  以下の内容を送信しました。


  【お名前】
  {$name} 様

  【メールアドレス】
  {$to}

  【お問い合わせ内容】
  {$contents}


  -----------------------------------------------
  公立はこだて未来大学
  函館発新体験開発プロジェクト
  プロジェクトリーダー 関根 椋太
  b1015056@fun.ac.jp
  -----------------------------------------------
EOM;

  //送信者
  mb_send_mail($to, $subject, $body, "From:".$from);

  //受信者
  mb_send_mail($from, $subject, $body, "From:".$to);
  header("Location: result.php");
  exit;

}

?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="ja"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="ja"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="ja"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="ja"><!--<![endif]-->
<html lang="ja">
<!-- Facebook -->
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109847164-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-109847164-1');
  </script>
  <meta charset="utf-8">
  <title>お問い合わせ | 函館発新体験開発プロジェクト2017</title>
  <!-- IE Document Mode -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <!-- Viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Metadata -->
  <meta content="お問い合わせ | 函館発新体験開発プロジェクト2017" name="title">
  <meta content="函館発新体験開発プロジェクトとは函館の複合文化施設を起点として、人の本能や好奇心を刺激するような新しい体験コンテンツを世界に向けて発信するプロジェクトです。" name="description">
  <meta content='函館発新体験開発プロジェクト, 新体験, はこだて未来大学, 柳 英克, プロジェクト学習, ビジネスEXPO' name='keywords'>
  <!-- Open Graph protocol -->
  <meta property="og:type" content="website">
  <meta property="og:title" content="お問い合わせ | 函館発新体験開発プロジェクト2017">
  <meta property="og:description" content="函館発新体験開発プロジェクトとは函館の複合文化施設を起点として、人の本能や好奇心を刺激するような新しい体験コンテンツを世界に向けて発信するプロジェクトです。">
  <meta property="og:image" content="http://fundesign.jp/pbl/project17/img/meta/ogp.jpg">
  <meta property="og:url" content="http://fundesign.jp/pbl/project17/">
  <meta property="og:site_name" content="お問い合わせ | 函館発新体験開発プロジェクト2017">
  <!-- Twitter -->
  <meta name="twitter:card" content="summary">
  <!-- font -->
  <link href="http://fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet" type="text/css">
  <!-- css -->
  <link rel="stylesheet" href="../css/contact.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/favicon/favicon.ico">
  <link rel="apple-touch-icon" sizes="152x152" href="../img/favicon/apple-touch-icon.png">
</head>
<body>
  <form action="contact.php" method="post">
    <input type="hidden" name="name" value="<?php echo $name; ?>">
    <input type="hidden" name="email" value="<?php echo $to; ?>">
    <input type="hidden" name="contents" value="<?php echo $contents; ?>">
    <section class="contact" id="contact">
      <div class="section__title wrapper">
        <p>以下の内容で間違いがなければ「送信する」ボタンを押して下さい。</p>
      </div>
      <div class="contact__box wrapper">
        <table>
          <tr>
            <th>お名前</th>
            <td><?php echo $name; ?></td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td><?php echo $to; ?></td>
          </tr>
          <tr>
            <th>お問い合わせ内容</th>
            <td><?php echo $contents; ?></td>
          </tr>
        </table>
        <input type="button" value="内容を修正する" onclick="history.back(-1)">
        <button type="submit" name="submit">送信する</button>
      </div>
    </section>
  </form>
</body>
</html>
