<?php

require_once "../functions.php";
require_once "../classes/UserLogic.php";

$place_name = "Login Form";

// ログインしているかどうかのチェック
$result = UserLogic::checkLogin();

// ログインしていたらマイページへ返す
if($result) {

    header("Location: ./mypage.php");

    return;
    
}

if(isset($_SESSION["err"])) $err = $_SESSION["err"];

// セッション削除
UserLogic::down_session();

?>

<?php include "../_parts/_head1.php"; ?>
<title><?= $place_name; ?> - FU SNS</title>
<?php include "../_parts/_head2.php"; ?>

<body>

<div class="main-box">
    <main>
        <div class="container">

            <h2>ログインフォーム</h2>
            
            <?php if(isset($err["message"])) : ?>
                <p class="err-message"><?= $err["message"]; ?></p>
            <?php endif; ?>
            
            <form action="./login.php" method="POST">
        
                <p>
                    <label for="email">メールアドレス：</label>
                    <?php if(isset($err["email"])) : ?>
                        <p class="err-message"><?= $err["email"]; ?></p>
                    <?php endif; ?>
                    <input type="email" name="email">
                </p>
        
                <p>
                    <label for="password">パスワード：</label>
                    <?php if(isset($err["password"])) : ?>
                        <p class="err-message"><?= $err["password"]; ?></p>
                    <?php endif; ?>
                    <input type="password" name="password">
                </p>
        
                <p>
                    <input type="submit" value="ログイン">
                </p>
        
            </form>
            
        </div><!-- container -->
    </main>
</div><!-- main-box -->

</body>
</html>
                    