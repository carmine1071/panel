<?php
// Simple panel i18n (PT/IT/EN) using session + cookie.
// Usage: include_once __DIR__.'/lang.php'; then echo __('key');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$available_langs = ['it','pt','en'];

// Set language from GET (e.g. ?lang=it)
if (isset($_GET['lang'])) {
    $req = strtolower(trim($_GET['lang']));
    if (in_array($req, $available_langs, true)) {
        $_SESSION['panel_lang'] = $req;
        setcookie('panel_lang', $req, time() + (86400 * 365), "/");
    }
}

// Set language from cookie if session missing
if (!isset($_SESSION['panel_lang']) && isset($_COOKIE['panel_lang'])) {
    $ck = strtolower(trim($_COOKIE['panel_lang']));
    if (in_array($ck, $available_langs, true)) {
        $_SESSION['panel_lang'] = $ck;
    }
}

// Default language
if (!isset($_SESSION['panel_lang'])) {
    $_SESSION['panel_lang'] = 'it';
    setcookie('panel_lang', 'it', time() + (86400 * 365), "/");
}

$PANEL_LANG = $_SESSION['panel_lang'];

// Load dictionary
$L = [];
$lang_file = __DIR__ . '/lang/' . $PANEL_LANG . '.php';
if (file_exists($lang_file)) {
    $L = include $lang_file;
}

function __($key) {
    global $L;
    if (isset($L[$key])) return $L[$key];
    return $key;
}
