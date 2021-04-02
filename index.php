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
							<div id="image_list"></div>
							
<?php if ($is_member) {?>
<a
								href="https://nil.yonsei.ac.kr/bbs/write.php?bo_table=gallery&is_home=true">사진
								추가</a>
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
	var image_doms = [];
	for(var i = 0 ;i < images.length; i++) {
		var img = document.createElement('img');
		img.src = images[i];
		img.style.display = 'none';
		image_doms.push(img);
		document.getElementById("image_list").appendChild(img);
	}
	var imgidx = 0;

function changeImage() {
	$(image_doms[imgidx]).fadeOut(500, function() {
		$(image_doms[imgidx]).css('display', 'none');
		console.log(image_doms[imgidx]);
		imgidx++;
		if (imgidx >= image_doms.length) {
			imgidx = 0;
		}
		$(image_doms[imgidx]).fadeIn(250);
	});
}

image_doms[0].style.display = 'block';
if(images.length > 1) {
	setInterval(changeImage, 3000);
}
	

</script>


<?php
include_once (G5_PATH . '/tail.php');