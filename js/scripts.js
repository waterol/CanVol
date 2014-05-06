 $(function() {
    $(".rslides").responsiveSlides({
    	
    });

    $('#collage').isotope({

		itemSelector:'.item',
		masonary: {
			
		}


	});

    if($('#calendar').length > 0)
    	var calendar = $("#calendar").calendar(
                {
                    tmpl_path: "tmpls/",
                    events_source: function () { return []; }
                });  
});

