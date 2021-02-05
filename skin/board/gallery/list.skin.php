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
					<h2 class="title">Gallery</h2>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item "><a href="#"><i class="fa fa-home"></i>
									Board</a></li>
							<li class="breadcrumb-item active" aria-current="page">Gallery</li>
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
$sql = 'select wr_1 from ' . $g5['write_prefix'] . $bo_table . ' group by wr_1 order by wr_1 desc;';
$result = sql_query($sql);
$years = array();

while ($row = sql_fetch_array($result)) {
    array_push($years, $row['wr_1']);
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
    
    if ($list[$i]['wr_1'] != $years[$page])
        continue;
    $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], 640, 480, false, true);

    if (! $thumb['src']) {
        continue;
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
		<div class="col-lg-4 col-md-12 mb-4 ">
			<div class="img-thumbnail row h-100">
				<div class="col-md-12 my-auto">
					<div class="text-center">
						<a href="#"> 
						<?php
    ?>
        <img class="z-depth-1" src="<?php echo $thumb['src']?>"
							alt="<?php echo $thumb['alt']?>" data-toggle="modal"
							data-target="#modal<?php echo $i?>" />

						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modal<?php echo $i?>" tabindex="-1"
			role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
			<div class="modal-dialog modal-dialog-centered modal-lg"
				role="document">
				<div class="modal-content">

					<!-- <div class="modal-header justify-content-center">
						<h3><?php echo $list[$i]['wr_subject'];?></h3>
					</div> -->
					<div class="modal-body mb-0 p-0 text-center ">
						<img class="img-responsive" src="<?php echo $thumb['ori'];?>">
					</div><?php if($token) {?>
					<div class="modal-footer justify-content-center">
						<?php if($delete_href) {?>
						<a href="<?php echo $delete_href?>">삭제</a><?php  }?>
					</div><?php  }?>
				</div>
			</div>
		</div>
		<!-- Repeat -->
			

<?php } ?>
			</div>
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
