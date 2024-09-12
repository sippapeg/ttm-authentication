<?php include('inc/head.php'); ?>
	<main class="main-container" role="main">
	<?php include('inc/header.php'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<hgroup class="hgroup">
					<div class="step-signup">
						<h1>สมัครสมาชิก</h1>
						<p class="text-muted"><small class="text-red">*</small> กรุณาใส่ข้อมูลให้ครบถ้วน</p>
					</div>
					<div class="step-3" style="display: none;">
						<h1>ยืนยันอีเมล</h1>
						<p class="text-muted">กรุณากรอกรหัส 6 หลัก ที่ส่งไปยังอีเมล<br><span class="text-dark font-med" data-signup="email"></span></p>
					</div>
				</hgroup>
			</div>
			<div class="col-12 col-md-6 col-xl-4">
				<div class="step-1">
					<div class="form-group mt-3">
						<button type="submit" class="btn btn-block btn-lg btn-border"><span class="font-normal"><img width="20" src="assets/img/icon/google.svg" class="mr-3">ดำเนินการต่อด้วย Google</span></button>
					</div>
					<div class="border-top my-4 text-float"><span class="text-muted">หรือ สมัครสมาชิกด้วยอีเมล</span></div>
				</div>
				<form class="mt-3" id="form-signup" novalidate autocomplete="off">
					<div class="step-signup">
						<div class="step-1">
							<div class="form-group">
								<label class="pl-2h">ชื่อผู้ใช้ (อีเมล) <small class="text-red">*</small></label>
								<input type="email" class="form-control" placeholder="" name="mbLogin" autocomplete="off" />
								<div class="text-alert"></div>
							</div>
							<div class="form-group">
								<label class="pl-2h">สร้างรหัสผ่าน <small class="text-red">*</small></label>
								<input type="password" class="form-control" placeholder="" name="mbPasswd" maxlength="16" autocomplete="off" onkeyup="checkPassword()" onfocus="getPassword()" id="password" />
								<div class="text-alert"></div>
							</div>
							<div class="form-group">
								<ul class="checklist-password" id="requirements" style="display:none;">
									<li class="text-med">รหัสผ่านต้องประกอบไปด้วย :</li>
									<?php 
									$_checklist_password = array(
										array("length","".$_checkmsg_1.""),
										array("lowercase","".$_checkmsg_2.""),
										array("uppercase","".$_checkmsg_3.""),
										array("number","".$_checkmsg_4.""),
										array("special","".$_checkmsg_5."")
									);
									foreach ($_checklist_password as $k => $v) {
										echo '<li id="'.$v[0].'">'.$v[1].'</li>';
									}
									?>
								</ul>
							</div>
							<div class="form-group">
								<label class="pl-2h">ยืนยันรหัสผ่าน <small class="text-red">*</small></label>
								<input type="password" class="form-control" placeholder="" name="mbPasswdC" maxlength="16" autocomplete="off" />
								<div class="text-alert"></div>
							</div>
							<div class="form-group px-2h">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="toggleShowPassword" tabIndex="-1" />
									<label class="custom-control-label font-reg" for="toggleShowPassword">แสดงรหัสผ่าน</label>
								</div>
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-block btn-lg btn-primary" onclick="$app.signup.submitStep1();" id="btn-continue">ยืนยัน</button>
							</div>
							<div class="border-top my-4"></div>
							<p class="text-center">สำหรับผู้มีบัญชีแล้วกรุณา <a class="text-red text-link font-med" href="index.php">เข้าสู่ระบบ</a></p>
						</div>
						<div class="step-2" style="display:none;">
							<label class="pl-2h">ชื่อผู้ใช้</label>
							<div class="form-control h-auto mb-3 bg-light">
								<div class="form-row">
									<div class="col">
										<span class="text-break text-muted" data-signup="email"></span>
									</div>
									<div class="col-auto">
										<span><a href="javascript:;" class="text-link text-primary" onclick="$app.signup.step1();">แก้ไข</a></span>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="pl-2h">ชื่อ<small class="text-red"> *</small></label>
										<input type="text" class="form-control" placeholder="" name="firstname" />
										<div class="text-alert"></div>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label class="pl-2h">นามสกุล<small class="text-red"> *</small></label>
										<input type="text" class="form-control" placeholder="" name="lastname" />
										<div class="text-alert"></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="pl-2h">เบอร์โทรศัพท์<small class="text-red"> *</small></label>
								<input type="tel" class="form-control" name="telephone" id="telephone" />
								<div class="text-alert" id="telephone-alert"></div>
							</div>
							<div class="form-group">
								<div class="form-row">
									<div class="col-12"><label class="pl-2h">วันเกิด<small class="text-red"> *</small></label></div>
									<div class="col-3">
										<select class="custom-select" name="dob_date">
											<!-- add options via js -->
										</select>
										<div class="text-alert pr-0"></div>
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
							<p><a class="btn btn-light btn-block" href="javascript:;" onclick="$('.more-info-container').show();$(this).remove();">กรอกรายละเอียดของคุณให้สมบูรณ์</a></p>
							<div class="more-info-container" style="display: none;">
								<div class="form-group">
									<label class="pl-2h">เพศ</label>
									<select class="custom-select" name="gender">
										<option value="">กรุณาเลือก</option>
										<option value="M">ชาย</option>
										<option value="F">หญิง</option>
										<option value="other">อื่นๆ</option>
									</select>
									<div class="text-alert"></div>
								</div>
								<div class="form-group">
									<label class="pl-2h">สัญชาติ</label>
									<select class="custom-select" id="nationality" name="nationality">
										<option value="">กรุณาเลือก</option>
									</select>
									<div class="text-alert"></div>
								</div>
								<div class="form-group">
									<label class="pl-2h">ประเทศ</label>
									<select class="custom-select" id="country" name="country">
										<option value="">กรุณาเลือก</option>
									</select>
									<div class="text-alert"></div>
								</div>
								<div class="form-group">
									<label class="pl-2h" for="address">ที่อยู่</label>
									<textarea class="form-control" name="address" id="address" placeholder="บ้านเลขที่, อาคาร, ถนน, ซอย"></textarea>
									<div class="text-alert"></div>
								</div>
								<div class="form-group">
									<label class="pl-2h" for="district">ตำบล/แขวง</label>
									<input class="form-control" type="text" id="district" name="district">
									<div class="text-alert"></div>
								</div>
								<div class="form-group">
									<label class="pl-2h" for="district">อำเภอ/เขต</label>
									<input class="form-control" type="text" id="amphoe" name="amphoe">
									<div class="text-alert"></div>
								</div>
								<div class="form-group">
									<label class="pl-2h" for="province">จังหวัด</label>
									<input class="form-control" type="text" id="province" name="province">
									<div class="text-alert"></div>
								</div>
								<div class="form-group">
									<label class="pl-2h" for="zipcode">รหัสไปรษณีย์</label>
									<input type="tel" class="form-control" id="zipcode" name="zipcode">
									<div class="text-alert"></div>
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
									<label class="custom-control-label font-reg" for="terms">ข้าพเจ้ายอมรับ <a href="https://corporate.thaiticketmajor.com/policies.php"  target="_blank"><u>เงื่อนไขการใช้บริการ</u></a> เว็บไซต์ไทยทิคเกตเมเจอร์</label>
									<div class="text-alert px-0"></div>
								</div>
							</div>
							<p class="text-muted">
								<small>โปรดใส่แบบฟอร์มสมัครสมาชิกตามความเป็นจริง ข้อมูลเหล่านี้จะใช้ในการรักษาสิทธ์ของท่านในการเข้าชมงานแสดง หรือกรณีที่บัตรงานแสดงหาย รวมถึงการติดต่อกลับในการแจ้งรายละเอียดงานแสดงต่างๆ และสิทธิพิเศษของสมาชิกเว็บไซต์ THAITICKETMAJOR โดยบริษัทฯ จะถือว่าข้อมูลดังกล่าวเป็นความลับ</small>
							</p>
							<div class="form-group">
								<button type="button" class="btn btn-block btn-lg btn-primary" onclick="$app.signup.submitSignup();">สร้างบัญชี</button>
							</div>
						</div>
						<input type="hidden" name="lang" id="lang" value="1" >
						<input type="hidden" name="telephoneCode" id="telephoneCode">
					</div>
					<div class="step-3" style="display: none;">
						<div class="row">
							<?php for ($i=0; $i < 6 ; $i++) { ?>
								<div class="col">
									<input class="form-control form-control-verify" type="number" min="0" max="9" maxlength="1" name="otp<?php echo $i+1; ?>" onkeyup="$app.signup.OTPcheck(<?php echo $i+1; ?>);" data-index="<?php echo $i+1; ?>" required>
								</div>
							<?php } ?>
							<div class="col-12">
								<p class="text-alert text-center mt-3 mb-0" id="text-alert-otp">กรุณากรอกรหัสให้ครบถ้วน</p>
							</div>
						</div>
						<p class="mt-4">
							<button id="btn-verify" type="button" class="btn btn-block btn-lg btn-primary" onclick="$app.signup.verifyAccount();">ยืนยันรหัส<span class="countdown-btn ml-2">(60s)</span></button>
						</p>
						<p class="text-center" id="btn-resend-otp" style="display: none;">ไม่ได้รับรหัส? <a class="text-red text-link font-med" href="javascript:;" onclick="$app.signup.OTPresend();">ส่งอีกครั้ง</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
<?php include('inc/javascript.php'); ?>
<script src="assets/js/vendor/check-password.min.js<?php echo $site['cache_version']; ?>"></script>
<script src="https://www.thaiticketmajor.com/assets/js/core/jquery.cookie.js"></script>
<script src="https://www.thaiticketmajor.com/assets/js/vendor/dobpicker.min.js"></script>
<!-- International Telephone Number -->
<link rel="stylesheet" href="assets/js/vendor/telephone/css/intlTelInput.min.css">
<script src="assets/js/vendor/telephone/js/intlTelInputWithUtils.js"></script>
<!-- jQuery.Thailand.js -->
<script type="text/javascript" src="assets/js/vendor/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="assets/js/vendor/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
<link rel="stylesheet" href="assets/js/vendor/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript" src="assets/js/vendor/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>
<script>
	var form = '#form-signup';
	var $email = $(form+' [name="mbLogin"]');
	var $password = $(form+' [name="mbPasswd"]');
	var $confirm_password = $(form+' [name="mbPasswdC"]');
	var button_continue = $('#btn-continue');
	var button_submit = $('#btn-submit');
	var button_verify = $('#btn-verify');
	$app.signup = {
		init : function(){
			// Set Load international phone number
			const input = document.querySelector("#telephone");
			const iti = window.intlTelInput(input, {
				formatAsYouType: false,
				initialCountry: "th"
			});
			input.addEventListener("countrychange", function() {
				var data = iti.getSelectedCountryData();
				$('#telephoneCode').val(data.dialCode);
				$app.check.telephoneCode = data.iso2;
			});

			// Set Load Country & Nationality
			$app.fn.loadCountry('#nationality','#country');

			// Set Select default
			$('select').on('change',function(){
				$(this).each(function(){
					if($(this).val() !== "" || $(this).val() !== 0){
						$(this).addClass('active');
					}
					if($(this).val() == "" || $(this).val() == 0){
						$(this).removeClass('active');
					}
				});
			});

			// Set DOB Picker
			$.dobPicker({
				daySelector: '[name="dob_date"]',
				monthSelector: '[name="dob_month"]',
				yearSelector: '[name="dob_year"]',
				dayDefault: 'วัน',
				monthDefault: 'เดือน',
				yearDefault: 'ปี',
				minimumAge: 7,
				maximumAge: 99
			});

			// Set Address Autocomplete
			$.Thailand({
				$district: $('#district'),
				$amphoe: $('#amphoe'),
				$province: $('#province'),
				$zipcode: $('#zipcode')
			});

			// Toggle show/hide password
			$('#toggleShowPassword').on('change',function(){
				if($(this).is(':checked')){
					$(form+' [type="password"]').attr('type','text');
				} else {
					$(form+' [type="text"]').attr('type','password');
				}
			});

			// Sign up submit
			$(form).on('submit',function(e){
				$app.signup.submitSignup();
				e.preventDefault();
			});
		},
		submitStep1 : function(){
			if($email.val() == 0){
				$app.form.check($email,msg.email);
				return false;
			} else if(!(emailCheck.test($email.val()))){
				$app.form.check($email,msg.email_invalid);
				return false;
			} else if($password.val() == 0){
				$app.form.check($password,"");
				return false;
			} else if($password.val().toString().length < '8'){
				alertCheckPassword();
				return false;
			} else if(!(/[a-z]/.test($password.val()))){
				alertCheckPassword();
				return false;
			} else if(!(/[A-Z]/.test($password.val()))){
				alertCheckPassword();
				return false;
			} else if(!(/[0-9]/.test($password.val()))){
				alertCheckPassword();
				return false;
			} else if(!(/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g.test($password.val()))){
				alertCheckPassword();
				return false;
			} else if($confirm_password.val() == 0){
				$('.checklist-password').hide();
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
					} else {
						$app.form.clear(form+' .step-1');
						$('[data-signup="email"]').html($email.val());
						$app.signup.step2();
					}
				});
			}
		},
		submitSignup : function(){
			if($(form+' [name="firstname"]').val() == 0){
				$app.form.check($(form+' [name="firstname"]'),msg.firstname);
				return false;
			} else if($(form+' [name="lastname"]').val() == 0){
				$app.form.check($(form+' [name="lastname"]'),msg.lastname);
				return false;
			} else if($(form+' [name="telephone"]').val() == 0){
				$app.form.checkSpecific($(form+' [name="telephone"]'),msg.telephone,'#telephone-alert');
				return false;
			} else if(!(phoneCheck.test($(form+' [name="telephone"]').val()))){
				$app.form.checkSpecific($(form+' [name="telephone"]'),msg.telephone_invalid,'#telephone-alert');
				return false;
			} else if ($app.check.telephoneCode == 'th' && $(form+' [name="telephone"]').val().toString().length < '8') {
				$app.form.checkSpecific($(form+' [name="telephone"]'),msg.telephone_limit,'#telephone-alert');
				return false;
			} else if($(form+' [name="dob_date"]').val() == ""){
				$app.form.check($(form+' [name="dob_date"]'),msg.birthday);
				return false;
			} else if($(form+' [name="dob_month"]').val() == ""){
				$app.form.check($(form+' [name="dob_month"]'),msg.birthday);
				return false;
			} else if($(form+' [name="dob_year"]').val() == ""){
				$app.form.check($(form+' [name="dob_year"]'),msg.birthday);
				return false;
			} else if (!$(form+' [name="terms-service"]').is(':checked')) {
				$app.form.check2($(form+' [name="terms-service"]'),msg.terms);
				return false;
			} else {
				$app.form.clear(form);
				button_submit.addClass('loading').attr('disabled','');
				$app.signup.OTPverify();
			}
		},
		step1 : function(){
			$('.step-2').hide();$('.step-1').show();
		},
		step2 : function(){
			$('.step-1').hide();$('.step-2').show();
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
       		$('.step-signup').hide();
       		$('.step-3').show();
       		$app.signup.OTPcountdown();
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
			$app.signup.OTPcountdown();
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
	         	window.location = 'success.php'
	       	} else {
	       		$app.dialog.custom('retry','ขออภัย','เกิดข้อผิดพลาดบางประการ หรือ รหัสไม่ถูกต้อง<br><span class="text-dark fotn-med d-inline-block mt-2">กรุณาตรวจสอบรหัสจากอีเมลล่าสุด หรือ<br>กด "ส่งอีกครั้ง" หลังตัวนับเวลาจบลง</span>','ลองใหม่อีกครั้ง');
	       	}
	  		});
			}
		}
	}
	$(function(){
		$app.signup.init();
	});
</script>
<?php include('inc/footer.php'); ?>