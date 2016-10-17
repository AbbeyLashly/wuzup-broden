(function( $ ) {
	'use strict';

	$(function() {

		var video_section = $( '#broden_video_format_settings_metabox' ),
			audio_section = $( '#broden_audio_format_settings_metabox' ),
			gallery_section = $( '#broden_gallery_format_settings_metabox' ),
			post_format_select = $( '#post-formats-select input' ),
			video_check = $( '#post-format-video' ),
			audio_check = $( '#post-format-audio' ),
			gallery_check = $( '#post-format-gallery' );

		video_section.hide();
		audio_section.hide();
		gallery_section.hide();

		if ( video_check.is( ':checked' ) ) {
			video_section.removeClass( 'closed' ).show();
		}

		if ( audio_check.is( ':checked' ) ) {
			audio_section.removeClass( 'closed' ).show();
		}

		if ( gallery_check.is( ':checked' ) ) {
			gallery_section.removeClass( 'closed' ).show();
		}

		post_format_select.change( function() {
			if ( $( this ).val() === 'video') {
				video_section.removeClass( 'closed' ).show();
				audio_section.hide();
				gallery_section.hide();
			} else if ( $( this ).val() === 'audio') {
				audio_section.removeClass( 'closed' ).show();
				video_section.hide();
				gallery_section.hide();
			} else if ( $( this ).val() === 'gallery') {
				gallery_section.removeClass( 'closed' ).show();
				video_section.hide();
				audio_section.hide();
			} else {
				video_section.hide();
				audio_section.hide();
				gallery_section.hide();
			}
		});
		
	});

})( jQuery );