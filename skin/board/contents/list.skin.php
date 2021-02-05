<?php
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가

$token = null;
if ($is_admin) {
    if (! $token) {
        set_session('ss_delete_token', $token = uniqid(time()));
    }
} else {
    ?>
<script>location.replace("<?php echo G5_URL?>");</script>
<?php
    exit();
}
?>

<div class="breadcrumb-area">
	<div class="container h-100">
		<div class="row h-100 align-items-end">
			<div class="col-12">
				<div class="breadcumb--con">
					<h2 class="title">Research</h2>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item "><a href="#"><i class="fa fa-home"></i>
									Research</a></li>
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
    $update_href = $delete_href = '';
    if ($is_admin) {
        if (! $token) {
            set_session('ss_delete_token', $token = uniqid(time()));
        }
        $update_href = short_url_clean(G5_BBS_URL . '/write.php?w=u&amp;bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id']);
        $delete_href = G5_BBS_URL . '/delete.php?bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id'] . '&amp;token=' . $token;
    }
    ?>
<!-- Repeat -->
			<div class="template col-12">
				<div class="portfolio-details-text" style="margin: 15px !important;">
					<h2><?php echo $list[$i]['wr_subject']?></h2>
					<p><?php echo $list[$i]['wr_content']?></p>
				</div>
			</div>
			<!-- Repeat -->
<?php if($update_href||$delete_href) {?>
					<div class="col-12 ">

				<div class="float-right">
						<?php if($update_href) {?>
						<a href="<?php echo $update_href?>">수정</a>
						<?php  }?>
						<?php if($delete_href) {?>
						<a href="<?php echo $delete_href?>">삭제</a><?php  }?>
						
							</div>
				<div class="clear-fix"></div>
			</div>
							<?php  }?>
			
			
			
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
