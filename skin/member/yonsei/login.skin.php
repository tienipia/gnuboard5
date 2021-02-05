<?php
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가

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
							<li class="breadcrumb-item active" aria-current="page">Login</li>
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
		<div class="row justify-content-between">
			<div class="col-12">
				<div class="uza-contact-form mb-80">
					<div class="contact-heading mb-50">
						<h4>회원 정보를 입력해주세요.</h4>
					</div>
					<form name="flogin" action="<?php echo $login_action_url ?>"
						onsubmit="return flogin_submit(this);" method="post">
						<input type="hidden" name="url" value="<?php echo $login_url ?>">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<input type="text" class="form-control mb-30" name="mb_id"
										id="login_id" required size="20" maxLength="20"
										placeholder="아이디">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<input type="password" class="form-control mb-30"
										name="mb_password" id="login_pw" required size="20"
										maxLength="20" placeholder="비밀번호">
								</div>
							</div>

							<div class="col-12">
								<button type="submit" class="btn uza-btn btn-3 mt-15">로그인</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<hr />

<script>
function flogin_submit(f)
{
    if( $( document.body ).triggerHandler( 'login_sumit', [f, 'flogin'] ) !== false ){
        return true;
    }
    return false;
}
</script>
<!-- } 로그인 끝 -->
