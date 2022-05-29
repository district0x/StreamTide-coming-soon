$(function() {
	var $logo = $('.js-menu-img')
	var $logoUrl = $logo.attr('src')

	$('.js-menu-mobile-toggle').on('click', function() {
		$(this).toggleClass('is-active')
		$('body').toggleClass('overflow-hidden')
		$('.js-menu-mobile-box, .l-page__header, .c-footer').toggleClass('is-active')

		if ($('.js-menu-mobile-box').hasClass('is-active')) {
			$logo.attr('src', $logoUrl.replace('logo', 'logo-light'))
		} else {
			$logo.attr('src', $logoUrl.replace('logo-light', '-light'))
		}
	})
})
$('.points-btn').on('click', function() {
	$('body').toggleClass('l-night')
	$('.v-day, .v-night').hide()
	if ($('body').hasClass('l-night')) {
		$('.v-night')
			.delay(200)
			.fadeIn()
	} else {
		$('.v-day')
			.delay(200)
			.fadeIn()
	}
})
