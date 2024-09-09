<?php
	include('inc/head.php');
?>
	<main class="main-container" role="main">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-auto">
					<p><img src="https://www.thaiticketmajor.com/assets/img/logo-ttm-tm.png" width="136" /></p>
				</div>
				<div class="col-12">
					<div class="text-center">
						<h1>เปลี่ยนรหัสผ่าน</h1>
						<p class="text-muted">กรุณาใส่อีเมล์ของท่านด้านล่าง<br>ระบบจะส่งรหัสใหม่ให้ท่านทางอีเมล์</p>
					</div>
				</div>
				<div class="col-12">
					<form class="mt-3" id="form-reset-password" novalidate>
						<div class="form-group">
							<input type="email" class="form-control form-control-lg" placeholder="อีเมล" name="email" />
							<div class="text-alert"></div>
						</div>
						<div class="form-group text-center">
							<div class="box-recaptcha d-inline-block" id="RC_resetPassword"></div>
							<div class="text-alert invalid-recaptcha text-left"></div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-lg btn-primary" id="btn-submit">เปลี่ยนรหัสผ่าน</button>
						</div>
					</form>
					<div class="border-top my-4"></div>
					<p class="text-center">สำหรับผู้มีบัญชีแล้วกรุณา <a class="text-link font-med" href="sign-in.php">ลงชื่อเข้าใช้</a></p>
				</div>
			</div>
		</div>
	</main>
<?php include('inc/javascript.php'); ?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadRC" async defer></script>
<script>
	var RC_resetPassword;
	var onloadRC = function(){
		RC_resetPassword = grecaptcha.render('RC_resetPassword', {
    	'sitekey' : '6LeOyn0UAAAAAN02aY4koMP7zq7Ly7fMXCVuHmX9',
   	});
	};
	var form = '#form-reset-password';
	var $email = $(form+' [name="email"]');
	var button = $('#btn-submit');
	$(function(){
		$(form).on('submit',function(e){
			if($email.val() == 0){
				$app.form.check($email,msg.email);
				return false;
			} else if(!(emailCheck.test($email.val()))){
				$app.form.check($email,msg.email_invalid);
				return false;
			} else if(grecaptcha.getResponse(RC_resetPassword) == '' || grecaptcha.getResponse(RC_resetPassword) == undefined){
				$app.form.check($('.box-recaptcha'),msg.captcha);
				return false;
			} else {
				$app.form.clear(form);
				var formData = $(form).serialize();
				button.addClass('loading').attr('disabled','');
				$.post('https://booking.thaiticketmajor.com/tickets/forgot-password-process.php',formData,function(data){
	   	 		button.removeClass('loading').removeAttr('disabled');
	   	 		var data = $.parseJSON(data);
	   	 		if(data.result){
	         	$app.dialog.custom('success','เปลี่ยนรหัสผ่านสำเร็จ','ท่านจะได้รับรหัสผ่านใหม่ทางอีเมล์ของท่าน','ปิด');
	   	 		} else {
	   	 			if(data.message === 'not-found'){
	         		$app.dialog.custom('fail','ขออภัย','ไม่พบชื่อผู้ใช้นี้ในระบบ','ลองใหม่อีกครั้ง');
	         	} else {
	         		$app.dialog.custom('fail','ขออภัย','เกิดข้อผิดพลาดบางประการ <span class="text-nowrap">กรุณาลองใหม่อีกครั้ง</span>','ลองใหม่อีกครั้ง');
	         	}
	   	 		}
	      });
			}
			e.preventDefault();
		});
	});
</script>
<?php include('inc/footer.php'); ?>