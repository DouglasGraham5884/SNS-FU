<?php

require_once "../functions.php";
require_once "../classes/UserLogic.php";

$place_name = "Signup Form";

// ログインしているかどうかのチェック
$result = UserLogic::checkLogin();

// ログインしていなかったらログイン画面へ返す
if(!$result) {

    $_SESSION["message"] = "ログインしてください";
    header("Location: ./login_form.php");

    return;
    
}

// 管理者じゃなかったらマイページへ返す
if((!$_SESSION["login_user"]["type"] == "admin")) {

    header("Location: ./mypage.php");

    return;
    
}

if(isset($_SESSION["err"])) $err = $_SESSION["err"];

err_destroy();

?>

<?php include "../_parts/_head1.php"; ?>
<title><?= $place_name; ?> - FU SNS</title>
<?php include "../_parts/_head2.php"; ?>

<body>
    
<div class="main-box">
    <main>
        <div class="container">

            <h2>ユーザ登録フォーム</h2>
            <form action="register.php" method="POST">
                <p>
                    <label for="user_name">ユーザ名：</label>
                    <?php if(isset($err["name_emp"])) : ?>
                        <p class="err-message"><?= $err["name_emp"]; ?></p>
                    <?php endif; ?>
                    <?php if(isset($err["name_exist"])) : ?>
                        <p class="err-message"><?= $err["name_exist"]; ?></p>
                    <?php endif; ?>
                    <input type="text" name="user_name" id="user_name">
                </p>
                <p>
                    <label for="email">メールアドレス：</label>
                    <?php if(isset($err["email_emp"])) : ?>
                        <p class="err-message"><?= $err["email_emp"]; ?></p>
                    <?php endif; ?>
                    <?php if(isset($err["email_exist"])) : ?>
                        <p class="err-message"><?= $err["email_exist"]; ?></p>
                    <?php endif; ?>
                    <input type="email" name="email" id="email">
                </p>
                <p>
                    <label for="company_name">所属名：</label>
                    <input type="text" name="company_name" id="company_name">
                </p>
                <p>
                    <label for="password">パスワード：</label>
                    <?php if(isset($err["pass_err"])) : ?>
                        <p class="err-message"><?= $err["pass_err"]; ?></p>
                    <?php endif; ?>
                    <input type="password" name="password" id="password">
                </p>
                <p>
                    <label for="password_conf">パスワード確認：</label>
                    <?php if(isset($err["pass_conf_err"])) : ?>
                        <p class="err-message"><?= $err["pass_conf_err"]; ?></p>
                    <?php endif; ?>
                    <input type="password" name="password_conf" id="password_conf">
                </p>
                <div class="type-selector">
                    <p>
                        <input type="radio" name="type" value="public" checked id="public">
                        <label class="type-selector" for="public">Public</label>
                    </p>
                    <p>
                        <input type="radio" name="type" value="admin" id="admin">
                        <label class="type-selector" for="admin">Admin</label>
                    </p>
                </div>
                <p>
                    <input type="submit" value="新規登録">
                </p>
                <input type="hidden" name="token" value="<?= h(setToken()); ?>">
            </form>
        
            <p><a class="mypage-link" href="./mypage.php">マイページ</a></p>
            
        </div><!-- container -->
    </main>
</div><!-- main-box -->

</body>
</html>