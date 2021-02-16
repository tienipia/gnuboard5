<?php
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가
include_once (G5_LIB_PATH . '/thumbnail.lib.php');

$token = null;
if (($member['mb_id'] && ($member['mb_id'] === $list[$i]['mb_id'])) || $is_admin) {
    if (! $token) {
        set_session('ss_delete_token', $token = uniqid(time()));
    }
}
?>
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
	<div class="container h-100">
		<div class="row h-100 align-items-end">
			<div class="col-12">
				<div class="breadcumb--con">
					<h2 class="title">Journal</h2>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>
									Publication</a></li>
							<li class="breadcrumb-item active" aria-current="page">Journal</li>
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
<!-- ***** Portfolio Single Area Start ***** -->
<section class="uza-portfolio-single-area section-padding-40">
	<div class="container">
	<?php
$sql = 'select wr_2 from ' . $g5['write_prefix'] . $bo_table . ' group by wr_2 order by wr_2 desc;';
$result = sql_query($sql);
$years = array();

while ($row = sql_fetch_array($result)) {
    array_push($years, $row['wr_2']);
}

$sizey = count($years);
if ($page) {
    if ($page > $sizey) {
        $page = $sizey - 1;
    } else if ($page < 1) {
        $page = 0;
    } else {
        $page = $page - 1;
    }
} else {
    $page = 0;
}
?>
		<ul class="nav nav-tabs mb-50" role="tablist">
				<?php for($i = 0; $i < $sizey; $i++) {?>
			<li class="nav-item"><a
				class="nav-link <?php if($i==$page){?>active<?php }?>" role="tab"
				href="<?php echo G5_BBS_URL?>/board.php?bo_table=<?php echo $bo_table?>&page=<?php echo ($i+1)?>"
				onclick="tabmove(this);"><?php echo $years[$i]?></a></li>
<?php }?>
		</ul>
	</div>


	<div class="container">
		<div class="row">

		<?php

for ($i = 0; $i < count($list); $i ++) {
    if ($list[$i]['wr_2'] != $years[$page])
        continue;
    $update_href = $delete_href = '';
    if (($member['mb_id'] && ($member['mb_id'] === $list[$i]['mb_id'])) || $is_admin) {
        if (! $token) {
            set_session('ss_delete_token', $token = uniqid(time()));
        }
        $update_href = short_url_clean(G5_BBS_URL . '/write.php?w=u&amp;bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id']);
        $delete_href = G5_BBS_URL . '/delete.php?bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id'] . '&amp;token=' . $token;
    }
    $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], 720, 405, false, true);
    ?>

			<!-- Repeat -->
			<div class="col-12 ">
				<div class="row">
					<div class="col-12 ">
						<h4>[<?php echo$list[$i]['wr_1']?>] <?php echo$list[$i]['wr_subject']?></h4>
					</div>
					<div class="col-md-6 col-12 ">
						<a
							<?php if (isset($list[$i]['link']) && isset($list[$i]['link'][1])) {?>
							href="<?php echo $list[$i]['link'][1];?>" <?php }?>>
						<?php
    if ($thumb['src']) {
        ?><img class="img-thumbnail" src="<?php echo $thumb['src']?>"
							alt="<?php echo $thumb['alt']?>" />
                                
                                <?php
    } else {
        ?>
                            
						<img class="img-thumbnail"
						src="<?php echo G5_IMG_URL ?>/placeholder-1280x720.png"
							alt="">
                            <?php
    }
    ?>
						</a>
					</div>
					<div class="col-md-6 col-12 ">
						<h6>Author</h6>
						<p><?php echo$list[$i]['wr_3']?></p>
						<hr />
						<h6>Journal</h6>
						<p><?php echo$list[$i]['wr_4']?><br /><?php echo$list[$i]['wr_5']?></p>
						<hr />
						<h6>Vol / Page / Year</h6>
						<p><?php echo$list[$i]['wr_6']?> / <?php echo$list[$i]['wr_7']?> / <?php echo$list[$i]['wr_2']?></p>
											
						<?php
    if (isset($list[$i]['link']) && isset($list[$i]['link'][2])) {
        ?>
						<div>
							<div class="float-right">
								<a href="<?php echo$list[$i]['link'][2];?>">
									<h6>Download PDF</h6>
								</a>
							</div>
							<div class="clear-fix"></div>
						</div>
					</div>
					<?php }?>

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
							
							
							
				</div>
				<hr />
			</div>
			<!-- Repeat -->
			<?php }?>
			
			
	<?php  if ($token) {?>
			<div class="col-12">
				<div class="text-center">
					<a class="btn uza-btn btn-3 mt-40 mb-40"
						href="<?php echo G5_BBS_URL?>/write.php?bo_table=<?php echo $bo_table?>">추가하기</a>
				</div>
			</div>

<?php }?>
		</div>
	</div>



</section>


<hr />
<!-- ****** Gallery Area End ****** -->
