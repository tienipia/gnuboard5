<?php
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가
include_once (G5_LIB_PATH . '/thumbnail.lib.php');

$token = null;
?>
<div class="breadcrumb-area">
	<div class="container h-100">
		<div class="row h-100 align-items-end">
			<div class="col-12">
				<div class="breadcumb--con">
					<h2 class="title">Members</h2>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>
									Members</a></li>
							<li class="breadcrumb-item active" aria-current="page">Members</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<div class="about-bg-pattern">
		<img src="<?php echo G5_IMG_URL?>/curve-2.png" alt="">
	</div>
</div>
<!-- ****** Gallery Area Start ****** -->
<section class="uza-portfolio-area section-padding-40">
	<div class="container">
		<h2>Present</h2>
		<div class="row">
		<?php

for ($i = 0; $i < count($list); $i ++) {
    $update_href = $delete_href = '';
    if (($member['mb_id'] && ($member['mb_id'] === $list[$i]['mb_id'])) || $is_admin) {
        if (! $token) {
            set_session('ss_delete_token', $token = uniqid(time()));
        }
        $update_href = short_url_clean(G5_BBS_URL . '/write.php?w=u&amp;bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id']);
        $delete_href = G5_BBS_URL . '/delete.php?bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id'] . '&amp;token=' . $token;
    }

    ?>
		<?php if($list[$i]['ca_name'] !== 'Present') continue;?>
			<div class="col-12 col-sm-6 col-xl-4 my-2 ">
				<div class="row">
					<div class="col-6">
					<?php
    $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], 300, 400, false, true);

    if ($thumb['src']) {
        ?><img src="<?php echo $thumb['src']?>"
							alt="<?php echo $thumb['alt']?>" />
                                
                                <?php
    } else {
        ?>
                            
						<img class="rounded"
							src="https://mricr.com/wp-content/uploads/2015/09/placeholder-300x400.png"
							alt="">
                            <?php
    }
    ?>
					</div>
					<div class="col-6">
						<h4><?php echo$list[$i]['wr_subject']?></h4>
						<p><?php echo$list[$i]['wr_content']?></p>
						<?php if($update_href) {?>
						<a href="<?php echo $update_href?>">수정</a>
						<?php  }?>
						<?php if($delete_href) {?>
						<a href="<?php echo $delete_href?>">삭제</a><?php  }?>
					</div>
				</div>
			</div>
			<?php }?>
			
		</div>
	</div>
</section>

<!-- ****** Gallery Area Start ****** -->
<section class="uza-portfolio-area section-padding-80">
	<div class="container">
		<h2>Alumni</h2>
		<div class="row">

		<?php

for ($i = 0; $i < count($list); $i ++) {
    $update_href = $delete_href = '';
    if (($member['mb_id'] && ($member['mb_id'] === $list[$i]['mb_id'])) || $is_admin) {
        if (! $token) {
            set_session('ss_delete_token', $token = uniqid(time()));
        }
        $update_href = short_url_clean(G5_BBS_URL . '/write.php?w=u&amp;bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id']);
        $delete_href = G5_BBS_URL . '/delete.php?bo_table=' . $bo_table . '&amp;wr_id=' . $list[$i]['wr_id'] . '&amp;token=' . $token;
    }

    ?>
		
		<?php if($list[$i]['ca_name'] !== 'Alumni') continue;?>
			<div class="template col-12 col-sm-6 col-xl-4 my-2 ">
				<div class="row">
					<div class="col-6">
						<?php
    $thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], 300, 400, false, true);

    if ($thumb['src']) {
        ?><img src="<?php echo $thumb['src']?>"
							alt="<?php echo $thumb['alt']?>" />
                                
                                <?php
    } else {
        ?>
                            
						<img class="rounded"
							src="https://mricr.com/wp-content/uploads/2015/09/placeholder-300x400.png"
							alt="">
                            <?php
    }
    ?>
					</div>
					<div class="col-6">
						<h4><?php echo$list[$i]['wr_subject']?></h4>
						<p><?php echo$list[$i]['wr_content']?></p>
						<?php if($update_href) {?>
						<a href="<?php echo $update_href?>">수정</a>
						<?php  }?>
						<?php if($delete_href) {?>
						<a href="<?php echo $delete_href?>">삭제</a><?php  }?>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</section>

<?php  if ($token) {?>
<section class="uza-portfolio-area section-padding-80">
	<div class="container">
		<div class="col-12">
			<a class="btn uza-btn btn-3 mt-15"
				href="<?php echo G5_BBS_URL?>/write.php?bo_table=<?php echo $bo_table?>">생성하기</a>
		</div>

	</div>
</section>
<?php }?>
<hr />
<!-- ****** Gallery Area End ****** -->
