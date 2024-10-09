<?php
// ファイルの1番上に⇩を記述
// これで入力値を$_SESSIONを介して「confirm.php」に渡すことができる
//セッションとは、個々のユーザーのデーターを格納して、複数のページをまたがるときに情報を永続させたまま、移動できる機能
session_start();   // SESSIONを使うときは最初にスタートさせる
// 送信ボタンが押されたかどうか
/*
if(isset($_POST['submit'])){ // #1
*/
if(isset($_POST['name'])){ // #1

    // POSTされたデータをエスケープ処理して変数に格納
    $name  = htmlspecialchars($_POST['name'],ENT_QUOTES | ENT_HTML5);
    $email = htmlspecialchars($_POST['email'],ENT_QUOTES | ENT_HTML5);
    $phoneNum = htmlspecialchars($_POST['phoneNum'],ENT_QUOTES | ENT_HTML5);
    $subject = htmlspecialchars($_POST['subject'],ENT_QUOTES | ENT_HTML5);
    $message = htmlspecialchars($_POST['message'],ENT_QUOTES | ENT_HTML5);

    $errors = []; //エラー格納用配列
    if (empty(trim($name))) {
        $errors['name'] = "名前を入力してください";
    }
    if (empty(trim($email))) {
        $errors['email'] = "メールアドレスを入力してください";
    }
    if (empty(trim($phoneNum))) {
        $errors['phoneNum'] = "電話番号を入力してください";
    }
    if (empty(trim($subject))) {
        $errors['subject'] = "タイトルを入力してください";
    }
    if (empty(trim($message))) {
        $errors['message'] = "メッセージ内容を入力してください";
    }

    // エラー配列がなければ異常なし
    if(count($errors) === 0){ // #2
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phoneNum'] = $phoneNum;
        $_SESSION['subject'] = $subject;
        $_SESSION['message'] = $message;
        /*htdocsのファイル構成変更後は、ここも変更する必要があるかも */
        /*
        header('Location:https://dominoportfolio.online/confContents.php');
        */
        header('Location:http://localhost:3000/confContents.php');
    }else{
      // エラー配列があればエラーを表示
      echo $errors['name'];
      echo $errors['email'];
      echo $errors['phoneNum'];
      echo $errors['subject'];
      echo $errors['message'];
    } // #2
} // #1

