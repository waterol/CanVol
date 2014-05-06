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
            tmpl_path: config.base + "tmpls/",
            events_source: config.base + 'charityprofile/generateCalendar'
        });  

});


    console.log(config.base + 'charityprofile/generateCalendar');