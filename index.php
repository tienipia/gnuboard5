<?php
include_once ('./_common.php');

define('_INDEX_', true);
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가

include_once (G5_PATH . '/head.php');
?>
<!-- ***** Welcome Area Start ***** -->
<section class="welcome-area">
	<div class="single-welcome-slide">
		<!-- Background Curve -->
		<div class="background-curve">
			<img src="./img/curve-1.png" alt="">
		</div>
		<!-- Welcome Content -->
		<div class="welcome-content h-100">
			<div class="container h-100">
				<div class="row h-100 align-items-center">
					<!-- Welcome Text -->
					<div class="col-12 col-md-4">
						<div class="welcome-text">
							<h2 data-animation="fadeInUp" data-delay="100ms">
								<span>Nano</span> Inspired
							</h2>
							<h5 data-animation="fadeInUp" data-delay="400ms">Get Inspired at</h5>
							<a href="https://nil.yonsei.ac.kr/journal.html"
								class="btn uza-btn btn-2" data-animation="fadeInUp"
								data-delay="700ms">Start Exploring</a>
						</div>
					</div>
					<!-- Welcome Thumbnail -->
					<div class="col-12 col-md-8">
						<div class="welcome-thumbnail">
							<img id="home_img" alt="" data-animation="slideInRight"
								data-delay="400ms">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<hr />
<script>
	$.ajax({
		url : default_api_server + '/layout',
		success : function(data) {
			console.log(data);
			$('#home_img')[0].src = data.home_image;
		},
		dataType : 'json',
		async : false
	});
</script>
<?php
include_once (G5_PATH . '/tail.php');