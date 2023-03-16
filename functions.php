<?php

/**
 * XSS対策：エスケープ処理
 * @param string $str 対象の文字列
 * @return string 処理された文字列
 */
function h($str) {

    return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
    
}

/**
 * CSRF対策：ワンタイムトークン
 * @param void
 * @return string $token
 */
function setToken() {

    $_SESSION["token"] = bin2hex(random_bytes(32));

    return $_SESSION["token"];
    
}

/**
 * バリデーション
 * @param void
 * @return void
 */
function validateToken() {

    if(
        empty($_SESSION["token"]) ||
        $_SESSION["token"] !== filter_input(INPUT_POST, "token")
    ) {

        exit("Invalid post request：不正なアクセスです。");

    }

    token_destroy();
    
}

/**
 * $_SESSION["err"]を空にする
 * @param void
 * @return void
 */
function err_destroy() {
    
    $_SESSION["err"] = array();
    
}

/**
 * $_SESSION["token"]を削除する
 * @param void
 * @return void
 */
function token_destroy() {

    unset($_SESSION["token"]);
    
}

session_start();