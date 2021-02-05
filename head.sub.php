<?php
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가

$g5_debug['php']['begin_time'] = $begin_time = get_microtime();

if (! isset($g5['title'])) {
    $g5['title'] = $config['cf_title'];
    $g5_head_title = $g5['title'];
} else {
    // 상태바에 표시될 제목
    $g5_head_title = implode(' | ', array_filter(array(
        $g5['title'],
        $config['cf_title']
    )));
}

$g5['title'] = strip_tags($g5['title']);
$g5_head_title = strip_tags($g5_head_title);

// 현재 접속자
// 게시판 제목에 ' 포함되면 오류 발생
$g5['lo_location'] = addslashes($g5['title']);
if (! $g5['lo_location'])
    $g5['lo_location'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
$g5['lo_url'] = addslashes(clean_xss_tags($_SERVER['REQUEST_URI']));
if (strstr($g5['lo_url'], '/' . G5_ADMIN_DIR . '/') || $is_admin == 'super')
    $g5['lo_url'] = '';

if (! defined('G5_IS_ADMIN')) {

    ?>



<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="description" content="YONSEI Nano Inspired">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="Cache-control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">

<!-- Title -->
<title>Nano Inspired</title>

<!-- Favicon -->
<link rel="apple-touch-icon" sizes="57x57"
	href="favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60"
	href="favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72"
	href="favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76"
	href="favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114"
	href="favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120"
	href="favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144"
	href="favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152"
	href="favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180"
	href="favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"
	href="favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32"
	href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96"
	href="favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16"
	href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage"
	content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" />
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="preconnect" href="https://fonts.gstatic.com" />
<link
	href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@400;500;700&display=swap"
	rel="stylesheet">
<!-- Core Stylesheet -->
<link rel="stylesheet" href="<?php echo G5_CSS_URL?>/style.css" />

<style>
@font-face {
	font-family: 'classyfonts';
	src: url("<?php echo G5_URL?>/fonts/classy.eot?fftrrv");
	src: url("<?php echo G5_URL?>/fonts/classy.eot?fftrrv#iefix") format("embedded-opentype"),
		url("<?php echo G5_URL?>/fonts/classy.ttf?fftrrv") format("truetype"),
		url("<?php echo G5_URL?>/fonts/classy.woff?fftrrv") format("woff"),
		url("<?php echo G5_URL?>/fonts/classy.svg?fftrrv#classyfonts") format("svg");
	font-weight: normal;
	font-style: normal;
}
</style>
<script src="<?php echo G5_JS_URL?>/config.js"></script>
<!-- ******* All JS Files ******* -->
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

<script
	src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jarallax/1.12.5/jarallax.min.js"></script>
<!-- <script src="https://unpkg.com/jarallax@1/dist/jarallax-video.min.js"></script>-->

<script
	src="https://cdnjs.cloudflare.com/ajax/libs/scrollup/2.4.1/jquery.scrollUp.min.js"></script>
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
<?php if(defined('G5_IS_ADMIN')) { ?>
var g5_admin_url = "<?php echo G5_ADMIN_URL; ?>";
<?php } ?>
</script><?php

    add_javascript('<script src="' . G5_JS_URL . '/common.js?ver=' . G5_JS_VER . '"></script>', 0);
    add_javascript('<script src="' . G5_JS_URL . '/wrest.js?ver=' . G5_JS_VER . '"></script>', 0);
    if (! defined('G5_IS_ADMIN'))
        echo $config['cf_add_script'];
    ?>
</head>

<body>
	<!-- Preloader -->
	<div id="preloader">
		<div class="wrapper">
			<div class="cssload-loader"></div>
		</div>
	</div>

	<!-- ***** Header Area Start ***** -->
	<header class="header-area">
		<!-- Main Header Start -->
		<div class="main-header-area">
			<div class="classy-nav-container breakpoint-off">
				<!-- Classy Menu -->
				<nav class="classy-navbar justify-content-between" id="uzaNav">

					<!-- Logo -->
					<a class="nav-brand" href="<?php echo G5_URL?>"><img
						src="<?php echo G5_IMG_URL?>/big-logo.png" alt=""
						style="width: 144px;"></a>

					<!-- Navbar Toggler -->
					<div class="classy-navbar-toggler">
						<span class="navbarToggler"><span></span><span></span><span></span></span>
					</div>

					<!-- Menu -->
					<div class="classy-menu">
						<!-- Menu Close Button -->
						<div class="classycloseIcon">
							<div class="cross-wrap">
								<span class="top"></span><span class="bottom"></span>
							</div>
						</div>

						<!-- Nav Start -->
						<div class="classynav">
							<ul id="nav">
								<li><a href="<?php echo G5_URL?>">Home</a></li>
								<li><a href="javascript:event.preventDefault();">Members</a>
									<ul class="dropdown">
										<li><a href="<?php echo G5_BBS_URL?>/content.php?co_id=prof">- Professor</a></li>
										<li><a
											href="<?php echo G5_BBS_URL?>/board.php?bo_table=member">-
												Members</a></li>
									</ul></li>
								<li><a href="<?php echo G5_BBS_URL?>/board.php?bo_table=research">Research</a></li>
								<li><a href="javascript:event.preventDefault();">Publications</a>
									<ul class="dropdown">
										<li><a href="<?php echo G5_BBS_URL?>/board.php?bo_table=journal">- Journal</a></li>
										<li><a href="<?php echo G5_BBS_URL?>/board.php?bo_table=contents&wr_seo_title=conference">- Conference</a></li>
										<li><a href="<?php echo G5_BBS_URL?>/board.php?bo_table=contents&wr_seo_title=patent">- Patent</a></li>
									</ul></li>
								<li><a href="<?php echo G5_BBS_URL?>/board.php?bo_table=equipment">Equipment</a></li>
								<li><a href="javascript:event.preventDefault();">Board</a>
									<ul class="dropdown">
										<li><a href="<?php echo G5_BBS_URL?>/board.php?bo_table=notice">- Notice</a></li>
										<li><a href="<?php echo G5_BBS_URL?>/board.php?bo_table=gallery">- Gallery</a></li>
								<?php if ($is_member) {  ?><li><a href="<?php echo G5_BBS_URL ?>/logout.php">- Logout</a></li><?php }else{?>
									<li><a href="<?php echo G5_BBS_URL ?>/login.php">- Login</a></li><?php }?>
									</ul></li>
									
							</ul>

							<!-- 
							<div class="get-a-quote ml-4 mr-3">
								<a href="http://sit.yonsei.ac.kr" class="btn uza-btn">Go to
									Yonsei</a>
							</div>-->
						</div>
					</div>
				</nav>
			</div>
		</div>
	</header>
	<!-- ***** Header Area End ***** -->
    
    
    
    
    <?php
} else {
    /*
     * // 만료된 페이지로 사용하시는 경우
     * header("Cache-Control: no-cache"); // HTTP/1.1
     * header("Expires: 0"); // rfc2616 - Section 14.21
     * header("Pragma: no-cache"); // HTTP/1.0
     */
    ?>
<!doctype html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta http-equiv="imagetoolbar" content="no">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<?php
    if ($config['cf_add_meta'])
        echo $config['cf_add_meta'] . PHP_EOL;
    ?>
<title><?php echo $g5_head_title; ?></title>
<?php
    if (defined('G5_IS_ADMIN')) {
        if (! defined('_THEME_PREVIEW_'))
            echo '<link rel="stylesheet" href="' . run_replace('head_css_url', G5_ADMIN_URL . '/css/admin.css?ver=' . G5_CSS_VER, G5_URL) . '">' . PHP_EOL;
    } else {
        echo '<link rel="stylesheet" href="' . run_replace('head_css_url', G5_CSS_URL . '/default.css?ver=' . G5_CSS_VER, G5_URL) . '">' . PHP_EOL;
    }
    ?>
<!--[if lte IE 8]>
<script src="<?php echo G5_JS_URL ?>/html5.js"></script>
<![endif]-->
<script>
// 자바스크립트에서 사용하는 전역변수 선언
var g5_url       = "<?php echo G5_URL ?>";
var g5_bbs_url   = "<?php echo G5_BBS_URL ?>";
var g5_is_member = "<?php echo isset($is_member)?$is_member:''; ?>";
var g5_is_admin  = "<?php echo isset($is_admin)?$is_admin:''; ?>";
var g5_is_mobile = "<?php echo G5_IS_MOBILE ?>";
var g5_bo_table  = "<?php echo isset($bo_table)?$bo_table:''; ?>";
var g5_sca       = "<?php echo isset($sca)?$sca:''; ?>";
var g5_editor    = "<?php echo ($config['cf_editor'] && $board['bo_use_dhtml_editor'])?$config['cf_editor']:''; ?>";
var g5_cookie_domain = "<?php echo G5_COOKIE_DOMAIN ?>";
<?php if(defined('G5_IS_ADMIN')) { ?>
var g5_admin_url = "<?php echo G5_ADMIN_URL; ?>";
<?php } ?>
</script>
<?php
    add_javascript('<script src="' . G5_JS_URL . '/jquery-1.12.4.min.js"></script>', 0);
    add_javascript('<script src="' . G5_JS_URL . '/jquery-migrate-1.4.1.min.js"></script>', 0);
    add_javascript('<script src="' . G5_JS_URL . '/jquery.menu.js?ver=' . G5_JS_VER . '"></script>', 0);
    add_javascript('<script src="' . G5_JS_URL . '/common.js?ver=' . G5_JS_VER . '"></script>', 0);
    add_javascript('<script src="' . G5_JS_URL . '/wrest.js?ver=' . G5_JS_VER . '"></script>', 0);
    add_javascript('<script src="' . G5_JS_URL . '/placeholders.min.js"></script>', 0);
    add_stylesheet('<link rel="stylesheet" href="' . G5_JS_URL . '/font-awesome/css/font-awesome.min.css">', 0);
    if (! defined('G5_IS_ADMIN'))
        echo $config['cf_add_script'];
    ?>
</head>
<body <?php echo isset($g5['body_script']) ? $g5['body_script'] : ''; ?>>
<?php
    if ($is_member) { // 회원이라면 로그인 중이라는 메세지를 출력해준다.
        $sr_admin_msg = '';
        if ($is_admin == 'super')
            $sr_admin_msg = "최고관리자 ";
        else if ($is_admin == 'group')
            $sr_admin_msg = "그룹관리자 ";
        else if ($is_admin == 'board')
            $sr_admin_msg = "게시판관리자 ";

        echo '<div id="hd_login_msg">' . $sr_admin_msg . get_text($member['mb_nick']) . '님 로그인 중 ';
        echo '<a href="' . G5_BBS_URL . '/logout.php">로그아웃</a></div>';
    }
}