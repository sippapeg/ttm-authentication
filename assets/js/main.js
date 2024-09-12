/* =================================
	VARIABLE & CALL
================================= */
var $app = {};
var window_w = $(window).width();
var emailCheck = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
var phoneCheck = /^-{0,1}\d*\.{0,1}\d+$/;
var msg = {
	signin_fail : 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง',
	email : 'กรุณาใส่อีเมล์',
	email_invalid : 'กรุณาใส่อีเมล์ให้ถูกต้อง',
	email_duplicate : 'ขออภัยอีเมลนี้ถูกใช้งานแล้ว',
	password : 'กรุณาใส่รหัสผ่าน',
	password_min : 'กรุณาใส่รหัสผ่านอย่างน้อย 8 ตัวอักษร',
	password_confirm : 'กรุณายืนยันรหัสผ่าน',
	password_match : 'กรุณายืนยันรหัสผ่านให้ตรงกัน',
	name : 'กรุณาใส่ชื่อ',
	firstname : 'กรุณาใส่ชื่อ',
	lastname : 'กรุณาใส่นามสกุล',
	gender : 'กรุณาเลือกเพศ',
	birthday : 'กรุณาเลือก',
	idcard : 'กรุณาใส่หมายเลขประจำตัวประชาชน',
	idcard_limit : 'กรุณาใส่รหัสประจำตัวประชาชนให้ครบ 13 หลัก',
	idcard_invalid : 'กรุณาใส่รหัสประจำตัวประชาชนให้ถูกต้อง',
	passport : 'กรุณาใส่เลขทีหนังสือเดินทาง',
	telephone : 'กรุณาใส่เบอร์โทรศัพท์',
	telephone_invalid : 'กรุณาใส่เบอร์โทรศัพท์ด้วยตัวเลขเท่านั้น',
	telephone_limit : 'กรุณาใส่เบอร์โทรศัพท์ให้ครบถ้วน',
	address : 'กรุณาใส่ที่อยุ่',
	country : 'กรุณาเลือกประเทศ',
	district : 'กรุณาใส่ตำบล/แขวง',
	amphoe : 'กรุณาเลือกอำเภอ/เขต',
	province : 'กรุณาเลือกจังหวัด',
	zipcode : 'กรุณาใส่รหัสไปรษณีย์',
	zipcode_invalid : 'กรุณาใส่รหัสไปรษณีย์ด้วยตัวเลขเท่านั้น',
	terms : 'กรุณายอมรับเงื่อนไขการใช้บริการ',
	captcha : 'กรุณาระบุตัวตน',
	nationality : 'กรุณาเลือกสัญชาติ',
	date : 'วัน',
	month : 'เดือน',
	year : 'ปี'
}
$(function(){
	$app.check.init();
	$app.global.init();
});
$(window).on('load',function(){
	$('html').addClass('isLoaded');
});

/* =================================
	FUNCTION
================================= */
$app.check = {
	init : function(){

	},
	scroll : function(){
		var pos = $(window).scrollTop();
		if(pos >= window_w/2){
			$('.main-header').addClass('fixed');
		} else {
			$('.main-header').removeClass('fixed');
		}
	},
	skipGender = false,
	skipDOB = false,
	skipIDcard = false,
	skipAddress = false,
	countryTH = true,
	telephoneCode = 'th',
}
$app.global = {
	init : function(){
		this.dropdown();
	},
	scroll : function(){
		$app.check.scroll();
		$(window).on('scroll',$app.check.scroll);
	},
	dropdown : function(){
		if($('.box-dropdown').length!=0){
			$('html').click(function(){
				$('.box-dropdown').removeClass('show-dropdown');
				$('.box-dropdown .btn-dropdown').removeClass('active');
			});
			$('.box-dropdown').click(function(e){e.stopPropagation();});
			$('.box-dropdown .btn-dropdown').click(function(e){
				$('.box-dropdown .btn-dropdown').removeClass('active');
				if($(this).parent('.box-dropdown').hasClass('show-dropdown')){
					$(this).removeClass('active');
					$(this).parent('.box-dropdown').removeClass('show-dropdown');
				} else {
					$(this).addClass('active');
					$('.box-dropdown').removeClass('show-dropdown');
					$(this).parent('.box-dropdown').addClass('show-dropdown');
					$(this).parent('.box-dropdown').find('.noti-icon').hide();
				}
				e.stopPropagation();
			});
		}
	},
}
$app.dialog = {
	open : function(dialog){
		$(dialog).show(0).addClass('show');
	},
	close : function(){
		$('.dialog').removeClass('show').delay(500).hide(0);
	},
	custom : function(type,title,msg,btn){
		$.fancybox.close();
		switch(type){
			case 'success':
			$.fancybox.open('<div class="dialog-msg"><i class="fa fa-check-circle fa-3x text-success" aria-hidden="true"></i><h2>'+title+'</h2><p class="text-muted">'+msg+'</p><p><button type="button" class="btn btn-block btn-light-link btn-md" onclick="$.fancybox.close();">'+btn+'</button></p></div>');
			break;
			case 'fail':
			$.fancybox.open('<div class="dialog-msg"><i class="fa fa-exclamation-circle fa-3x text-danger" aria-hidden="true"></i><h2>'+title+'</h2><p class="text-muted">'+msg+'</p><p><button type="button" class="btn btn-block btn-light-link btn-md" onclick="location.reload();">'+btn+'</button></p></div>');
			break;
			case 'retry':
			$.fancybox.open('<div class="dialog-msg"><i class="fa fa-exclamation-circle fa-3x text-danger" aria-hidden="true"></i><h2>'+title+'</h2><p class="text-muted">'+msg+'</p><p><button type="button" class="btn btn-block btn-light-link btn-md" onclick="$.fancybox.close();">'+btn+'</button></p></div>');
			break;
		}
	}
}
$app.form = {
	check : function($elm,msg){
		$elm.parents('form').find('.text-alert').hide();
		$elm.parents('form').find('.is-invalid').removeClass('is-invalid');
		$elm.addClass('is-invalid').focus();
		if(msg !== ""){
			$elm.next('.text-alert').text(msg).show();
		}
	},
	check2 : function($elm,msg){
		$elm.parents('form').find('.text-alert').hide();
		$elm.parents('form').find('.is-invalid').removeClass('is-invalid');
		$elm.addClass('is-invalid').focus();
		$elm.parent('*').find('.text-alert').text(msg).show();
	},
	checkSpecific : function($elm,msg,$alert){
		$elm.parents('form').find('.text-alert').hide();
		$elm.parents('form').find('.is-invalid').removeClass('is-invalid');
		$elm.addClass('is-invalid').focus();
		$($alert).text(msg).show();
	},
	clear : function(form){
		$(form+' .text-alert').hide();
		$(form+' .is-invalid').removeClass('is-invalid');
	}
}
$app.fn = {
	goto : function(elm,offsetx){
		if(offsetx == ""){
			offsetx = 0;
		}
		$('html,body').animate({
			scrollTop : $(elm).offset().top - offsetx
		},600,'swing');
	},
	loadCountry : function($nationality,$country){
		$.getJSON('assets/data/nationalities.json', function(data) {
      var $select_nationality = $($nationality);
      var $select_country = $($country);
      $.each(data, function(country, nationality) {
	      $select_nationality.append($('<option>', {
	        value: nationality,
	        text: nationality
	       }));
	      $select_country.append($('<option>', {
	        value: country,
	        text: country
	       }));
	     });
	  });
	}
}