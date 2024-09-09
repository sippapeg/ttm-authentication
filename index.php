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
						<h1>ลงชื่อเข้าใช้</h1>
						<p class="text-muted">สำหรับผู้ที่มีบัญชี THAITICKETMAJOR แล้ว</p>
					</div>
				</div>
				<div class="col-12">
					<form class="mt-3" id="form-signin" novalidate>
						<div class="form-group">
							<input type="email" class="form-control form-control-lg" placeholder="ชื่อผู้ใช้ (อีเมล)" name="username" />
							<div class="text-alert"></div>
						</div>
						<div class="form-group">
							<input type="password" class="form-control form-control-lg" placeholder="รหัสผ่าน" name="password" />
							<div class="text-alert">กรุณาใส่รหัสผ่าน</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-lg btn-primary" id="btn-submit">เชื่อมโยงบัญชี</button>
						</div>
						<input type="hidden" name="redir" id="redir" value="link-account.php">
					</form>
					<p class="text-center"><a class="text-muted" href="reset-password.php">ลืมรหัสผ่าน</a></p>
					<div class="border-top my-3"></div>
					<p class="text-center">สำหรับผู้ใช้ใหม่กรุณา <a class="text-link font-med" href="sign-up.php">สร้างบัญชี</a></p>
				</div>
			</div>
		</div>
	</main>
<?php include('inc/javascript.php'); ?>
<script>
	var form = '#form-signin';
	var $email = $(form+' [name="username"]');
	var $password = $(form+' [name="password"]');
	var button = $('#btn-submit');
	$(function(){
		$(form).on('submit',function(e){
			if($email.val() == 0){
				$app.form.check($email,msg.email);
				return false;
			} else if(!(emailCheck.test($email.val()))){
				$app.form.check($email,msg.email_invalid);
				return false;
			} else if($password.val() == 0){
				$app.form.check($password,msg.password);
				return false;
			} else {
				$app.form.clear(form);
				button.addClass('loading').attr('disabled','');
				var formData = $(form).serialize();
				$.ajaxSetup({
				 xhrFields: {
				  withCredentials: true
				 }
				});
				$.post('https://booking.thaiticketmajor.com/inc/check_user_signin.php',formData,function(data){
					button.removeClass('loading').removeAttr('disabled');
					var data = $.parseJSON(data);
					if(data.result){
						window.location = data.url;
					} else {
						$app.form.check($password,msg.signin_fail);
						$email.addClass('is-invalid');
					}
				});
			}
			e.preventDefault();
		});
	});
</script>
<?php include('inc/footer.php'); ?>