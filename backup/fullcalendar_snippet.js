   $('#calendar3').fullCalendar({
            theme: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            eventSources: [

                // your event source
                {
                    url: 'json-events.php',
                    type: 'POST',
                    data: {
                        property_id: $('#property_id').val()
                    },
                    error: function () {
                        alert('there was an error while fetching events!');
                    }


                }],
            //events: "json-events.php",

            // add event name to title attribute on mouseover

            eventMouseover: function (event, jsEvent, view) {
                if (view.name !== 'agendaDay') {
                    $(jsEvent.target).attr('title', event.title);
                }
            },

            eventDrop: function (event, delta) {
                alert(event.title + ' was moved ' + delta + ' days\n' +
                '(should probably update your database)');
            },
            loading: function (bool) {
                if (bool) $('#loading2').show();
                else $('#loading2').hide();
            }

        });