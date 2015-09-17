/*! http://tinynav.viljamis.com v1.2 by @viljamis */
(function(a,k,g){a.fn.tinyNav=function(l){var c=a.extend({active:"selected",header:"",indent:"- ",label:""},l);return this.each(function(){g++;var h=a(this),b="tinynav"+g,f=".l_"+b,e=a("<select/>").attr("id",b).addClass("tinynav "+b);if(h.is("ul,ol")){""!==c.header&&e.append(a("<option/>").text(c.header));var d="";h.addClass("l_"+b).find("a").each(function(){d+='<option value="'+a(this).attr("href")+'">';var b;for(b=0;b<a(this).parents("ul, ol").length-1;b++)d+=c.indent;d+=a(this).text()+"</option>"});
e.append(d);c.header||e.find(":eq("+a(f+" li").index(a(f+" li."+c.active))+")").attr("selected",!0);e.change(function(){k.location.href=a(this).val()});a(f).after(e);c.label&&e.before(a("<label/>").attr("for",b).addClass("tinynav_label "+b+"_label").append(c.label))}})}})(jQuery,this,0);
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
	//responsive nav
	$('.navbar-main-navigation>ul').tinyNav({
	    active: 'selected', // String: Set the "active" class
	    header: 'Menu', // String: Specify text for "header" and show header instead of the active item
	    indent: '- ', // String: Specify text for indenting sub-items
	});
	//open advanced search
	$('#open-search-advanced').on('click', function(e){
		if( $(this).attr('data-open') == 'false' ){

			$('#toggle-search').removeClass('slideOutDown');
			$('section.filtros').addClass('open');
			$('#toggle-search').addClass('open fadeInUp');
			$(this).attr('data-open','true');
		}
		else{
			$('section.filtros').removeClass('open');
			$('#toggle-search').addClass('slideOutDown');
			$('#toggle-search').removeClass('open fadeInUp');
			$(this).attr('data-open','false');
		}
	});

	$('#filter-first-level').on('change', function(e){
		$('#loading-sub-level').removeClass('show');
		$('#filter-sub-level').removeClass('show');

		var value = $(this).val();
		if ( value == '' ) {
			return;
		}
		$('#filter-hidden-tax').attr('value',value);
		$('#loading-sub-level').addClass('show');
		var data = {
			'action': 'brasa_filters_sub_level',
			'category': value,
			'taxonomy': $('#filter-hidden-tax').attr('name')
		};
		$.post(odin.ajax_url, data, function(response) {
			$('#loading-sub-level').removeClass('show');
			if ( response == 'false' ) {
				$('#ajaxerror-sub-level').addClass('show');
				setTimeout( function(){
					$('#ajaxerror-sub-level').removeClass('show');
				}, 4000);
			}
			else{
				$('#filter-sub-level').html('');
				$('#filter-sub-level').append('<option value="">'+odin.sub_level_select+'</option>');
				$('#filter-sub-level').append( response );
				$('#filter-sub-level').addClass('show');
			}
		});
	});
	$('#filter-sub-level').on('change', function(e){
		var value = $(this).val();
		if ( value == '' ) {
			return;
		}
		$('#filter-hidden-tax').attr('value',value);
	});
});