// confContents.phpから戻ってきたときに値を保持
if (isset($_GET) && isset($_GET['action']) && $_GET['action'] === 'edit') {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $phoneNum = $_SESSION['phoneNum'];
    $subject = $_SESSION['subject'];
    $message = $_SESSION['message'];
  }
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" />
        <title>Domino Portfolio ー HOME</title>
        <link rel="stylesheet" href="myPortfolio/css/reset.css">
        <link rel="stylesheet" href="myPortfolio/css/style.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="myPortfolio/js/gsap.min.js"></script>
        <!--パラ-->
        <script src="myPortfolio/js/rellax.min.js"></script>
    </head>
    <body>
    <div id="cursor" class="cursor"></div>
        <!--<div id="index" class="index">-->
            <header class="page-header">
                <div class="header-inner">
                    <div class="page-ttl">
                        <a href="index.php" class="page-ttl-link">
                            <h1>YUYA TAKEDOMI</h1>
                        </a>
                    </div>
                    <div class="ham-drawer wrapper-header">
                        <div class="images">
                            <div class="ham-bgImage">
                            </div>
                        </div>
                        <nav class="header-nav nav" id="js-nav">
                            <ul class="nav-items">
                                <li class="nav-items-item nav-item-home">
                                    <a class="nav-item nav-items__a" href="index.php">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-items-item nav-item-about">
                                    <a class="nav-item nav-items__a" href="/myPortfolio/html/introduction.html">
                                        About Me
                                    </a>
                                </li>
                                <li class="nav-items-item nav-item-works">
                                    <a class="nav-item nav-items__a" href="#myWork">
                                        Works
                                    </a>
                                    <ul class="works-nav">
                                        <li>
                                            <a class="nav-items__a" href="/myPortfolio/html/website.html">
                                                Web Development
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-items__a" href="/myPortfolio/html/design.html">
                                                Design
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-items__a" href="/myPortfolio/html/photography.html">
                                                Shooting
                                            </a>
                                        </li>
                                        <li>
                                            <a class="nav-items__a" href="/myPortfolio/html/editing.html">
                                                Editing
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-items-item nav-item-contact">
                                    <a class="nav-item nav-items__a" href="index.php#contact">
                                        Contact
                                    </a>
                                </li>
                                <ul class="nav-sns">
                                    <li>
                                        <a href="https://twitter.com/domino_calife" target="_blank">
                                            X(Twitter)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/vancouver_dom_cafe" target="_blank">
                                            Instagram
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://domino-blog.com/">
                                            Blog
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </nav>
                        <button class="header__hamburger hamburger" id="js-hamburger" target="_blank">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </header>
            <main class="main-content wrapper">
                <div class="snsArea">
                    <p class="snsArea-ttl">SNS</p>
                    <ul class="sns-list">
                        <li>
                            <a href="https://twitter.com/domino_calife" target="_blank">
                                <img src="myPortfolio/images/logo/logo-x(b).png" width="20" height="19">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/vancouver_dom_cafe" target="_blank">
                                <img src="myPortfolio/images/logo/logo-ig(b).png" width="20" height="19">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="loading-bg">
                    <div class="loading-animation-text">
                        <p>Domino Portfolio</p>
                    </div>
                </div>
                <section id="top-section">
                   <div class="top-section-inner">
                    <div class="name-container">
                        <span class="Y">Y</span>
                        <span class="U js-rellax2">U</span>
                        <span class="Y2 js-rellax">Y</span>
                        <span class="A">A</span>
                        <span class="T">T</span>
                        <span class="A2">A</span>
                        <span class="K js-rellax">K</span>
                        <span class="E">E</span>
                        <span class="D js-rellax">D</span>
                        <span class="O">O</span>
                        <span class="M js-rellax2">M</span>
                        <span class="I js-rellax">I</span>
                        <div class="top-bg"></div>
                    </div>
                </section>
                <section id="aboutMe" class="aboutMe">
                    <div class="aboutMe-inner">
                        <div class="sub-ttl-container">
                            <h2 class="fadeUpTrigger">
                                ABOUT ME
                            </h2>
                        </div>
                        <div class="prof-area">
                            <div class="prof-txtArea">
                                <div class="js-motto1">
                                    <p class="motto fadeUpTrigger">
                                        Web Developer
                                    </p>
                                </div>
                                <div class="js-motto2">
                                    <p class="motto fadeUpTrigger">
                                        Marketer
                                    </p>
                                </div>
                                <div class="js-motto3">
                                    <p class="motto fadeUpTrigger">
                                        Photographer
                                    </p>
                                </div>
                                <div class="prof-body">
                                    <!--
                                    <p class="prof-txt-en fadeUpTrigger">
                                        Will never forget the positive attitude towords the improvement of my skills.<br><br>

                                        Utilize the skills that I gained to the website development for clients.<br>
                                        Provide the ideal website to them.<br><br>

                                        Put the marketing knowledge what I gained at school <br>
                                        and by runnning my blog into practice.
                                    </p>
                                    <p class="prof-txt-jp fadeUpTrigger">
                                        スキル向上への積極的な姿勢を決して忘れません。<br>
                                        これまで得たスキルを活用して、クライアント向けにウェブサイト開発に取り組み、理想的なウェブサイトを提供します。<br>
                                        学校で学んだマーケティングの知識や、自分のブログを運営することで得た知識を実践に活かします。
                                    </p>
