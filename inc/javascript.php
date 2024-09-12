<footer>
	<div class="container">
		<div class="row justify-content-center">
			<div class="ol-12 col-md-6 col-xl-4">
				<div class="row">
					<div class="col">
						<div class="box-dropdown my-2">
							<button class="btn-lang btn-dropdown">
								<?php if($_lang == 'th') { echo '<span><img src="https://www.thaiticketmajor.com/assets/img/icon/flag-th.svg"/></span><span>ไทย</span>'; } else { echo '<span><img src="https://www.thaiticketmajor.com/assets/img/icon/flag-en.svg"/></span><span>Select</span>'; } ?>
							</button>
							<div class="dropdown-menu lang-menu">
								<?php if($_lang != 'th') { ?>
								<a href="javascript: setLang('th');" class="dropdown-item"><span class="d-inline-block align-middle"><img src="https://www.thaiticketmajor.com/assets/img/icon/flag-th.svg" width="16px" class="mr-3" /></span><span class="d-inline-block align-middle">ไทย</span></a>
								<?php } else { ?>
									Select
								<?php } ?>
								<div class="dropdown-item">
									<div id="google_translate_element"></div>
									<script type="text/javascript">
									function googleTranslateElementInit() {
									  new google.translate.TranslateElement({pageLanguage: 'th', includedLanguages: 'en,ja,ko,lo,ms,vi,zh-CN,zh-TW', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
									}
									</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
								</div>
							</div>
						</div>
					</div>
					<div class="col-auto">
						<p class="text-right text-muted"><small>&copy; <?php echo date('Y'); ?> THAITICKETMAJOR</small></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
</div>
<script src="assets/js/core/jquery.easing.js"></script>
<script src="assets/js/core/jquery.mousewheel.js"></script>
<script src="assets/js/core/detect.min.js"></script>
<script src="assets/js/vendor/fancybox/jquery.fancybox.min.js"></script>
<script src="assets/js/main.min.js<?php echo $site['cache_version']; ?>"></script>