var filters = [];

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

    $('.filterdropdowns').change(function() {
        var name = $(this).attr('name');
        var val = this.value;

        if(val == "showall")
            filters[name] = null;
            //$('.browsecharitiescharities').fadeIn();
        else
        {
            filters[name] = val;
            //$(".browsecharitiescharities[data-"+ name +"='"+ value +"']").fadeIn();
           // $(".browsecharitiescharities[data-"+ name +"!='"+ value +"']").fadeOut();
        }

        var selector = "";
        console.log(filters);

        for (var key in filters) {
          if (filters.hasOwnProperty(key))
            if(filters[key] != null)
                selector = selector + ".browsecharitiescharities[data-"+ key +"!='"+ filters[key] +"'], ";
        }

        selector = selector.substring(0, selector.length - 2);

        alert(selector);


        $(".browsecharitiescharities").show();
        $(selector).hide();


    })

});


    console.log(config.base + 'charityprofile/generateCalendar');