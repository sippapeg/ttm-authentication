<?php include('inc/head.php'); ?>
	<main class="main-container" role="main">
		<?php include('inc/header.php'); ?>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<hgroup class="hgroup">
						<h1>ลงชื่อเข้าใช้</h1>
						<p class="text-muted">สำหรับผู้ที่มีบัญชี THAITICKETMAJOR แล้ว</p>
					</hgroup>
				</div>
				<div class="col-12 col-md-6 col-xl-4">
					<form class="mt-3" id="form-signin" novalidate>
						<div class="form-group">
							<input type="email" class="form-control form-control-lg" placeholder="ชื่อผู้ใช้ (อีเมล)" name="username" autocomplete="username" />
							<div class="text-alert"></div>
						</div>
						<div class="form-group">
							<input type="password" class="form-control form-control-lg" placeholder="รหัสผ่าน" name="password" autocomplete="current-password" />
							<div class="text-alert"></div>
						</div>
						<div class="form-group px-2h">
							<div class="form-row">
								<div class="col">
									<div class="custom-control custom-checkbox">
									  <input type="checkbox" class="custom-control-input" id="toggleShowPassword" tabIndex="-1" />
									  <label class="custom-control-label font-reg" for="toggleShowPassword">แสดงรหัสผ่าน</label>
									</div>
								</div>
								<div class="col-auto">
									<span><a class="text-link text-muted" href="reset-password.php">ลืมรหัสผ่าน</a></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-lg btn-primary" id="btn-submit">เข้าสู่ระบบ</button>
						</div>
						<input type="hidden" name="redir" id="redir" value="https://www.thaiticketmajor.com/index.html">
					</form>
					<div class="border-top my-4 text-float"><span class="text-muted">หรือ</span></div>
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-lg btn-border"><span class="font-normal"><img width="20" src="assets/img/icon/google.svg" class="mr-3">เข้าสู่ระบบด้วย Google</span></button>
					</div>
					<p class="text-center mt-4">สำหรับผู้ใช้ใหม่ <a class="text-link text-red font-med" href="sign-up.php">กรุณาสมัครสมาชิก</a></p>
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
	// Show password
	$('#toggleShowPassword').on('change',function(){
		if($(this).is(':checked')){
			$(form+' [type="password"]').attr('type','text');
		} else {
			$(form+' [type="text"]').attr('type','password');
		}
	});
</script>
<?php include('inc/footer.php'); ?>