<!-- <h3 class="dev"><a href="../index.html">DEV</a></h3> -->
<div class="route">ここまでのルートを表示</div>
<div class="header-box">
        <div class="container header-container">
            <header>
                <a class="logo" href="http://w-fu.com/"><img src="/public/img/fu-logo.png" alt="fu-logo" height="40px"></a>
                <div class="pc-menu">
                    <nav class="header-nav">
                        <ul>
                            <li><a href="/public/home.php">Home</a></li>
                            <li><a href="/public/mypage.php">My Page</a></li>
                            <li><a href="/public/post_form.php">Post</a></li>
                            <?php if($login_user["type"] == "admin") : ?>
                                <li><a href="/public/signup_form.php">Sign Up</a></li>
                            <?php endif; ?>
                            <!-- <li><a href="/public/login_form.php">Log in</a></li> -->
                        </ul>
                    </nav>
                </div><!-- pc-menu -->
                <div class="sp-menu">
                    <span class="material-icons" id="open">menu</span>
                </div><!-- sp-menu -->
                <div class="header-overlay">
                    <span class="material-icons" id="close">close</span>
                    <nav class="header-nav">
                        <ul>
                            <li><a href="/public/home.php">Home</a></li>
                            <li><a href="/public/mypage.php">My Page</a></li>
                            <li><a href="/public/post_form.php">Post</a></li>
                            <?php if($login_user["type"] == "admin") : ?>
                                <li><a href="/public/signup_form.php">Sign Up</a></li>
                            <?php endif; ?>
                            <!-- <li><a href="/public/login_form.php">Log in</a></li> -->
                        </ul>
                    </nav>
                </div><!-- overlay -->
            </header>
            <div class="navigate">
                <h1 class="page-title pc-title"><?= $place_name; ?> - FU SNS</h1>
                <h1 class="page-title sp-title"><?= $place_name; ?></h1>
                <p><?= $login_user["user_name"]; ?>でログイン中</p>
            </div><!-- navigate -->
        </div><!-- container header-container -->
    </div><!-- header-box -->