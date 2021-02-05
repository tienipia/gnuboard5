<?php
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가

if (defined('G5_IS_ADMIN')) {
    ?>

<?php if ($is_admin == 'super') {  ?>
<!-- <div style='float:left; text-align:center;'>RUN TIME : <?php echo get_microtime()-$begin_time; ?><br></div> -->
<?php }  ?>

<!-- ie6,7에서 사이드뷰가 게시판 목록에서 아래 사이드뷰에 가려지는 현상 수정 -->
<!--[if lte IE 7]>
<script>
$(function() {
    var $sv_use = $(".sv_use");
    var count = $sv_use.length;

    $sv_use.each(function() {
        $(this).css("z-index", count);
        $(this).css("position", "relative");
        count = count - 1;
    });
});
</script>
<![endif]-->

<?php run_event('tail_sub'); ?>

</body>
</html>
<?php
} else {
    ?>
<footer class="footer-area">
	<div class="container">
		<div class="row justify-content-between">
			<!-- Single Footer Widget -->
			<div class="col-12 col-lg-9">
				<div class="single-footer-widget mb-80">
					<div class="footer-content mb-15">
						<p>
							jangyeon@yonsei.ac.kr<br>
						</p>
						<p>Yonsei University, 85, Songdogwahak-ro, Yeonsu-gu, Incheon
							21983, Korea</p>
						<h3>(+82)32-749-5916</h3>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-3">
				<div class="single-footer-widget mb-80">
					<div class="copywrite-text mb-15">
						<img
							src="https://sit.yonsei.ac.kr/_res/sit/img/common/logo_footer_new.gif">
					</div>

				</div>
			</div>

		</div>
	</div>
</footer>

<script src="<?php echo G5_JS_URL?>/uza.bundle.js"></script>

<?php run_event('tail_sub'); ?>
</body>

</html>


<?php
}

echo html_end(); // HTML 마지막 처리 함수 : 반드시 넣어주시기 바랍니다.