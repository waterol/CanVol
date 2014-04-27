 $(function() {
    $(".rslides").responsiveSlides({
    	
    });

    $('#collage').isotope({

		itemSelector:'.item',
		masonary: {
			
		}


	});


	var calendar = $("#calendar").calendar(
            {
                tmpl_path: "tmpls/",
                events_source: function () { return []; }
            });  
});

