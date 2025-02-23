<?php
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가

$contact = '&nbsp;';
$education = '&nbsp;';
$career = '&nbsp;';

$result = sql_query('select * from ' . $g5['write_prefix'] . 'contents where wr_seo_title = "contact"');
if ($row = sql_fetch_array($result)) {
    $contact = $row['wr_content'];
}

$result = sql_query('select * from ' . $g5['write_prefix'] . 'contents where wr_seo_title = "education"');
if ($row = sql_fetch_array($result)) {
    $education = $row['wr_content'];
}

$result = sql_query('select * from ' . $g5['write_prefix'] . 'contents where wr_seo_title = "career"');
if ($row = sql_fetch_array($result)) {
    $career = $row['wr_content'];
}

$result = sql_query('select * from ' . $g5['write_prefix'] . 'member where wr_id = 24');
if ($row = sql_fetch_array($result)) {
    $thumb = get_list_thumbnail('member', $row['wr_id'], 480, 640, false, true);
}
// $co_id
// $str;

$mdf = ($member['mb_level'] >= 10);

?>
<div class="breadcrumb-area">
	<div class="container h-100">
		<div class="row h-100 align-items-end">
			<div class="col-12">
				<div class="breadcumb--con">
					<h2 class="title">Professor</h2>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>
									Members</a></li>
							<li class="breadcrumb-item active" aria-current="page">Professor</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<!-- Background Curve -->
	<div class="breadcrumb-bg-curve">
		<img src="./img/core-img/curve-5.png" alt="">
	</div>
</div>


<!-- ***** About Us Area Start ***** -->
<section class="uza-about-us-area section-padding-40">
	<div class="container">
		<div class="row align-items-center">
			<!-- About Thumbnail -->
			<div class="col-12 col-lg-6">
				<div class="about-us-thumbnail mb-80">
					<img src="<?php echo $thumb['ori']?>" class="img-thumbnail" alt="">
					<?php if($mdf){?><hr /><a href="https://nil.yonsei.ac.kr/bbs/write.php?w=u&bo_table=member&wr_id=24">사진-이름 수정</a><?php }?>

				</div>
			</div>

			<!-- About Us Content -->
			<div class="col-12 col-lg-6">
				<div class="section-heading mb-5">
					<h2><?php echo $row['wr_1'];?></h2>
				</div>

				<div class="about-us-content mb-80">
					<div class="about-tab-area">
						<ul class="nav nav-tabs mb-50" id="mona_modelTab" role="tablist">
							<li class="nav-item"><a class="nav-link active" id="tab1"
								data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
								aria-selected="true">Contact</a></li>
							<li class="nav-item"><a class="nav-link" id="tab2"
								data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
								aria-selected="false">Education</a></li>
							<li class="nav-item"><a class="nav-link" id="tab3"
								data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
								aria-selected="false">Career</a></li>
						</ul>
					</div>

					<!-- Mona Tab Content -->
					<div class="about-tab-content">
						<div class="tab-content" id="mona_modelTabContent">
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel"
								aria-labelledby="tab1">
								<!-- Tab Content Text -->
								<div class="tab-content-text"><?php echo $contact?><?php if($mdf){?><hr /><a href="https://nil.yonsei.ac.kr/bbs/write.php?w=u&bo_table=contents&wr_id=3">수정</a><?php }?></div>
							</div>


							<div class="tab-pane fade" id="tab-2" role="tabpanel"
								aria-labelledby="tab2">
								<!-- Tab Content Text -->
								<div class="tab-content-text"><?php echo $education?><?php if($mdf){?><hr /><a href="https://nil.yonsei.ac.kr/bbs/write.php?w=u&bo_table=contents&wr_id=4">수정</a><?php }?></div>
							</div>

							<div class="tab-pane fade" id="tab-3" role="tabpanel"
								aria-labelledby="tab3">
								<!-- Tab Content Text -->
								<div class="tab-content-text"><?php echo $career?><?php if($mdf){?><hr /><a href="https://nil.yonsei.ac.kr/bbs/write.php?w=u&bo_table=contents&wr_id=5">수정</a><?php }?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="about-bg-pattern">
		<img src="./img/core-img/curve-2.png" alt="">
	</div>
	<hr />
</section>
