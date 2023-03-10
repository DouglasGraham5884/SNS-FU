<?php

require_once "../functions.php";
require_once "../classes/UserLogic.php";
require_once "../classes/DataLogic.php";

$place_name = "Home";

// ログインしていなかったらログイン画面へ返す
$result = UserLogic::checkLogin();

if(!$result) {

    $_SESSION["message"] = "ログインしてください";
    header("Location: login_form.php");

    return;
    
}

// if(isset($_SESSION["login_user"])) {
//     $login_user = $_SESSION["login_user"];
// }
$login_user = $_SESSION["login_user"];

if(
    isset($_GET["page"]) &&
    preg_match("/^[1-9][0-9]*$/", $_GET["page"])
) {
    $page = (int)$_GET["page"];
} else {
    $page = 1;
}

// 全ユーザの投稿を取得
// $posts = DataLogic::showPostAll();
// if(isset($login_user)) {
//     $postsLim = DataLogic::paging($page, $login_user["user_id"], 1);
// } else {
//     $postsLim = DataLogic::paging($page, null, 1);
// }
$postsLim = DataLogic::paging($page, $login_user["user_id"], 1);
if($page > $postsLim["totalPages"]) {
    $page = 1;
    $postsLim = DataLogic::paging($page, $login_user["user_id"], 1);
}
$total = $postsLim["total"];
$totalPages = $postsLim["totalPages"];
$from = $postsLim["from"];
$to = $postsLim["to"];
$posts = $postsLim["posts"];

$imgNum = 0;
$description = [];

?>

<?php include "../_parts/_head1.php"; ?>
<title><?= $place_name; ?> - FU SNS</title>
<?php include "../_parts/_head2.php"; ?>

<body>
    
<?php include "../_parts/_header.php"; ?>

<div class="main-box">
    <main>

        <div class="overlay">
            <span class="material-icons" id="close">close</span>
        </div><!-- overlay -->

        <div class="container">

            <div class="message-board-box board-box-base">
                <h2>投稿一覧（全<?= $total ?>件中<?= $from ?>～<?= $to ?>件を表示）</h2>
                <div class="message-board board-base">

                    <ul>
                        <?php if($posts) : ?>
                            
                            <?php foreach($posts as $post) : ?>
                                
                                <li>
                                    <p class="created_at">
                                        <?= $post["created_at"] ?>
                                    </p>
                                    <p class="post-user_id">
                                    Post_No.<span class="Post_No"><?= $post["post_id"]; ?></span>
                                    User:<span class="User"><?= $post["user_name"]; ?></span>
                                    </p>
                                    <h2 class="title">
                                        <?= $post["title"]; ?>
                                    </h2>
                                    <div class="small-container">
                                        
                                        <p class="message">
                                            <?= $post["message"]; ?>
                                        </p>
                                        
                                        <!-- 添付写真 -->
                                        <div class="post-imgs">
                                            <?php if(!is_null($post["file_path_01"])) : ?>
                                                <img class="post-img img<?= ++$postNum ?>" src="<?= $post["file_path_01"] ?>" alt="写真１">
                                                <?php if(!is_null($desc1 = DataLogic::showDescription($post["file_path_01"]))) : ?>
                                                    <?php $description[0]["desc"] = $desc1?>
                                                    <?php $description[0]["num"] = $postNum ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(!is_null($post["file_path_02"])) : ?>
                                                <img class="post-img img<?= ++$postNum ?>" src="<?= $post["file_path_02"] ?>" alt="写真２">
                                                <?php if(!is_null($desc2 = DataLogic::showDescription($post["file_path_02"]))) : ?>
                                                    <?php $description[1]["desc"] = $desc2?>
                                                    <?php $description[1]["num"] = $postNum ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(!is_null($post["file_path_03"])) : ?>
                                                <img class="post-img img<?= ++$postNum ?>" src="<?= $post["file_path_03"] ?>" alt="写真３">
                                                <?php if(!is_null($desc3 = DataLogic::showDescription($post["file_path_03"]))) : ?>
                                                    <?php $description[2]["desc"] = $desc3?>
                                                    <?php $description[2]["num"] = $postNum ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(!is_null($post["file_path_04"])) : ?>
                                                <img class="post-img img<?= ++$postNum ?>" src="<?= $post["file_path_04"] ?>" alt="写真４">
                                                <?php if(!is_null($desc4 = DataLogic::showDescription($post["file_path_04"]))) : ?>
                                                    <?php $description[3]["desc"] = $desc4?>
                                                    <?php $description[3]["num"] = $postNum ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>

                                    </div><!-- small-container -->
                                        
                                    <div class="post-img-descs">
                                        <?php for($i = 1; $i <= 4; $i++) : ?>
                                            <?php if(!$post["file_path_0$i"] == "") : ?>
                                                <p class="post-img-desc desc<?= $description[$i - 1]["num"] ?>"><?= $description[$i - 1]["desc"] ?></p>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </div>
                                    
                                </li>
                                
                            <?php endforeach; ?>
                            
                        <?php else : ?>
                            
                            <li>投稿はまだありません。</li>
                            
                        <?php endif; ?>
                    </ul>

                    <div class="page-selecter">

                        <!-- 前へ -->
                        <?php if($page > 1) : ?>
                            <a href="?page=<?= $page - 1; ?>"><</a>
                        <?php endif; ?>

                        <?php for($i = 1; $i <= $totalPages; $i++) : ?>
                            <?php if($page == $i) : ?>
                                <strong class="current-page">
                                <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                                </strong>
                            <?php else : ?>
                                <a href="?page=<?= $i; ?>"><?= $i; ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>
                        
                        <!-- 次へ -->
                        <?php if($page < $totalPages) : ?>
                            <a href="?page=<?= $page + 1; ?>">></a>
                        <?php endif; ?>
                        
                    </div><!-- page-selecter -->
                    
                </div><!-- message-board -->
            </div><!-- message-board-box -->
            
        </div><!-- container -->
    </main>
</div><!-- main-box -->

<?php include "../_parts/_footer.php"; ?>