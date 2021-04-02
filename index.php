<?php
include_once ('./_common.php');

define('_INDEX_', true);
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가

include_once (G5_PATH . '/head.php');

$result = sql_query('select * from ' . $g5['write_prefix'] . 'gallery where wr_2 = 1;');
$images = array();

while ($row = sql_fetch_array($result)) {
    $bf_image = sql_query('select * from g5_board_file where wr_id = "' . $row['wr_id'] . '" and bo_table = "gallery" ;');
    if ($bf_result = sql_fetch_array($bf_image)) {
        array_push($images, G5_URL . '/data/file/gallery/' . $bf_result['bf_file']);
    }
}
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
							<a href="https://nil.yonsei.ac.kr/bbs/board.php?bo_table=journal"
								class="btn uza-btn btn-2" data-animation="fadeInUp"
								data-delay="700ms">Start Exploring</a>
						</div>
					</div>
					<!-- Welcome Thumbnail -->
					<div class="col-12 col-md-8">
						<div class="welcome-thumbnail">
							<img id="home_img" alt="">
<?php if (defined('G5_IS_ADMIN')) {?>
<a href="https://nil.yonsei.ac.kr/bbs/write.php?bo_table=gallery&is_home=true">사진 추가</a>
<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<hr />
<script>
	var images = [<?php for($i = 0; $i < count($images); $i++) { if($i != 0) {echo ',';} echo '"'.$images[$i].'"'; } ?>];
	$('#home_img')[0].src = images[0];
var imgidx = 0;

function changeImage() {
	console.log('asdf');
	if( imgidx >= images.length) {
		imgidx = 0;
	}
	$('#home_img').fadeOut(500, function() {
		console.log(images, imgidx);
		$('#home_img')[0].src = images[imgidx];
		$('#home_img').fadeIn(250);
		imgidx++;
		});
}

if(images.length > 1)
	setInterval(changeImage, 3000);

</script>

<?php
include_once (G5_PATH . '/tail.php');