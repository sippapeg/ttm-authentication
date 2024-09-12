<?php include('inc/head.php'); ?>
	<main class="main-container" role="main">
		<?php include('inc/header.php'); ?>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="text-center">
						<h1>เปลี่ยนรหัสผ่าน</h1>
						<p class="text-muted">กรุณาใส่อีเมลของท่านด้านล่าง<br>ระบบจะส่งรหัสใหม่ให้ท่านทางอีเมล</p>
					</div>
				</div>
				<div class="ol-12 col-md-6 col-xl-4">
					<form class="mt-3" id="form-reset-password" novalidate>
						<div class="form-group">
							<input type="email" class="form-control form-control-lg" placeholder="อีเมล" name="email" />
							<div class="text-alert"></div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-block btn-lg btn-primary" id="btn-submit">เปลี่ยนรหัสผ่าน</button>
						</div>
					</form>
					<div class="border-top my-4"></div>
					<p class="text-center">สำหรับผู้มีบัญชีแล้วกรุณา <a class="text-red text-link font-med" href="index.php">เข้าสู่ระบบ</a></p>
				</div>
			</div>
		</div>
	</main>
<?php include('inc/javascript.php'); ?>
<script>
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