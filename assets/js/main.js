jQuery(document).ready(function($) {
	// fitVids.
	$( '.entry-content' ).fitVids();

	// Responsive wp_video_shortcode().
	$( '.wp-video-shortcode' ).parent( 'div' ).css( 'width', 'auto' );

	/**
	 * Odin Core shortcodes
	 */

	// Tabs.
	$( '.odin-tabs a' ).click(function(e) {
		e.preventDefault();
		$(this).tab( 'show' );
	});

	// Tooltip.
	$( '.odin-tooltip' ).tooltip();

	$('#conceito-click').on('click',function(e){
		e.preventDefault();
		var open = $(this).attr('data-open');
		if(open == 'false'){
			$('#conceito-content').fadeIn('slow');
			$(this).attr('data-open','true');
		}
		if(open == 'true'){
			$('#conceito-content').fadeOut('slow');
			$(this).attr('data-open','false');
		}
	})

});
