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
						<h1>สร้างบัญชี</h1>
						<p class="text-muted">กรุณาใส่ข้อมูลให้ครบถ้วน</p>
					</div>
				</div>
				<div class="col-12">
					<form class="mt-3" id="form-signup" novalidate>
						<div class="step-1">
							<div class="form-group">
								<input type="tel" class="form-control" placeholder="เบอร์โทรศัพท์" name="telephone" />
								<div class="text-alert"></div>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" placeholder="ชื่อผู้ใช้(อีเมล)" name="mbLogin" autocomplete="off" />
								<div class="text-alert"></div>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="รหัสผ่าน (ต้องมี 8-16 ตัวอักษร)" name="mbPasswd" maxlength="16" autocomplete="off" />
								<div class="text-alert"></div>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="ยืนยันรหัสผ่าน" name="mbPasswdC" maxlength="16" autocomplete="off" />
								<div class="text-alert"></div>
							</div>
							<div class="form-group px-2h">
								<div class="custom-control custom-checkbox">
								  <input type="checkbox" class="custom-control-input" id="toggleShowPassword" tabIndex="-1" />
								  <label class="custom-control-label font-reg" for="toggleShowPassword">แสดงรหัสผ่าน</label>
								</div>
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-block btn-lg btn-primary" onclick="submitStep1();" id="btn-continue">ยืนยัน</button>
							</div>
							<div class="border-top my-4"></div>
							<p class="text-center">สำหรับผู้มีบัญชีแล้วกรุณา <a class="text-link font-med" href="sign-in.php">ลงชื่อเข้าใช้</a></p>
						</div>
						<div class="step-2" style="display:none;">
							<div class="form-control h-auto mb-3 bg-light">
								<div class="form-row">
									<div class="col">
										<span class="text-break text-muted" data-signup="email"></span>
									</div>
									<div class="col-auto">
										<span><a href="javascript:;" class="text-link" onclick="step1();">แก้ไข</a></span>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="ชื่อ" name="firstname" />
										<div class="text-alert"></div>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="นามสกุล" name="lastname" />
										<div class="text-alert"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<select class="custom-select" name="gender">
									<option value="">เพศ</option>
									<option value="M">ชาย</option>
									<option value="F">หญิง</option>
									<option value="other">อื่นๆ</option>
								</select>
								<div class="text-alert"></div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-12"><label class="pl-2h">วันเกิด</label></div>
									<div class="col-3">
										<select class="custom-select" name="dob_date">
											<!-- add options via js -->
										</select>
										<div class="text-alert"></div>
									</div>
									<div class="col-5">
										<select class="custom-select" name="dob_month">
											<!-- add options via js -->
										</select>
										<div class="text-alert"></div>
									</div>
									<div class="col-4">
										<select class="custom-select" name="dob_year">
											<!-- add options via js -->
										</select>
										<div class="text-alert"></div>
									</div>
								</div>
							</div>
							<div class="form-group px-2h mb-2">
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="idcard" name="id_select" class="custom-control-input" value="idcard" checked>
								  <label class="custom-control-label" for="idcard">หมายเลขบัตรประชาชน</label>
								</div>
								<div class="custom-control custom-radio custom-control-inline">
								  <input type="radio" id="passport" name="id_select" class="custom-control-input" value="passport">
								  <label class="custom-control-label" for="passport">หนังสือเดินทาง</label>
								</div>
							</div>
							<div class="form-group" data-select="idcard">
								<input type="text" class="form-control" placeholder="หมายเลขบัตรประชาชน" name="idcard_number" maxlenght="13" />
								<div class="text-alert"></div>
							</div>
							<div class="form-group" data-select="passport" style="display: none;">
								<input type="text" class="form-control" placeholder="หมายเลขหนังสือเดินทาง" name="passport_number"/>
								<div class="text-alert"></div>
							</div>
							<div class="form-group">
								<label class="pl-2h" for="address">ที่อยู่</label>
								<textarea class="form-control" name="address" id="address" placeholder="บ้านเลขที่, อาคาร, ถนน, ซอย, แขวง"></textarea>
								<div class="text-alert"></div>
							</div>
							<div class="form-row">
								<div class="col-6">
									<div class="form-group">
										<label class="pl-2h" for="country">ประเทศ</label>
										<select class="custom-select" id="country" name="country" onchange="$app.fn.getProvince();">
											<!-- add options via js -->
										</select>
										<div class="text-alert"></div>
									</div>
								</div>
								<div class="col-6 row-state">
									<div class="form-group">
										<label class="pl-2h" for="province">จังหวัด</label>
										<select class="custom-select" id="province" name="province" onchange="$app.fn.getCity();">
											<option value="000">กรุณาเลือก</option>
											<!-- add options via js -->
										</select>
										<div class="text-alert"></div>
									</div>
								</div>
								<div class="col-6 row-state">
									<div class="form-group">
										<label class="pl-2h" for="district">อำเภอ/เขต</label>
										<select class="custom-select" id="district" name="district">
											<option value="000">กรุณาเลือก</option>
											<!-- add options via js -->
										</select>
										<div class="text-alert"></div>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="pl-2h" for="zipcode">&nbsp;</label>
										<input type="tel" class="form-control" placeholder="รหัสไปรษณีย์" name="zipcode" />
										<div class="text-alert"></div>
									</div>
								</div>
							</div>
							<div class="form-group px-2h mb-2">
					     <div class="custom-control custom-checkbox">
					       <input type="checkbox" class="custom-control-input" id="mbSubscribe" name="mbSubscribe" checked>
					       <label class="custom-control-label font-reg" for="mbSubscribe">ฉันต้องการบริการอีเมล์แจ้งกำหนดการจำหน่ายบัตรพร้อมรายละเอียด และข่าวสารต่างๆ</label>
					     </div>
							</div>
							<div class="form-group px-2h mb-2">
								<div class="custom-control custom-checkbox">
					       <input type="checkbox" class="custom-control-input" id="terms" name="terms-service">
					       <label class="custom-control-label font-reg" for="terms">ข้าพเจ้ายอมรับ <a href="javascript:;" data-fancybox data-type="ajax" data-src="_terms.php"><u>เงื่อนไขการใช้บริการ</u></a> เว็บไซต์ไทยทิคเกตเมเจอร์</label>
					       <div class="text-alert px-0"></div>
					     </div>
							</div>
							<p class="text-muted">
								<small>โปรดใส่แบบฟอร์มสมัครสมาชิกตามความเป็นจริง ข้อมูลเหล่านี้จะใช้ในการรักษาสิทธ์ของท่านในการเข้าชมงานแสดง หรือกรณีที่บัตรงานแสดงหาย รวมถึงการติดต่อกลับในการแจ้งรายละเอียดงานแสดงต่างๆ และสิทธิพิเศษของสมาชิกเว็บไซต์ THAITICKETMAJOR โดยบริษัทฯ จะถือว่าข้อมูลดังกล่าวเป็นความลับ</small>
							</p>
							<div class="form-group text-center">
								<div class="box-recaptcha d-inline-block" id="RC_signup"></div>
								<div class="text-alert invalid-recaptcha text-left"></div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-block btn-lg btn-primary">สร้างบัญชี</button>
							</div>
						</div>
						<input type="hidden" name="lang" id="lang" value="1" >
					</form>
				</div>
			</div>
		</div>
	</main>
