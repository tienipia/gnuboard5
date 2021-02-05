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
					<h2 class="title">Notice</h2>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item "><a href="#"><i class="fa fa-home"></i>
									Board</a></li>
							<li class="breadcrumb-item active" aria-current="page">Notice</li>
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
		<?php

for ($i = 0; $i < $board['bo_page_rows']; $i ++) {

    $title = "&nbsp;";
    $datetime = "&nbsp;";
    $wr_hit = "&nbsp;";
    $wr_id = null;
    if ($list[$i]) {
        $title = $list[$i]['wr_subject'];
        $datetime = $list[$i]['datetime'];
        $wr_hit = $list[$i]['wr_hit'];
        $wr_id = $list[$i]['wr_id'];
    }
    ?>
<!-- Repeat -->
		<hr class="mt-0" />
		<div class="col-12">
			<div class="row" <?php if($wr_id) { ?>
				onclick="location.href='<?php echo G5_BBS_URL?>/board.php?bo_table=notice&wr_id=<?php echo $wr_id?>'"
				style="cursor: pointer" <?php }?>>
				<div class="col-9">
					<h6><?php echo $title?></h6>
				</div>

				<div class="col-2 text-right">
					<p><?php echo $datetime?></p>
				</div>
				<div class="col-1 text-center">
					<p><?php echo $wr_hit?></p>
				</div>
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
