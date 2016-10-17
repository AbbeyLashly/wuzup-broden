jQuery(function($) {	

	$('.broden-ajax-pagination').on('click', '.pagination a', function(e){
		e.preventDefault();
		var link = $(this).attr('href');
		var container = $(this).closest('.broden-ajax-pagination');

		$('html, body').find(".loading-posts").show();


		$('html, body').animate({
			scrollTop: $('.blog-posts').offset().top - 100
		}, 1000);

			
		$.post(themeajax.ajaxurl, {
		}, function (response) {
			$('.broden-ajax-pagination').load(link + ' .broden-ajax-content');
			container.find(".broden-ajax-content").html(response.content);
		});
	});

})