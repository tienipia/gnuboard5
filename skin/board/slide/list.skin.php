<?php
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가

$token = null;
if (($member['mb_id'] && ($member['mb_id'] === $list[$i]['mb_id'])) || $is_admin) {
    if (! $token) {
        set_session('ss_delete_token', $token = uniqid(time()));
    }
}
?>
<div class="breadcrumb-area">
	<div class="container h-100">
		<div class="row h-100 align-items-end">
			<div class="col-12">
				<div class="breadcumb--con">
					<h2 class="title"><?php echo $board['bo_2_subj']?></h2>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item "><a href="#"><i class="fa fa-home"></i>
									<?php echo $board['bo_2_subj']?></a></li>
							<li class="breadcrumb-item active" aria-current="page">Overview</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<!-- Background Curve -->
	<div class="breadcrumb-bg-curve">
		<img src="<?php echo G5_IMG_URL?>/curve-5.png" alt="">
	</div>
</div>
<!-- ***** Breadcrumb Area End ***** -->

<!-- ***** Portfolio Single Area Start ***** -->
<section class="uza-portfolio-single-area section-padding-40">
	<div class="container">
		<div class="row justify-content-between align-items-end">

		<?php

for ($i = 0; $i < count($list); $i ++) {
    $file = get_file($board['bo_table'], $list[$i]['wr_id']);

    $furl = '';
    if ($file['count']) {
        if ($file[0]) {
            $furl = $file[0]['path'] . '/' . $file[0]['file'];
        }
    }
    $update_href = $delete_href = '';
    if (($member['mb_id'] && ($member['mb_id'] === $list[$i]['mb_id'])) || $is_admin) {
        if (! $token) {
            set_session('ss_delete_token', $token = uniqid(time()));
        }
        $update_href = short_url_clean(G5_BBS_URL . '/write.php?w=u&amp;bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id']);
        $delete_href = G5_BBS_URL . '/delete.php?bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id'] . '&amp;token=' . $token;
    }
    ?>
<!-- Repeat -->
			<div
				class="<?php if( $board['bo_3_subj']) {echo  $board['bo_3_subj'];}else {?>col-12<?php }?>">
				<h3><?php if( $board['bo_3_subj']) { echo$list[$i]['wr_subject'];}?></h3>
				<img src="<?php echo $furl;?>" style="width: 100%"
					alt="<?php echo$list[$i]['wr_subject']?>" />
				<div class="portfolio-details-text" style="margin: 15px !important;">
				<?php if($update_href||$delete_href) {?>

				<div class="float-right">
						<?php if($update_href) {?>
						<a href="<?php echo $update_href?>">수정</a>
						<?php  }?>
						<?php if($delete_href) {?>
						<a href="<?php echo $delete_href?>">삭제</a><?php  }?>
						
							</div>
					<div class="clear-fix"></div>
							<?php  }?>
				
				</div>
			</div>
			<!-- Repeat -->
			

			
			
			
<?php } ?>

			
			<?php  if ($token) {?>
	<div class="container">
				<div class="col-12">
					<div class="text-center">
						<a class="btn uza-btn btn-3 mt-30 mb-30"
							href="<?php echo G5_BBS_URL?>/write.php?bo_table=<?php echo $bo_table?>">추가하기</a>
					</div>
				</div>

			</div>
<?php }?>
		</div>
	</div>

</section>
<!-- ***** Portfolio Single Area End ***** -->
<hr />

<!-- ****** Gallery Area End ****** -->
