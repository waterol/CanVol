var filters = [];

function sortUsingNestedText(parent, childSelector, keySelector) {
    var items = parent.children(childSelector).sort(function(a, b) {
        var vA = $(keySelector, a).text();
        var vB = $(keySelector, b).text();
        return (vA > vB) ? -1 : (vA < vB) ? 1 : 0;
    });
    parent.append(items);
}


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


        if(name == "agegroup")
        {
            $('.browsecharitiescharities').each(function (i) {
                if( $(this).data('agegroupmin') <= val && $(this).data('agegroupmax') >= val )
                {
                    $(this).attr('data-agegroup', val);
                    console.log('assign ' + val + ' to ' + $(this).data('agegroupmin'));
                }
            });
        }

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

        for (var key in filters) {
          if (filters.hasOwnProperty(key))
            if(filters[key] != null)
                selector = selector + ".browsecharitiescharities[data-"+ key +"!='"+ filters[key] +"'], ";
        }

        selector = selector.substring(0, selector.length - 2);

        $(".browsecharitiescharities").show();
        $(selector).hide();


    });

    $('#sortonbrowsecharities').change(function() {
        if(this.value == "mostpopular")
            sortUsingNestedText($('#charitylist'), 'a', '.ratingsinbrowsecharities');
        if(this.value == "highestrated")
            sortUsingNestedText($('#charitylist'), 'a', '.ratingsinbrowsecharities');
    });

});



console.log(config.base + 'charityprofile/generateCalendar');
