/* =================================
	VARIABLE & CALL
================================= */
var $app = {};
var user = detect.parse(navigator.userAgent);
var lazy;
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
	/* CHECK IE */
	ie : function(){
		if(user.browser.family == "IE" && user.browser.major < 11){
			return true;
		} else {
			return false;
		}
	},
	/* CHECK SAFARI */
	safari : function(){
		if(user.device.type == "Desktop" && user.browser.family == "Safari" && user.browser.major < 12){
			return true;
		} else {
			return false;
		}
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
	countryTH = true
}
$app.global = {
	init : function(){
		lazy = $('.lazy').lazy({
		   visibleOnly: true,
		   chainable: false
	   });
	},
	scroll : function(){
		$app.check.scroll();
		$(window).on('scroll',$app.check.scroll);
	}
}
$app.detail = {
	init : function(){
		var detail_h = $('.e-detail').height();

		$app.global.scroll();

		// btn more
		if(detail_h >= 600){
			$('.btn-more').show();
		} else {
			$('.btn-more').hide();
		}
		$('.btn-more').on('click',function(){
			$('.e-detail-container').addClass('h-auto');
			$(this).remove();
		});

		// detail editor custom
		$('.e-text-editor table').each(function(){
			$(this).wrap('<div class="table-responsive"></div>');
		});
	}
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
		}
	}
}
$app.search = {
	open : function(){
		$('.main-header').addClass('show-search');
		$('#input-search').focus();
		/*var tm = setTimeout(function(){
			$('#input-search').focus();
			clearTimeout(tm);
		},600);*/
	},
	close : function(){
		$('.main-header').removeClass('show-search');
	}
}
$app.form = {
	check : function($elm,msg){
		$elm.parents('form').find('.text-alert').hide();
		$elm.parents('form').find('.is-invalid').removeClass('is-invalid');
		$elm.addClass('is-invalid').focus();
		$elm.next('.text-alert').text(msg).show();
	},
	check2 : function($elm,msg){
		$elm.parents('form').find('.text-alert').hide();
		$elm.parents('form').find('.is-invalid').removeClass('is-invalid');
		$elm.addClass('is-invalid').focus();
		$elm.parent('*').find('.text-alert').text(msg).show();
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
	getCountry : function(country) {
		var lang = $('#lang').val();
		if(country == "" || country == undefined){
			var $country = 'TH'
		} else {
			var $country = country;
		}
		$.post('https://booking.thaiticketmajor.com/tickets/getcountry.ajax.php?lang='+lang+'', function(data) {
			$('#country').append(data).addClass('active');
			$('#country').val('TH');
			$.post('https://booking.thaiticketmajor.com/tickets/getstate.ajax.php?lang=' + lang + '&value='+$country, function(data, status) {
			  var re = eval('(' + data + ')');
			  $("#province").html(re.pages).addClass('active');
			  $("#province option[value='000']").html('กรุณาเลือก');
			});
		});
	},
	getProvince : function() {
	  window.focus();
	  $('#zipcode').val("");
	  var value = $('#country').val();
	  var lang = $('#lang').val();
	  if(value === 'TH') {
	    $('.row-state').show();
	    $app.check.countryTH = true;
	  } else {
	    $('.row-state').hide();
	    $app.check.countryTH = false;
	  }
	  var url = 'https://booking.thaiticketmajor.com/tickets/getstate.ajax.php?lang=' + lang + '&value=' + value;
	  $.post(url, function(data, status) {
	    var re = eval('(' + data + ')');
	    $("#province").html(re.pages).addClass('active');
	    $("#province option[value='000']").html('กรุณาเลือก');
	    if(value === "000"){
	    	$("#province").html('<option value="000">กรุณาเลือก</option>').removeClass('active');
	    }
	  });
	  var url_2 = 'https://booking.thaiticketmajor.com/tickets/getcity.ajax.php?mode=2&lang=' + lang + '&value=' + value;
	  $.post(url_2, function(data, status) {
	    var re = eval('(' + data + ')');
	    $("#district").html(re.pages).addClass('active');
	    $("#district option[value='000']").html('กรุณาเลือก');
	    if(value === "000"){
	    	$("#district").html('<option value="000">กรุณาเลือก</option>').removeClass('active');
	    }
	  });
	  return false;
	},
	getCity : function(){
	  window.focus();
		var value = $('#province').val();
		var lang = $('#lang').val();
	  var url = 'https://booking.thaiticketmajor.com/tickets/getcity.ajax.php?mode=1&lang='+lang+'&value='+value;
		$.post(url,function(data, status){
			var re = eval ('(' + data + ')');
			$("#district").html(re.pages).addClass('active');
	    $("#district option[value='000']").html(msg.amphoe);
	    if(value === "000"){
	    	$("#district").html('<option value="000">'+msg.amphoe+'</option>').removeClass('active');
	    }
		});
		return false;
	},
	checkIDCard : function(id) {
		for(i=0, sum=0; i < 12; i++)
		  sum += parseFloat(id.charAt(i))*(13-i);
		if((11-sum%11)%10!=parseFloat(id.charAt(12)))
		  return false; return true;
	}
}