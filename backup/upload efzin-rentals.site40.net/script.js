function abc(){
    // Here we will write a function when link click under class popup

    $('a.popup').click(function() {


// Here we will describe a variable popupid which gets the
// rel attribute from the clicked link
        var popupid = $(this).attr('rel');


// Now we need to popup the marked which belongs to the rel attribute
// Suppose the rel attribute of click link is popuprel then here in below code
// #popuprel will fadein
        $('#' + popupid).fadeIn();


// append div with id fade into the bottom of body tag
// and we allready styled it in our step 2 : CSS
        $('body').append('<div id="fade"></div>');
        $('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();


// Now here we need to have our popup box in center of
// webpage when its fadein. so we add 10px to height and width
        var popuptopmargin = ($('#' + popupid).height() + 10) / 2;
        var popupleftmargin = ($('#' + popupid).width() + 10) / 2;


// Then using .css function style our popup box for center allignment
        $('#' + popupid).css({
            'margin-top' : -popuptopmargin,
            'margin-left' : -popupleftmargin
        });
    })



}


function makePhotoGallerySlide(){

        var _SlideshowTransitions = [
            {$Duration: 1200, x: 0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            , { $Duration: 1200, x: -0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            , { $Duration: 1200, x: -0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            , { $Duration: 1200, x: 0.3, $SlideOut: true, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            , { $Duration: 1200, y: 0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            , { $Duration: 1200, y: -0.3, $SlideOut: true, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            , { $Duration: 1200, y: -0.3, $During: { $Top: [0.3, 0.7] }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            , { $Duration: 1200, y: 0.3, $SlideOut: true, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            , { $Duration: 1200, x: 0.3, $Cols: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            , { $Duration: 1200, x: 0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            , { $Duration: 1200, y: 0.3, $Rows: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            , { $Duration: 1200, y: 0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            , { $Duration: 1200, y: 0.3, $Cols: 2, $During: { $Top: [0.3, 0.7] }, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            , { $Duration: 1200, y: -0.3, $Cols: 2, $SlideOut: true, $ChessMode: { $Column: 12 }, $Easing: { $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            , { $Duration: 1200, x: 0.3, $Rows: 2, $During: { $Left: [0.3, 0.7] }, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            , { $Duration: 1200, x: -0.3, $Rows: 2, $SlideOut: true, $ChessMode: { $Row: 3 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }

            , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            , { $Duration: 1200, x: 0.3, y: 0.3, $Cols: 2, $Rows: 2, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $SlideOut: true, $ChessMode: { $Column: 3, $Row: 12 }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2, $Outside: true }
            , { $Duration: 1200, $Delay: 20, $Clip: 3, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            , { $Duration: 1200, $Delay: 20, $Clip: 3, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            , { $Duration: 1200, $Delay: 20, $Clip: 12, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
            , { $Duration: 1200, $Delay: 20, $Clip: 12, $SlideOut: true, $Assembly: 260, $Easing: { $Clip: $JssorEasing$.$EaseOutCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
        ];

        var options1 = {
            $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlayInterval: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 1,                                //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            //$DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either,
            $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
            $SlideDuration: 800,                                //Specifies default duration (swipe) for slide in milliseconds

            $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
            },

            $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 1                               //[Required] 0 Never, 1 Mouse Over, 2 Always
            },

            $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
                $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                $SpacingX: 8,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                $DisplayPieces: 10,                             //[Optional] Number of pieces to display, default value is 1
                $ParkingPosition: 360                          //[Optional] The offset position to park thumbnail
            }
        };

        var jssor_slider1 = new $JssorSlider$("slider1_container", options1);
        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
            if (parentWidth)
                jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth, 990),600));
            else
                window.setTimeout(ScaleSlider, 30);
        }
        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);



        //responsive code end


}


$(document).ready(function() {

    var path = window.location.pathname;
    var page = path.split('/').pop().toLowerCase();
    var arr=window.location.toString().split("/");
    arr.pop();
    var SITE_URL=arr.join('/');

    Date.prototype.addDays = function(days)
    {
        var dat = new Date(this.valueOf());
        dat.setDate(dat.getDate() + days);
        return dat;
    }


    $("#sinput, #input_search_place").autocomplete({
        source: "ajax_autocomplete.php",
        minLength: 2,
        select: function(event, ui) {
            var url = ui.item.label;
            if(url != '#') {
                $('#region').val(ui.item.region);
            }
        },

        html: false, // optional (jquery.ui.autocomplete.html.js required)

        // optional (if other layers overlap autocomplete list)
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
            //$(".ui-autocomplete").css("background-color", 'white');
            //$(".ui-autocomplete").css("padding", '6px');
        }
    });




    $('.calendar-panel').css('position','absolute');
    $('.calendar-panel').css("top", (($(window).height() - $('.calendar-panel').outerHeight()) / 2) + $(window).scrollTop() + "px");
    $('.calendar-panel').css("left", (($('#mainDiv').width() - $('.calendar-panel').outerWidth())/2 ) + $(window).scrollLeft() + "px");



if(page=="index.php") {
    abc();
    $('.sidebar-nav>li:last-child').addClass('bot');
    $('.sidebar-nav>li:first-child').addClass('top');
    $('.hot-news ul li:last-child').css("border", "none");
    $('.slider').slides({
        effect: 'fade',
        fadeSpeed: 500,
        fadeEasing: 'easeInOutQuad',
        play: 7000,
        pause: 3000,
        hoverPause: false
    });

}
else if(page=="search.php")
        $('.datepicker').Zebra_DatePicker();

   else if(page=="property.php") {


        /*$('#thumpslides_id').css('width','990px');
         $('#thumpslides_id').css('left','0px');*/

        $('#calendar').fullCalendar({
            //theme: true,
            editable: false,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
                //right: 'month,agendaWeek,agendaDay'
            },
            selectable: true,
            defaultView: 'month',
            selectHelper: true,
            allDaySlot: true,
            aspectRatio: 1.75,


            eventAfterRender: function (event, element, view) {
                if (event.title == 'Free' || event.title == 'Occupied') {
                    date_start = new Date();
                    date_end = new Date();


                    //date_start = $.fullCalendar.formatDate(event.start, 'yyyy-MM-dd');
                    date_start = event.start;

                    //date_end = $.fullCalendar.formatDate(event.end, 'yyyy-MM-dd');
                    date_end = event.end;

                    date = new Date(date_start);
                    var i = 0;



                    while (date < date_end) {
                        date.setDate(date_start.getDate() + i);
                        date2 = new Date();
                        date2 = $.fullCalendar.formatDate(date, 'yyyy-MM-dd');
                        if (event.title == 'Free') {
                            $('.fc-day[data-date="' + date2 + '"]').addClass('greenCell');

                            $('.fc-day[data-date="' + date2 + '"]').find('.fc-day-content').html('<div class="calendar_cell" >' +
                            '' + '<strong>' + event.price + '&nbsp;&euro; </strong></div>');

                            if ($('.fc-day[data-date="' + date2 + '"]').hasClass('fc-today'))
                                $('.fc-day[data-date="' + date2 + '"]').find('.fc-day-content').html('<div class="calendar_cell" >' +
                                '' + 'Today<br><strong>' + event.price + '&nbsp;&euro; </strong></div>');


                            if ($('.fc-day[data-date="' + date2 + '"]').hasClass('fc-past')) {

                                $('.fc-day[data-date="' + date2 + '"]').find('.calendar_cell').text('');

                            }

                            if ($('.fc-day[data-date="' + date2 + '"]').hasClass('fc-other-month')) {
                                $('.fc-day[data-date="' + date2 + '"]').find('.calendar_cell').css('opacity', '0.3');
                            }

                            $(element).find('.fc-event-title').html('');
                        }
                        else {
                            $(element).find('.fc-event-title').html('');
                            $('.fc-day[data-date="' + date2 + '"]').addClass('redCell');
                            $('.fc-day[data-date="' + date2 + '"]').find('.fc-day-content').html('<div class="calendar_cell" >' +
                            '<strong>Occupied</strong></div>');

                        }

                        i++;
                    }

                    //alert(date);

                }

            },

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
                    },
                    color: 'transparent'     // an option!
                    //textColor: 'yellow' // an option!

                }],


            //events: "json-events.php",

            eventDrop: function (event, delta) {
                alert(event.title + ' was moved ' + delta + ' days\n' +
                '(should probably update your database)');
            },
            //****************** SELECT FUNCTION ***********************
            select: function (start, end, jsEvent, view) {

                var check = $.fullCalendar.formatDate(start, 'yyyy-MM-dd');
                var today = $.fullCalendar.formatDate(new Date(), 'yyyy-MM-dd');
                if (check < today) {
                    // Previous Day. show message if you want otherwise do nothing.
                    // So it will be unselectable
                }
                else {

                    date = new Date(start);
                    var i = 0;
                    while (date <= end) {


                        date2 = new Date();
                        date2 = $.fullCalendar.formatDate(date, 'yyyy-MM-dd');
                        if ($('.fc-day[data-date="' + date2 + '"]').hasClass('redCell')) {
                            alert('Some of the days you selected are occupied ');

                            return;
                        } else if ($('.fc-day[data-date="' + date2 + '"]').hasClass('greenCell') == false) {
                            return;
                        }

                        i++;
                        date.setDate(start.getDate() + i);
                    }

                    ;
                    document.location.href = 'inquiry.php?pid=' + $('#property_id').val() + '&sd=' + $.fullCalendar.formatDate(start, 'yyyy-MM-dd') + "&ed=" + $.fullCalendar.formatDate(end, 'yyyy-MM-dd');
                    // Its a right date
                    // Do something
                }
            },
            loading: function (bool) {
                if (bool) $('#loading').show();
                else $('#loading').hide();
            }

        });


    }


   else if(page=='inquiry.php' || page=='requestform.php'|| page=='entryform.php'){

        /*        $('#refresh-captcha').bind('click',function(){
         d = new Date();
         $('captcha-image').prop('src','phpcaptcha/captcha.php?'+d.getTime());

         });*/
        $('#inquiry-form').bind('submit',function(evt) {
            evt.stopPropagation();
            //evt.preventDefault();

            $('#loading-icon').show();
            $('#captcha-error').hide();
            var error=false;
            jQuery.ajax({
                type: "POST",
                dataType: "json",
                url:  SITE_URL + '/phpcaptcha/ajax_captcha.php',
                data: {
                    captcha: $('#captcha').val()

                },
                success: function (data) {
                    $('#loading-icon').hide();
                    //alert(response);
                    //var data = $.parseJSON(response);
                    if (data.result == 'success') {
                        $('#captcha-error').hide();
                        error=false;
                        return true;
                    }
                    else {
                        $('#captcha-error').show();
                        error=true;
                        return false ;
                    }
                },
                error: function () {
                    $('#loading-icon').hide();
                    $('#captcha-error').show();
                    error=true;
                    return false;
                },
                async: false
            });
            if(error==true)
                return false;
            return true;
            //return true;
        });



        if(page=='entryform.php'){
            // jQuery
            $("#imageupload").dropzone({
                url: "entryform.php" ,
                maxFilesize: 2,
                maxFiles:10,
                acceptedFiles:'image/*',
                dictDefaultMessage:"Εναποθείστε εδώ τις φωτογραφίες σας",
                dictFallbackMessage:"Ο browser σας δεν υποστηρίζει το ανέβασμα των φωτογραφιών",
                dictInvalidFileType:"Λάθος τύπος αρχείου",
                dictFileTooBig:"Υπερβολικά μεγάλο μέγεθος αρχείου",
                dictMaxFilesExceeded: "Υπερβήκατε τις 10 φωτογραφίες",
                //addRemoveLinks:true,
                dictCancelUpload:"Ακύρωση ανεβάσματος",
                dictResponseError:"Κάποιο σφάλμα συνέβη κατα το ανέβασμα των φωτογραφιών σας.",
                dictCancelUploadConfirmation:"Θέλετε να ακυρώσετε το ανέβασμα;",
                thumbnailWidth:64,
                thumbnailHeight:64,
                dictRemoveFile:"Αφαίρεση εικόνας"
            });
        }



    }




    if(page=='index.php'|| page=='search.php' ){

        /*$('#searchtable').DataTable({
         ordering: false,
         "paging" :   true,
         "searching" : false,
         "autoWidth" : true,
         "info" : false

         });*/

        var results_count=$('#results_count').val();
        var results_per_page=$('#results_per_page').val();

        var total_pages=Math.ceil(results_count/results_per_page);
        for(var i=1; i<=total_pages; i++ ){
            $('#pagination').append("<div class='pagination-link' data-page='"+i+"' id='pagination_link_"+i+"'>"+i+"</div>");
            $('#pagination_link_'+i).bind('click',function(evt) {
                var page=$(this).attr('data-page');
                var a=(page-1)*results_per_page+1;
                var b=results_per_page*page;
                $('.search-result-tr').filter(function() {
                    return $(this).attr("data-rowid") >= a && $(this).attr("data-rowid")<=b;
                }).show();
                $('.search-result-tr').filter(function() {
                    return $(this).attr("data-rowid") < a || $(this).attr("data-rowid")>b;
                }).hide();
                $('.pagination-link-active').removeClass('pagination-link-active').addClass('pagination-link');
                $(this).removeClass('pagination-link');
                $(this).addClass('pagination-link-active');
                if(page<total_pages)
                    $('.pagination-next').show();
                else if(page==total_pages)
                    $('.pagination-next').hide();
                if(page>1)
                    $('.pagination-prev').show();
                else if (page==1)
                    $('.pagination-prev').hide();
            });

        }

        if(total_pages>1){
            $('#pagination').append("<div class='pagination-next' >»</div>");
            $('.pagination-next').bind('click',function(evt) {

                var page=parseInt($('.pagination-link-active').attr('data-page'))+1;
                $('[data-page='+(page)+']').click();
            });

            $('#pagination').prepend("<div class='pagination-prev' >«</div>");
            $('.pagination-prev').bind('click',function(evt) {

                var page=parseInt($('.pagination-link-active').attr('data-page'))-1;
                $('[data-page='+(page)+']').click();
            });

        }

        $('#pagination_link_1').click();

        $('input[name=price_from]').on('change',function(evt){
            if($(this).val()!='')
                $('#property_charge_period').prop('disabled', false);
            else{
                if($('input[name=price_to]').val()=='')
                    $('#property_charge_period').prop('disabled', true);
            }



        });

        $('input[name=price_to]').on('change',function(evt){
            if($(this).val()!='')
                $('#property_charge_period').prop('disabled', false);
            else{
                if($('input[name=price_from]').val()=='')
                    $('#property_charge_period').prop('disabled', true);
            }



        });


        $('#search-button').bind('click',function(evt) {
            if($('#property_kind :checkbox:checked').length == 0){

                $('#search-error').text(TEXT_ERRORS['ERROR_MISSING_SEARCH_KIND']);
                $('#search-error').show();
                return false;
            }
            else{
                $('#search-error').hide();
            }
            return true;

        });
    }






    /*  $('#banner-fade').bjqs({
          'height' : 320,
          'width' : 750,
          'responsive' : true
      });
      $('#banner-slide').bjqs({
          animtype      : 'slide',
          height        : 400,
          width         : 750,
          responsive    : true,
          randomstart   : true
      });*/

//    $('.banner').unslider();
//if(location.pathname.substring(1)=="why.php"){

	
//  });



if (document.images) {
				img1 = new Image();
				img2 = new Image();
				img3 = new Image();
				img4 = new Image();
				//img1.src="images/05_12-18-2005_elephant_rocks.jpg";
				
				
				
				//document.getElementById('im101').src=img1.src;
				

}




    var dateToday = new Date();
    var tomorrow = new Date(dateToday);
    tomorrow.setDate(dateToday.getDate() + 1);
   /* $('.MyDate0').datepicker({
        dateFormat: 'dd-mm-yy',
        changeYear: true,
        minDate: tomorrow

    });*/






}); //end of ready function

function submitFormWithEnter(myfield,e)
                    {
                        var keycode;
                        if (window.event)
                        {
                        keycode = window.event.keyCode;
                        }
else if (e)
                        {
                            keycode = e.which;
                            }
else
                        {
                            return true;
                            }

if (keycode == 13)
                        {
                            myfield.form.submit();
                            return false;
                            }
else
                        {
                            return true;
                            }
}




function mouseX(evt) {
if (evt.pageX) return evt.pageX;
else if (evt.clientX)
   return evt.clientX + (document.documentElement.scrollLeft ?
   document.documentElement.scrollLeft :
   document.body.scrollLeft);
else return null;
}
function mouseY(evt) {
if (evt.pageY) return evt.pageY;
else if (evt.clientY)
   return evt.clientY + (document.documentElement.scrollTop ?
   document.documentElement.scrollTop :
   document.body.scrollTop);
else return null;
}




function hideWait(popupid){
    document.getElementById(popupid).style.visibility='hide';
}
function showWait(popupid){
    document.getElementById(popupid).style.visibility='visible';
    document.getElementById(popupid).style.position='absolute';
    //document.getElementById(popupid).style.zIndex='+100';
    //$('#'+popupid).css("top", $(window).scrollTop() + "px");

    //$("#"+popupid).css("top", (($('#mainDiv').height() - $("#"+popupid).outerHeight()) / 2) + $(window).scrollTop() + "px");
    $("#"+popupid).css("top", (($('#availability_button').position().top ) ) + $(window).scrollTop() + "px");


    $("#"+popupid).css("top", (($('#mainDiv').height() - $("#"+popupid).outerHeight()) / 2) + $(window).scrollTop() + "px");



    //$("#"+popupid).css("left", (($(window).width() - $("#"+popupid).outerWidth())/2 ) + $(window).scrollLeft() + "px");

    //$("#"+popupid).css("top", (($(window).height() - $("#"+popupid).outerHeight()) / 2) + $(window).scrollTop() + "px");
    $("#"+popupid).css("left", (($('#mainDiv').width() - $("#"+popupid).outerWidth())/2 ) + $(window).scrollLeft() + "px");


}






function updateArea(newArea){

    if (window.XMLHttpRequest)xmlhttp=new XMLHttpRequest();
    else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState!=4)return;

        if( xmlhttp.status!=200){

            hideWait('PleaseWaitPopupID');
            alert("@Error : "+xmlhttp.statusText+"("+xmlhttp.status+")");
            return;
        }


        hideWait('PleaseWaitPopupID');
        var str=xmlhttp.responseText;
        document.getElementById('rotatorID1').innerHTML=str;

        var aa="#"+$("#selectedProvinceID").attr('name')+"ID";
//        alert($(aa).attr('name'));
        //$(aa).attr('name')+"ID").css("display","inline");
//        alert("#"+$("#selectedProvinceID").attr('name')+"ID").css)
        $("#selectedProvinceID").html(newArea+ " Gorges");
        $("#selectedProvinceID").attr("name",newArea );
        $("#"+newArea+"ID").hide();
        $(aa).show();
        $("#cretaThumpID").attr("src","images/creta/"+newArea+".png");
        $("#HrefCretaThumpID").attr("href",
            "javascript:popitup5('images/creta/"+newArea+".png','Creta Map', 384, 288,'white')");

    }
    showWait('PleaseWaitPopupID');



//    xmlhttp.open("GET","http://cretagorges.localhost/ajax_response1.php");
    xmlhttp.open("POST","ajax_response.php",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
////// Make the request query...

    xmlhttp.send("newarea="+newArea);
//    xmlhttp.send("skata");

}



function updateEvent(criteria){
    if (window.XMLHttpRequest)xmlhttp=new XMLHttpRequest();
    else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState!=4)return;

        if( xmlhttp.status!=200){

            hideWait('PleaseWaitPopup2ID');
            alert("Error : "+xmlhttp.statusText+"("+xmlhttp.status+")");
            return;
        }




        hideWait('PleaseWaitPopup2ID');
        var str=xmlhttp.responseText;

//        alert(str);

        document.getElementById('rotatorID2').innerHTML=str;

//        var aa="#"+$("#selectedProvinceID").attr('name')+"ID";

        var previousSort=$("#sortSelectedID").attr("alt");
        $("#sortSelectedID").html(criteria);
        $("#sortSelectedID").attr("alt",criteria);
        $("#sortSelectedID").css("padding-right","18px");


        $("#sort"+previousSort+"ID").html($("#sort"+previousSort+"ID").attr("alt"));
        $("#sort"+criteria+"ID").html(criteria+" "+$("#spanImgTicID").html());

    }
    showWait('PleaseWaitPopup2ID');


    xmlhttp.open("POST","ajax_response.php",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
////// Make the request query...
//    alert('just beforeee:'+criteria);
    xmlhttp.send("newsortevent="+criteria);

}






//////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////

var newwindow;
var wheight = 0, wwidth = 0;

function popitup5(url, title, iwidth, iheight, colour) {
    var pwidth, pheight;

    if ( !newwindow || newwindow.closed ) {
        pwidth=iwidth+30;
        pheight=iheight+30;
        newwindow=window.open('','htmlname','width=' + pwidth +',height=' +pheight + ',resizable=1,top=50,left=10');
        wheight=iheight;
        wwidth=iwidth;
    }

    if (wheight!=iheight || wwidth!=iwidth ) {
        pwidth=iwidth+30;
        pheight=iheight+90;
// The resizeTo needs Javascript 1.2 or higher so the Script should also specify language="JavaScript1.2"
        if (window.resizeTo) newwindow.resizeTo(pwidth, pheight);
        wheight=iheight;
        wwidth=iwidth;
    }

    newwindow.document.clear();
    newwindow.focus();
    newwindow.document.writeln('<html> <head> <title>' + title + '<\/title> <\/head> <body bgcolor= \"' + colour + '\"> <center>');
    newwindow.document.writeln('<img src=' + url + ' title=\"' + title + '\" alt=\"' + title + '\" >');
    newwindow.document.writeln('<\/center> <\/body> <\/html>');
    newwindow.document.close();
    newwindow.focus();
}

// Routines to tidy up popup windows when page is left
// Call with an onUnload="tidy5()" in body tag


function popitup6(url, title, iwidth, iheight, colour) {
    var pwidth, pheight;

    if ( !newwindow || newwindow.closed ) {
        pwidth=iwidth+30;
        pheight=iheight+30;
        newwindow=window.open('','htmlname','width=' + pwidth +',height=' +pheight + ',resizable=1,top=50,left=10');
        wheight=iheight;
        wwidth=iwidth;
    }

    if (wheight!=iheight || wwidth!=iwidth ) {
        pwidth=iwidth+30;
        pheight=iheight+90;
// The resizeTo needs Javascript 1.2 or higher so the Script should also specify language="JavaScript1.2"
        if (window.resizeTo) newwindow.resizeTo(pwidth, pheight);
        wheight=iheight;
        wwidth=iwidth;
    }

//    alert('<img src=' + url + ' title=\"' + title + '\" alt=\"' + title  + '\"' + ' width='+pwidth +' height='+pheight +' >');
    newwindow.document.clear();
    newwindow.focus();
    newwindow.document.writeln('<html> <head> <title>' + title + '<\/title> <\/head> <body bgcolor= \"' + colour + '\"> <center>');
    newwindow.document.writeln('<img src=' + url + ' title=\"' + title + '\" alt=\"' + title  + '\"' + ' width='+pwidth +' height='+pheight +' >');
    newwindow.document.writeln('<\/center> <\/body> <\/html>');
    newwindow.document.close();
    newwindow.focus();
}



function tidy5() {
    if (newwindow && !newwindow.closed) { newwindow.close(); }
}


function error(id,msg){
    //document.getElementById(id+'_').value=
    $("#"+id+'_').css('color','#d30404');

    $('#errormsgID').show();
    $('#errorMsgSpanID').html("Invalid user data for field: '"+msg+"'. Please try again.");

}

function submitQuickSearchForm(){
var i=(document.forms["quickSearchForm"].elements["date"].selectedIndex);
//    var i=document.forms["form1"].elements["quickSearchForm"].selectedIndex;
//    var i=document.getElementById["dateID"].selectedIndex;
    var t=new Date();
    var m0="";
    var m1="";
    switch(i){
        case 0:
            break;
        default:
            m0= t.getFullYear()+"-"+document.forms["quickSearchForm"].elements["date"].options[i].value +"-"+"01";
            m1= t.getFullYear()+"-"+(parseInt(document.forms["quickSearchForm"].elements["date"].options[i].value)+1) +"-"+"01";

        break;
    }
    document.forms["quickSearchForm"].elements["fromDate"].value=m0;
    document.forms["quickSearchForm"].elements["tillDate"].value=m1;
    document.forms["quickSearchForm"].submit();
//    alert(m0);
//    alert(m1);
//    alert(t.getFullYear());

}

function validateMessageForm(){
    if(document.forms["contactForm"].elements["contactName"].value == "")
    {
        $("#label1ID").css("color","red");
        return false;
    }

    $("#label1ID").css("color","white");
    if(document.forms["contactForm"].elements["email"].value == "")
    {
        $("#label2ID").css("color","red");
        return false;
    }

    $("#label2ID").css("color","white");
    if(document.forms["contactForm"].elements["message"].value == "")
    {
        $("#label3ID").css("color","red");
        return false;
    }
    $("#label3ID").css("color","white");

    document.forms["contactForm"].submit();

}

function checkForm(){
var v=document.getElementById('FormnameID').value;
var v1=document.getElementById('surnameID').value;
var v21=document.getElementById('nbrpeopleAdultsID').value;
var v22=document.getElementById('nbrpeopleChildrenID').value;
var v3=document.getElementById('emailID').value;
//var v4=document.getElementById('phoneID').value;
//var v5=document.getElementById('nationalityID').value;

if(v==null){error('FormnameID','name');return false;}
if(v.length==0){error('FormnameID','name'); return false;}
    document.getElementById('FormnameID_').style.color='white';


if(v1==null){error('surnameID','Surname');return false;}
if(v1.length==0){error('surnameID','Surname'); return false;}
    document.getElementById('surnameID_').style.color='white';

if(v21==null){error('nbrpeopleAdultsID','Number of Adults');return false;}
if(v21.length==0){error('nbrpeopleAdultsID','Number of Adults'); return false;}
if(isNaN(v21)){error('nbrpeopleAdultsID','Number of Adults'); return false;}
if(v21<=0 ||v2>5){error('nbrpeopleAdultsID','Number of Adults'); return false;}

if(v22==null){error('nbrpeopleChildrenID','Number of Children');return false;}
if(v22.length==0){error('nbrpeopleChildrenID','Number of Children'); return false;}
if(isNaN(v22)){error('nbrpeopleChildrenID','Number of Children'); return false;}
if(v22<=0 ||v22>5){error('nbrpeopleChildrenID','Number of Children'); return false;}


document.getElementById('nbrpeopleID_').style.color='white';

if(v3==null){error('emailID','Email');return false;}
if(v3.length==0){error('emailID','Email'); return false;}
    document.getElementById('emailID_').style.color='white';

/*
if(v4==null){error('phoneID');return false;}
if(v4.length==0){error('phoneID','Phone'); return false;}
 document.getElementById('phoneID_').style.color='white';
*/


$('#errormsgID').hide();

$('#orderFormID').submit();

}

function downfunc(id){
    if (!isNaN(document.getElementById(id).value) && document.getElementById(id).value >1 )
        document.getElementById(id).value--;


}


function upfunc(id){
    if (!isNaN(document.getElementById(id).value) && document.getElementById(id).value <=48)
        document.getElementById(id).value++ ;


}

