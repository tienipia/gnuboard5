<?php
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가

run_event('pre_head');

include_once (G5_PATH . '/head.sub.php');
include_once (G5_LIB_PATH . '/latest.lib.php');
include_once (G5_LIB_PATH . '/outlogin.lib.php');
include_once (G5_LIB_PATH . '/poll.lib.php');
include_once (G5_LIB_PATH . '/visit.lib.php');
include_once (G5_LIB_PATH . '/connect.lib.php');
include_once (G5_LIB_PATH . '/popular.lib.php');
?>
