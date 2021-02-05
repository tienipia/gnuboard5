<?php
if (! defined("_GNUBOARD_"))
    exit();

?>
<!-- ***** Breadcrumb Area Start ***** -->
<div class="breadcrumb-area">
	<div class="container h-100">
		<div class="row h-100 align-items-end">
			<div class="col-12">
				<div class="breadcumb--con">
					<h2 class="title"><?php echo $view['subject'];?></h2>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i>
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
		<img src="./img/curve-5.png" alt="">
	</div>
</div>
<!-- ***** Breadcrumb Area End ***** -->

<!-- ***** Portfolio Single Area Start ***** -->
<section class="uza-portfolio-single-area section-padding-40">
	<div class="container">
		<div class="row">
			<div class="col-12">
			<?php echo $view['content'];?>
			
			</div>
			<?php if($update_href||$delete_href) {?>
					<div class="col-12 ">

				<div class="float-right">
						<?php if($update_href) {?>
						<a href="<?php echo $update_href?>">수정</a>
						<?php  }?>
						<?php if($delete_href) {?>
						<a href="<?php echo $delete_href?>">삭제</a>
						<?php  }?>
							</div>
				<div class="clear-fix"></div>
			</div>
							<?php  }?>
			
		</div>
	</div>
</section>
<!-- ***** Portfolio Single Area End ***** -->

<hr />