<?php include('inc/javascript.php'); ?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadRC" async defer></script>
<script src="https://www.thaiticketmajor.com/assets/js/core/jquery.cookie.js"></script>
<script src="https://www.thaiticketmajor.com/assets/js/vendor/dobpicker.min.js"></script>
<script>
	var RC_signup;
	var onloadRC = function(){
		RC_signup = grecaptcha.render('RC_signup', {
    	'sitekey' : '6Ld5SH0UAAAAAGAKKGZo-WvZVqKahSy_jgXG_pjr',
   	});
	};
	var form = '#form-signup';
	var $email = $(form+' [name="mbLogin"]');
	var $password = $(form+' [name="mbPasswd"]');
	var $confirm_password = $(form+' [name="mbPasswdC"]');
	var button_continue = $('#btn-continue');
	var button_submit = $('#btn-submit');
	var idCardSelect = true;
	var flagGetCountry = false;
	$(function(){

		$app.fn.getCountry();
		// Select default
		$('select').on('change',function(){
			$(this).each(function(){
				if($(this).val() != "" || $(this).val() != "000"){
					$(this).addClass('active');
				} else {
					$(this).removeClass('active');
				}
			});
		});
		// DOB Picker
		$.dobPicker({
			daySelector: '[name="dob_date"]',
			monthSelector: '[name="dob_month"]',
			yearSelector: '[name="dob_year"]',
			dayDefault: 'วัน',
			monthDefault: 'เดือน',
			yearDefault: 'ปี',
			minimumAge: 5,
			maximumAge: 99
		});
		// Show password
		$('#toggleShowPassword').on('change',function(){
			if($(this).is(':checked')){
				$(form+' [type="password"]').attr('type','text');
			} else {
				$(form+' [type="text"]').attr('type','password');
			}
		});
		// Check select id card/passport
		$(form+' [name="id_select"]').on('change',function(){
			if($(this).val() == 'idcard'){
				$('[data-select="passport"]').hide().find('input').blur();
				$('[data-select="idcard"]').show().find('input').focus();
			} else {
				$('[data-select="idcard"]').hide().find('input').blur();
				$('[data-select="passport"]').show().find('input').focus();
			}
		});
		// Sign up submit
		$(form).on('submit',function(e){
			submitSignup();
			e.preventDefault();
		});
	});
	function submitStep1(){
		if($(form+' [name="telephone"]').val() == 0){
			$app.form.check($(form+' [name="telephone"]'),msg.telephone);
			return false;
		} else if(!(phoneCheck.test($(form+' [name="telephone"]').val()))){
			$app.form.check($(form+' [name="telephone"]'),msg.telephone_invalid);
			return false;
		} else if ($(form+' [name="telephone"]').val().toString().length < '8') {
			$app.form.check($(form+' [name="telephone"]'),msg.telephone_limit);
			return false;
		} else if($email.val() == 0){
			$app.form.check($email,msg.email);
			return false;
		} else if(!(emailCheck.test($email.val()))){
			$app.form.check($email,msg.email_invalid);
			return false;
		} else if($password.val() == 0){
			$app.form.check($password,msg.password);
			return false;
		} else if($password.val().toString().length < '8'){
			$app.form.check($password,msg.password_min);
			return false;
		} else if($confirm_password.val() == 0){
			$app.form.check($confirm_password,msg.password_confirm);
			return false;
		} else if($confirm_password.val() != $password.val()){
			$app.form.check($confirm_password,msg.password_match);
			return false;
		} else {
			button_continue.addClass('loading').attr('disabled','');
			$.ajaxSetup({xhrFields: {withCredentials: true}});
   	 	$.post('https://booking.thaiticketmajor.com/register/checkemail.php',{email:$email.val()},function(data){
   	 		button_continue.removeClass('loading').removeAttr('disabled');
      	if(data){
      		$app.form.check($email,msg.email_duplicate);
      		//ga('send', 'event', 'Sign in/Sign up', 'Sign up', 'Duplicate email (xplORe)');
      	} else {
      		$app.form.clear(form+' .step-1');
					$(form+' [data-signup="email"]').html($email.val());
					step2();
					//ga('send', 'event', 'Sign in/Sign up', 'Sign up', 'Step 1 success (xplORe)');
      	}
    	});
		}
	}
	function submitSignup(){
		if($(form+' [name="firstname"]').val() == 0){
			$app.form.check($(form+' [name="firstname"]'),msg.firstname);
			return false;
		} else if($(form+' [name="lastname"]').val() == 0){
			$app.form.check($(form+' [name="lastname"]'),msg.lastname);
			return false;
		} else if(!$app.check.skipGender && $(form+' [name="gender"]').val() == ""){
			$app.form.check($(form+' [name="gender"]'),msg.gender);
			return false;
		} else if(!$app.check.skipDOB && $(form+' [name="dob_date"]').val() == ""){
			$app.form.check($(form+' [name="dob_date"]'),msg.birthday);
			return false;
		} else if(!$app.check.skipDOB && $(form+' [name="dob_month"]').val() == ""){
			$app.form.check($(form+' [name="dob_month"]'),msg.birthday);
			return false;
		} else if(!$app.check.skipDOB && $(form+' [name="dob_year"]').val() == ""){
			$app.form.check($(form+' [name="dob_year"]'),msg.birthday);
			return false;
		} else if(!$app.check.skipIDcard && $(form+' #idcard').is(':checked') && $(form+' [name="idcard_number"]').val() == 0){
			$app.form.check($(form+' [name="idcard_number"]'),msg.idcard);
			return false;
		} else if(!$app.check.skipIDcard && $(form+' #idcard').is(':checked') && $(form+' [name="idcard_number"]').val().toString().length != '13'){
			$app.form.check($(form+' [name="idcard_number"]'),msg.idcard_limit);
			return false;
		} else if(!$app.check.skipIDcard && $(form+' #idcard').is(':checked') && !$app.fn.checkIDCard($(form+' [name="idcard_number"]').val())){
			$app.form.check($(form+' [name="idcard_number"]'),msg.idcard_invalid);
			return false;
		} else if(!$app.check.skipIDcard && $(form+' #passport').is(':checked') && $(form+' [name="passport_number"]').val() == 0){
			$app.form.check($(form+' [name="passport_number"]'),msg.passport);
			return false;
		} else if (!$app.check.skipAddress && $(form+' [name="address"]').val() == 0) {
			$app.form.check($(form+' [name="address"]'),msg.address);
			return false;
		} else if ($(form+' [name="country"]').val() == 0) {
			$app.form.check($(form+' [name="country"]'),msg.country);
			return false;
		} else if (!$app.check.skipAddress && $app.check.countryTH && $(form+' [name="province"]').val() == "000") {
			$app.form.check($(form+' [name="province"]'),msg.province);
			return false;
		} else if (!$app.check.skipAddress && $app.check.countryTH && $(form+' [name="district"]').val() == "000") {
			$app.form.check($(form+' [name="district"]'),msg.district);
			return false;
		} else if (!$app.check.skipAddress && $(form+' [name="zipcode"]').val() == 0) {
			$app.form.check($(form+' [name="zipcode"]'),msg.zipcode);
			return false;
		} else if (!$(form+' [name="terms-service"]').is(':checked')) {
			$app.form.check2($(form+' [name="terms-service"]'),msg.terms);
			return false;
		} else if(grecaptcha.getResponse(RC_signup) == '' || grecaptcha.getResponse(RC_signup) == undefined){
			$app.form.check($('.box-recaptcha'),'กรุณายืนยันตัวตน');
			return false;
		} else {
			$app.form.clear(form);
			var formData = $(form).serialize();
			console.log(formData);
			button_submit.addClass('loading').attr('disabled','');
			$.ajaxSetup({xhrFields: {withCredentials: true}});
	    $.post('https://booking.thaiticketmajor.com/register/register.php',formData,function(data){
	    	var result = $.parseJSON(data).result;
	    	button_submit.removeClass('loading').removeAttr('disabled');
       	if(result){
       		//ga('send', 'event', 'Sign in/Sign up', 'Sign up', 'Success');
       		window.location = 'link-account.php';
         	$(form)[0].reset();
       	} else {
         	//ga('send', 'event', 'Sign in/Sign up', 'Sign up', 'Fail');
       		$app.dialog.custom('fail','ขออภัย','เกิดข้อผิดพลาดบางประการ <span class="text-nowrap">กรุณาลองใหม่อีกครั้ง</span>','ลองใหม่อีกครั้ง');
       	}
  		});
		}
	}
	function step1(){
		$('.step-2').hide();$('.step-1').show();
	}
	function step2(){
		$('.step-1').hide();$('.step-2').show();
		// fn load country init
		/*if(!flagGetCountry){
			$app.fn.getCountry();
			flagGetCountry = true;
		}*/
	}
</script>
<?php include('inc/footer.php'); ?>