-->
                                    <div class="btn-area">
                                        <a href="myPortfolio/html/introduction.html" class="btn-arrow">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="prof-imgArea fadeUpTrigger">
                            <img class="js-rellax" src="myPortfolio/images/mePic2.jpeg">
                        </div>
                    </div>
                </section>
                <section id="myWork" class="myWork">
                    <div class="sticky-area">
                        <div class="myWork-inner">
                            <div class="sub-ttl-container work-content">
                                <h2 class="subtitle fadeUpTrigger">
                                    WORKS
                                </h2>
                            </div>
                            <div id="web-dev" class="work-content">
                                <a class="js-splitText work-ttl web-dev" href="myPortfolio/html/website.html">
                                    Web Development
                                </a>
                            </div>
                            <div id="web-design" class="work-content">
                                <a class="js-splitText work-ttl web-design" href="myPortfolio/html/design.html">
                                    Design
                                </a>
                            </div>
                            <div id="shooting" class="work-content">
                                <a class="js-splitText work-ttl shooting" href="myPortfolio/html/photography.html">
                                    Shooting
                                </a>
                            </div>
                            <div id="editing" class="work-content">
                                <a class="js-splitText work-ttl editing" href="myPortfolio/html/editing.html">
                                    Editing
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="contact" class="contact">
                    <div class="marquee">
                        <div class="marquee-inner">
                            REACH OUT / 
                        </div>
                        <div class="marquee-inner" aria-hidden="true">
                            REACH OUT
                        </div>
                    </div>
                    <div class="contact-inner">
                        <div class="sub-ttl-container">
                            <h2 class="fadeUpTrigger">
                                CONTACT
                            </h2>
                        </div>
                        <form action="index.php" method="POST" class="contact-form">
                            <div class="name fadeUpTrigger">
                                <label for="name"></label>
                                <input type="text" placeholder="Type in your name" name="name" id="name" value="<?php if(isset($name)){echo $name;} ?>" required>
                            </div>
                            <div class="email fadeUpTrigger">
                                <label for="email"></label>
                                <input type="email" placeholder="example@gmail.com" name="email" value="<?php if(isset($email)){echo $email;} ?>" required>
                            </div>
                            <div class="phoneNum fadeUpTrigger">
                                <label for="phone number"></label>
                                <input type="text" placeholder="123-4567" name="phoneNum" id="phoneNum" value="<?php if(isset($phoneNum)){echo $phoneNum;} ?>" required>
                            </div>
                            <div class="subject fadeUpTrigger">
                                <label for="subject"></label>
                                <select placeholder="Subject" name="subject" id="subject" required>
                                    <option value="">Subject</option>
                                    <option>Web Development/Design</option>
                                    <option>Shooting</option>
                                    <option>Editing</option>
                                </select>
                            </div>
                            <div class="message fadeUpTrigger">
                                <label for="message"></label>
                                <textarea name="message" placeholder="Message" required><?php if(isset($message)){echo trim($message);} ?></textarea>
                            </div>
                            <div class="submit fadeUpTrigger">
                                <input type="submit" name="submit" class="button" value="Submit" id="button" />
                            </div>
                        </form><!-- // End form -->
                    </div>
                </section>
            </main>
        <footer>
            <div class="footer-inner">
                <div class="my-email-container">
                    <p class="my-email" id="js-email-copy">
                        yuinca2324@gmail.com
                    </p>
                </div>
                <div class="ftr-info">
                    <nav class="footer-nav nav">
                        <ul class="nav-items">
                            <li class="nav-items-item nav-item-home">
                                <a class="nav-item nav-items__a" href="index.php">
                                    Home
                                </a>
                            </li>
                            <li class="nav-items-item nav-item-about">
                                <a class="nav-item nav-items__a" href="/myPortfolio/html/introduction.html">
                                    About Me
                                </a>
                            </li>
                            <li class="nav-items-item nav-item-works">
                                <a class="nav-item nav-items__a" href="#myWork">
                                    Works
                                </a>
                                <ul class="works-nav">
                                    <li>
                                        <a class="nav-items__a" href="/myPortfolio/html/website.html">
                                            Web Development
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-items__a" href="/myPortfolio/html/design.html">
                                            Design
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-items__a" href="/myPortfolio/html/photography.html">
                                            Shooting
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-items__a" href="/myPortfolio/html/editing.html">
                                            Editing
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-items-item nav-item-contact">
                                <a class="nav-item nav-items__a" href="index.php#contact">
                                    Contact
                                </a>
                            </li>
                            <ul class="nav-sns">
                                <li>
                                    <a href="https://twitter.com/domino_calife" target="_blank">
                                        X(Twitter)
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/vancouver_dom_cafe" target="_blank">
                                        Instagram
                                    </a>
                                </li>
                                <li>
                                    <a href="https://domino-blog.com/">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </ul>
                    </nav>
                </div>
                <div class="copy-right-container">
                    <p class="copy-right">
                        <small>
                            &copy; 2024 Yuya Takedomi
                        </small>
                    </p>
                </div>
            </div>
        </footer>
        <script src="myPortfolio/js/ScrollTrigger.min.js"></script>
        <script src="myPortfolio/js/common.js"></script>
        <script src="myPortfolio/js/style.js"></script> 
    </body>
</html>
