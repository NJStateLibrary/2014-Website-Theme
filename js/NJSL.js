jQuery(function($) {
	
	/** Suppress these functions in IE6 */
	if( typeof document.body.style.maxHeight !== "undefined" ) {
		
		var example = $('ul.sf-menu').superfish({
			//add options here if required
		}).supposition();
	
		/** Cement boxes together on the home page */
		$(window).on(
			'resize',
			function() {
				tileColumns('.home-page-row');
			}
		);
		
		$('link[media="all"]').each(function( idx, el ) {
//			console.log( el );
			var img = document.createElement('img');
			img.onerror = function(){
				tileColumns('.home-page-row');
			}
			img.src = $(el).attr('href');
		});
		
	}
	
	fakewaffle.responsiveTabs(['xs']);
	
	/** Handle off-canvas navigation */
	$('#main-menu-collapse').on(
		'show.bs.collapse',
		function() {
			/* console.log('triggered menu opening'); */
			$('#main-menu-collapse').addClass('nav-opened');
			$('#main-menu-collapse>ul').removeClass('sf-menu').unbind();
			$('#main-menu-collapse li ul').removeAttr('style');
			$('#main-menu-collapse li').removeClass('page_item_has_children');
			$('#main-menu-collapse li a').removeClass('sf-with-ul');
			
			$('body').addClass('nav-opened');
			
		}
	);
	
	$('#main-menu-collapse').on(
		'hide.bs.collapse',
		function() {
			/* console.log('triggered menu closing'); */
			$('#main-menu-collapse').removeClass('nav-opened');
			$('body').removeClass('nav-opened');
		}
	);
	
	/* Handle electronic resource filter dropdowns */
	$('#njsl_database_filters select').on(
		'change',
		function( e ) {
			window.location = '/electronic_resources/databases/' + e.target.name + '/' + $(e.target).val();
		}
	);
	
});