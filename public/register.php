<?php

require_once "../functions.php";
require_once "../classes/UserLogic.php";

$place_name = "Register";

validateToken();

// エラーメッセージ
$err = [];

$user_name = $_POST["user_name"] = h(filter_input(INPUT_POST, "user_name"));
$email = $_POST["email"] = h(filter_input(INPUT_POST, "email"));
$_POST["company_name"] = h(filter_input(INPUT_POST, "company_name"));
$password = $_POST["password"] = h(filter_input(INPUT_POST, "password"));
$password_conf = $_POST["password_conf"] = h(filter_input(INPUT_POST, "password_conf"));
$_POST["type"] = h(filter_input(INPUT_POST, "type"));

// バリデーション
if(!$user_name) {
    $err["name_emp"] = "ユーザ名を記入してください。";
}
if(UserLogic::checkUserName($user_name)) {
    $err["name_exist"] = "そのユーザー名は既に使われています。";
}
if(!$email) {
    $err["email_emp"] = "メールアドレスを記入してください。";
}
if(UserLogic::checkEmail($email)) {
    $err["email_exist"] = "そのメールアドレスは既に使われています。";
}
if(!preg_match("/\A[a-z\d]{8,100}+\z/i", $password)) {
    $err["pass_err"] = "パスワードは英数字8文字以上100文字以下にしてください。";
}
if($password !== $password_conf) {
    $err["pass_conf_err"] = "確認用パスワードと異なっています。";
}

if(count($err) === 0) {

    // ユーザを登録する処理
    $hasCreated = UserLogic::createUser($_POST);
    
    if(!$hasCreated) {

        echo "登録に失敗しました。";
        
    }
    
} else {

    $_SESSION["err"] = $err;
    header("Location: ./signup_form.php");

    return;
    
}

// ログイン
// UserLogic::login($email, $password);

?>

<?php include "../_parts/_head1.php"; ?>
<title><?= $place_name; ?> - FU SNS</title>
<?php include "../_parts/_head2.php"; ?>

<body>

    <div class="main-box">
        <main>
            <div class="container">

                <h2>ユーザー登録が完了しました。</h2>
                <a class="mypage-link" href="./mypage.php">マイページへ</a>

            </div><!-- container -->
        </main>
    </div><!-- main-box -->

</body>
</html>