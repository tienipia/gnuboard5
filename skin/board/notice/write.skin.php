<?php
if (! defined('_GNUBOARD_'))
    exit(); // 개별 페이지 접근 불가

?>
<style>
.cke_sc {
	display: none !important;
}

.sound_only {
	display: inline-block !important;
	position: absolute;
	top: 0;
	left: 0;
	margin: 0 !important;
	padding: 0 !important;
	font-size: 0;
	line-height: 0;
	border: 0 !important;
	overflow: hidden !important
}
</style>
<div class="breadcrumb-area">
	<div class="container h-100">
		<div class="row h-100 align-items-end">
			<div class="col-12">
				<div class="breadcumb--con">
					<h2 class="title">Notice</h2>
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

	<div class="about-bg-pattern">
		<img src="./img/curve-2.png" alt="">
	</div>
</div>

<!-- ****** Gallery Area Start ****** -->
<section class="uza-portfolio-area section-padding-40">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-12">
				<div class="uza-contact-form mb-80">
					<form name="fwrite" id="fwrite" action="<?php echo $action_url ?>"
						onsubmit="return fwrite_submit(this);" method="post"
						enctype="multipart/form-data" autocomplete="off">
						<input type="hidden" name="uid"
							value="<?php echo get_uniqid(); ?>"> <input type="hidden"
							name="w" value="<?php echo $w ?>"> <input type="hidden"
							name="bo_table" value="<?php echo $bo_table ?>"> <input
							type="hidden" name="wr_id" value="<?php echo $wr_id ?>"> <input
							type="hidden" name="sca" value="<?php echo $sca ?>"> <input
							type="hidden" name="sfl" value="<?php echo $sfl ?>"> <input
							type="hidden" name="stx" value="<?php echo $stx ?>"> <input
							type="hidden" name="spt" value="<?php echo $spt ?>"> <input
							type="hidden" name="sst" value="<?php echo $sst ?>"> <input
							type="hidden" name="sod" value="<?php echo $sod ?>"> <input
							type="hidden" name="page" value="<?php echo $page ?>"> <input
							type="hidden" value="html1" name="html">
						<div class="row">


							<div class="col-12">
								<div class="form-group">
									<input type="text" class="form-control mb-30" id="wr_subject"
										name="wr_subject" required value="<?php echo $subject ?>"
										placeholder="title">
								</div>
							</div>
							<div class="col-12">
								<div
									class="wr_content <?php echo $is_dhtml_editor ? $config['cf_editor'] : ''; ?>">
            <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
        </div>

							</div>


	<div class="col-12 text-center">
				<button type="submit" class="btn uza-btn btn-3 mt-30 mb-15">생성하기</button>
			</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		    <?php if ($is_use_captcha) { //자동등록방지  ?>
    <div class="write_div">
        <?php echo $captcha_html ?>
    </div>
    <?php } ?>
	</div>
</section>
<hr />
<!-- ****** Gallery Area End ****** -->

<script>
    <?php if($write_min || $write_max) { ?>
    // 글자수 제한
    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
    check_byte("wr_content", "char_count");

    $(function() {
        $("#wr_content").on("keyup", function() {
            check_byte("wr_content", "char_count");
        });
    });

    <?php } ?>
    function html_auto_br(obj)
    {
        if (obj.checked) {
            result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
            if (result)
                obj.value = "html2";
            else
                obj.value = "html1";
        }
        else
            obj.value = "";
    }

    function fwrite_submit(f)
    {
        <?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함   ?>

        var subject = "";
        var content = "";
        $.ajax({
            url: g5_bbs_url+"/ajax.filter.php",
            type: "POST",
            data: {
                "subject": f.wr_subject.value,
                "content": f.wr_content.value
            },
            dataType: "json",
            async: false,
            cache: false,
            success: function(data, textStatus) {
                subject = data.subject;
                content = data.content;
            }
        });

        if (subject) {
            alert("제목에 금지단어('"+subject+"')가 포함되어있습니다");
            f.wr_subject.focus();
            return false;
        }

        if (content) {
            alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
            if (typeof(ed_wr_content) != "undefined")
                ed_wr_content.returnFalse();
            else
                f.wr_content.focus();
            return false;
        }

        if (document.getElementById("char_count")) {
            if (char_min > 0 || char_max > 0) {
                var cnt = parseInt(check_byte("wr_content", "char_count"));
                if (char_min > 0 && char_min > cnt) {
                    alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                    return false;
                }
                else if (char_max > 0 && char_max < cnt) {
                    alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                    return false;
                }
            }
        }

        <?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함  ?>

        document.getElementById("btn_submit").disabled = "disabled";

        return true;
    }
    </script>
