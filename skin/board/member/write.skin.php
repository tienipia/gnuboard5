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
							<li class="breadcrumb-item active" aria-current="page">Members</li>
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
					<div class="contact-heading mb-50">
						<h4>아래의 정보를 빠짐없이 기입해주세요.</h4>
					</div>
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
							type="hidden" id="wr_content" name="wr_content" value="">
						<div class="row">
												
							<?php if ($is_category) { ?>
							<div class="col-12">
								<div class="form-group">
									<select class="form-control mb-30" name="ca_name" rows="8"
										id="ca_name" name="ca_name" required cols="80"
										placeholder="상태"><option value="">상태를 선택하세요</option>
<?php echo $category_option ?>
										</select>
								</div>
							</div>
							<?php }?>
							<div class="col-6">
								<div class="form-group">
									<input type="text" class="form-control mb-30" id="wr_subject"
										name="wr_subject" required value="<?php echo $subject ?>"
										placeholder="한글 이름">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input type="text" class="form-control mb-30" name="wr_1"
										required value="<?php echo  $write['wr_1'] ?>"
										placeholder="영어 이름">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input type="text" class="form-control mb-30" name="wr_2"
										required value="<?php echo  $write['wr_2'] ?>"
										placeholder="과정 / 소속">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<input type="text" class="form-control mb-30" name="wr_3"
										required value="<?php echo  $write['wr_3'] ?>"
										placeholder="이메일">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<input type="text" class="form-control mb-30" name="wr_4"
										required value="<?php echo  $write['wr_4'] ?>"
										placeholder="재학 연도">
								</div>
							</div>
    <?php for ($i=0; $is_file && $i<$file_count; $i++) { ?>
							<div class="col-12">
								<div class="form-group">
									<label for="bf_file_<?php echo $i+1 ?>" class="lb_icon"><i
										class="fa fa-folder-open" aria-hidden="true"></i><span
										class="sound_only"> 이미지 선택</span></label> <input type="file" accept="image/*"
										name="bf_file[]" id="bf_file_<?php echo $i+1 ?>"
										title="이미지 <?php echo $i+1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능"
										class="frm_file ">
        <?php if($w == 'u' && $file[$i]['file']) { ?>
        <span class="file_del"> <input type="checkbox"
										id="bf_file_del<?php echo $i ?>"
										name="bf_file_del[<?php echo $i;  ?>]" value="1"> <label
										for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'].'('.$file[$i]['size'].')';  ?> 파일 삭제</label>
									</span>
        <?php } ?>
        
    </div>
							</div>
    <?php } ?>
							
							
							<div class="col-12">
								<button type="submit" class="btn uza-btn btn-3 mt-15">생성하기</button>
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
    	f.wr_content.value = '';

    	if(f.wr_1.value !== '-') {
    		f.wr_content.value += f.wr_1.value;
    		f.wr_content.value += '<br />';
    	} 

    	if(f.wr_3.value!== '-') {
    		f.wr_content.value += f.wr_3.value;
    		f.wr_content.value += '<br />';
    	} 

    	if(f.wr_4.value!== '-') {
    		f.wr_content.value += f.wr_4.value;
    		f.wr_content.value += '<br />';
    	} 

    	if(f.wr_2.value!== '-') {
    		f.wr_content.value += f.wr_2.value;
    	} 
    	
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
