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
	});

	$(document).on('click', '.youtube-video-open', function(e){
		e.preventDefault();
		var src = 'https://www.youtube.com/embed/'+$(this).attr('data-id');
		$('#youtube-video iframe').attr('src',src);
		if($('#youtube-video').is(':hidden')){
			$('#youtube-video').fadeIn('slow')
		}
		$('html, body').animate({
			scrollTop: $('#youtube-video').offset().top - 50
		}, 'slow');
    });

	//ajax youtube
	if($('#youtube-feed').length){
		var data = {
			'action': 'youtube_brasa_social_feed'
		};
		$.ajax({
			type: 'POST',
			url:odin.ajax_url,
			data: data,
			complete: function(data){
			  	$('#youtube-feed').html(data.responseText);
			  	if(data.getResponseHeader('next-page-token') && data.getResponseHeader('next-page-token') !== null){
			  		$('#youtube-feed-btn').attr('data-next-page',data.getResponseHeader('next-page-token'));
			  	}
			  	else{
			  		$('#youtube-feed-btn').fadeOut('slow');
			  	}
			}
	    });
	}

	$('#youtube-feed-btn').on('click',function(e){
		e.preventDefault();
		if($(this).hasClass('disable')){
			return;
		}

		var default_html = $(this).html();
		$(this).html($(this).attr('data-loading'));
		$(this).addClass('disable');
	    var data = {
			'action': 'youtube_brasa_social_feed',
			'next_page': $(this).attr('data-next-page')
		};
		$.ajax({
			type: 'POST',
			url: odin.ajax_url,
			data: data,
			complete: function(data){
			  	$('#youtube-feed').append(data.responseText);
			  	if(data.getResponseHeader('next-page-token') && data.getResponseHeader('next-page-token') !== null){
			  		$('#youtube-feed-btn').attr('data-next-page',data.getResponseHeader('next-page-token'));
			  		$('#youtube-feed-btn').removeClass('disable');
			  		$('#youtube-feed-btn').html(default_html);
			  	}
			  	else{
			  		$('#youtube-feed-btn').fadeOut('slow');
			  	}
			}
	    });
	});
});
