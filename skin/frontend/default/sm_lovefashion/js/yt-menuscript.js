//JS script for Joomla template



$jsmart(document).ready(function($){
	$window = $jsmart(window);

	menu_offset_top = $jsmart('.yt-header-under').offset().top;	
	//menu_offset_top = 172;
	function processScroll() {

		var scrollTop = $window.scrollTop();

		if ( scrollTop >= menu_offset_top) {

			$jsmart('.yt-header-under').addClass('subnav-fixed');

		} else if (scrollTop <= menu_offset_top) {

			$jsmart('.yt-header-under').removeClass('subnav-fixed');

		}

	}

	if($jsmart('.yt-header-under')){

		// fix sub nav on scroll

		processScroll();

		$window.scroll(function(){

			processScroll();

		});

	}

});