 $(function() {
    $(".rslides").responsiveSlides({
    	
    });

    $('#collage').isotope({

		itemSelector:'.item',
		masonary: {
			
		}


	});

    

    if($('#calendar').length > 0)
    {
    	var calendar = $("#calendar").calendar(
        {
            tmpl_path: config.base + "tmpls/",
            events_source: config.base + 'charityprofile/generateCalendar',
            onAfterViewLoad: function(view) {
                $('#calendarmonth').text(this.getTitle());
            }
        }); 

        //calendar.navigate('prev');

        $('#calendarmonth').text(calendar.getTitle());

        $('#calendarcontrol button[data-calendar-nav]').each(function() {
            var $this = $(this);
            $this.click(function() {
                calendar.navigate($this.data('calendar-nav'));
            });
        });
    }

    if($('#password_signup').length > 0)
    {
        $('#password_signup').passField({
            checkMode: PassField.CheckModes.MODERATE
            });
    }

});


    console.log(config.base + 'charityprofile/generateCalendar');