<?php include('inc/head.php'); ?>
	<main class="main-container" role="main">
	<?php include('inc/header.php'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<hgroup class="hgroup">
					<div class="step-start">
						<h1>ตรวจสอบอีเมล</h1>
						<p class="text-muted">กรุณาตรวจสอบว่านี่เป็นอีเมลของท่านหรือไม่</p>
					</div>
					<div class="step-verify" style="display: none;">
						<h1>ยืนยันอีเมล</h1>
						<p class="text-muted">กรุณากรอกรหัส 6 หลัก ที่ส่งไปยังอีเมล<br><span class="text-dark font-med" data-email="email"></span></p>
					</div>
				</hgroup>
			</div>
			<div class="col-12 col-md-6 col-xl-4">
				<form class="mt-3" id="form-verify" novalidate autocomplete="off">
					<div class="step-start">
						<div class="row">
							<div class="col">
								<label class="pl-2h">ชื่อผู้ใช้ (อีเมล) <small class="text-red">*</small></label>
							</div>
							<div class="col-auto">
								<a href="javascript:;" class="d-inline-block text-link text-primary pr-2h" onclick="$app.verifyEmail.editEmail();">แก้ไข</a>
							</div>
						</div>
						<div class="form-group">
							<input type="email" class="form-control form-control-lg" placeholder="" name="mbLogin" autocomplete="off" value="johndoe@mail.com" readonly />
							<div class="text-alert"></div>
						</div>
						<p>
							<button type="button" class="btn btn-block btn-lg btn-primary" onclick="$app.verifyEmail.submitEmail();">ยืนยันอีเมล</button>
						</p>
					</div>
					<div class="step-verify" style="display: none;">
						<div class="row">
							<?php for ($i=0; $i < 6 ; $i++) { ?>
								<div class="col">
									<input class="form-control form-control-verify" type="number" min="0" max="9" maxlength="1" name="otp<?php echo $i+1; ?>" onkeyup="$app.verifyEmail.OTPcheck(<?php echo $i+1; ?>);" data-index="<?php echo $i+1; ?>" required>
								</div>
							<?php } ?>
							<div class="col-12">
								<p class="text-alert text-center mt-3 mb-0" id="text-alert-otp">กรุณากรอกรหัสให้ครบถ้วน</p>
							</div>
						</div>
						<p class="mt-4">
							<button id="btn-verify" type="button" class="btn btn-block btn-lg btn-primary" onclick="$app.verifyEmail.verifyAccount();">ยืนยันรหัส<span class="countdown-btn ml-2">(60s)</span></button>
						</p>
						<p class="text-center" id="btn-resend-otp" style="display: none;">ไม่ได้รับรหัส? <a class="text-red text-link font-med" href="javascript:;" onclick="$app.verifyEmail.OTPresend();">ส่งอีกครั้ง</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
<?php include('inc/javascript.php'); ?>
<script>
	var form = '#form-verify';
	var $email = $(form+' [name="mbLogin"]');
	var button_submit = $('#btn-submit');
	var button_verify = $('#btn-verify');
	$app.verifyEmail = {
		init : function(){

		},
		editEmail : function(){
			$email.removeAttr('readonly').focus();
		},
		submitEmail : function(){
			if($email.val() == 0){
				$app.form.check($email,msg.email);
				return false;
			} else if(!(emailCheck.test($email.val()))){
				$app.form.check($email,msg.email_invalid);
				return false;
			} else {
				button_submit.addClass('loading').attr('disabled','');
				$.ajaxSetup({xhrFields: {withCredentials: true}});
				$.post('https://booking.thaiticketmajor.com/register/checkemail.php',{email:$email.val()},function(data){
					button_submit.removeClass('loading').removeAttr('disabled');
					if(data){
						$app.form.check($email,msg.email_duplicate);
					} else {
						$('[data-email="email"]').html($email.val());
						$app.verifyEmail.OTPverify();
					}
				});
			}
		},
		OTPcheck : function(index){
			var $elm = $('.form-control-verify[data-index="'+index+'"]');
			var $val = $elm.val();
			if($val == ""){
				$elm.removeClass('is-right').addClass('is-wrong');
			} else {
				$elm.removeClass('is-wrong').addClass('is-right');
				if($val.length > 1){
					$elm.val("");
				} else {
					if(index < 6){
						$('.form-control-verify[data-index="'+(index+1)+'"]').val("").focus();
					} else {
						button_verify.focus();
					}
				}
			}
		},
		OTPverify : function(){
			$.ajaxSetup({xhrFields: {withCredentials: true}});
	    $.post('_demo/process-verify.php',{email:$email.val()},function(data){
	    	var result = $.parseJSON(data).result;
	    	button_submit.removeClass('loading').removeAttr('disabled');
       	if(result){
       		$('.step-start').hide();
       		$('.step-verify').show();
       		$app.verifyEmail.OTPcountdown();
       	} else {
       		$app.dialog.custom('fail','ขออภัย','เกิดข้อผิดพลาดบางประการ <span class="text-nowrap">กรุณาลองใหม่อีกครั้ง</span>','ลองใหม่อีกครั้ง');
       	}
  		});
		},
		OTPcountdown : function(){
			// countdown
			var countdownTimer;
			var timeLeft = 60;
			var countdownElement = $('.countdown-btn');
			clearInterval(countdownTimer);
			countdownTimer = setInterval(() => {
		    if (timeLeft <= 0) {
		      clearInterval(countdownTimer);
		      countdownElement.html("(0s)");
		      button_verify.attr('disabled','');
		      $('#btn-resend-otp').show();
		    } else {
		      countdownElement.html("(" + timeLeft + "s)");
		      timeLeft--;
		    }
			}, 1000);
		},
		OTPresend : function(){
			button_verify.removeAttr('disabled');
			$('#btn-resend-otp').hide();
			$app.verifyEmail.OTPcountdown();
		},
		verifyAccount : function(){
			if($('[name="otp1"]').val() == "" || $('[name="otp2"]').val() == "" || $('[name="otp3"]').val() == "" || $('[name="otp4"]').val() == "" || $('[name="otp5"]').val() == "" || $('[name="otp6"]').val() == ""){
				var emptyCode = $('.form-control-verify').filter(function() { return $(this).val() == ""; });
		    emptyCode.each(function() {
		      $(this).addClass('is-wrong');
		    });
				$('#text-alert-otp').show();
			} else {
				// clear alert OTP
				$('.form-control-verify').removeClass('is-wrong').addClass('is-right');
				$('#text-alert-otp').hide();
				// submit signup
				var formData = $(form).serialize();
				button_verify.addClass('loading').attr('disabled','');
				$.post('_demo/process-signup.php',formData,function(data){
		    	var result = $.parseJSON(data).result;
		    	button_verify.removeClass('loading').removeAttr('disabled');
	       	if(result){
	         	//$(form)[0].reset();
	         	window.location = 'verified.php'
	       	} else {
	       		$app.dialog.custom('retry','ขออภัย','เกิดข้อผิดพลาดบางประการ หรือ รหัสไม่ถูกต้อง<br><span class="text-dark fotn-med d-inline-block mt-2">กรุณาตรวจสอบรหัสจากอีเมลล่าสุด หรือ<br>กด "ส่งอีกครั้ง" หลังตัวนับเวลาจบลง</span>','ลองใหม่อีกครั้ง');
	       	}
	  		});
			}
		}
	};
</script>
<?php include('inc/footer.php'); ?>