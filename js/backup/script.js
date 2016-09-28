function andrianna(){
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



$(document).ready(function() {
	
	/*slideShow();
	
	function slideShow() {

	//Set the opacity of all images to 0
	$('#gallery a').css({opacity: 0.0});
	
	//Get the first image and display it (set it to full opacity)
	$('#gallery a:first').css({opacity: 1.0});
	
	//Set the caption background to semi-transparent
	$('#gallery .caption').css({opacity: 0.7});

	//Resize the width of the caption according to the image width
	$('#gallery .caption').css({width: $('#gallery a').find('img').css('width')});
	
	//Get the caption of the first image from REL attribute and display it
	$('#gallery .content').html($('#gallery a:first').find('img').attr('rel'))
	.animate({opacity: 0.7}, 400);
	
	//Call the gallery function to run the slideshow, 6000 = change to next image after 6 seconds
	setInterval('gallery()',6000);
	
}

function gallery() {
	
	//if no IMGs have the show class, grab the first image
	var current = ($('#gallery a.show')?  $('#gallery a.show') : $('#gallery a:first'));

	//Get next image, if it reached the end of the slideshow, rotate it back to the first image
	var next = ((current.next().length) ? ((current.next().hasClass('caption'))? $('#gallery a:first') :current.next()) : $('#gallery a:first'));	
	
	//Get next image caption
	var caption = next.find('img').attr('rel');	
	
	//Set the fade in effect for the next image, show class has higher z-index
	next.css({opacity: 0.0})
	.addClass('show')
	.animate({opacity: 1.0}, 1000);

	//Hide the current image
	current.animate({opacity: 0.0}, 1000)
	.removeClass('show');
	
	//Set the opacity to 0 and height to 1px
	$('#gallery .caption').animate({opacity: 0.0}, { queue:false, duration:0 }).animate({height: '1px'}, { queue:true, duration:300 });	
	
	//Animate the caption, opacity to 0.7 and heigth to 100px, a slide up effect
	$('#gallery .caption').animate({opacity: 0.7},100 ).animate({height: '100px'},500 );
	
	//Display the content
	$('#gallery .content').html(caption);
	
	
}*/
    andrianna();
	$('.sidebar-nav>li:last-child').addClass('bot');
	$('.sidebar-nav>li:first-child').addClass('top');
	$('.hot-news ul li:last-child').css("border","none");
	$('.slider').slides({
		effect: 'fade',
		fadeSpeed: 500,
		fadeEasing: 'easeInOutQuad',
		play: 7000,
		pause: 3000,
		hoverPause: false
	});



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
if(location.pathname.substring(1)=="why.php"){
    var unslider=$('.banner').unslider({
        speed: 500,               //  The speed to animate each slide (in milliseconds)
        delay: 3000,              //  The delay between slide animations (in milliseconds)
        complete: function() {},  //  A function that gets called after every slide animation
        keys: true,               //  Enable keyboard (left, right) arrow shortcuts
        dots: true,               //  Display dot navigation
        fluid: false              //  Support responsive design. May break non-responsive designs
    });



    $('.unslider-arrow-prev').click(function() {
//        var fn = this.className.split(' ')[1];
        unslider.data('unslider')['prev']();
        //  Either do unslider.data('unslider').next() or .prev() depending on the className
//        unslider.data('unslider')[fn]();
    });
    $('.unslider-arrow-next').click(function() {
//        var fn = this.className.split(' ')[1];
        unslider.data('unslider')['next']();
        //  Either do unslider.data('unslider').next() or .prev() depending on the className
//        unslider.data('unslider')[fn]();
    });




	
	$('ul.tabs').each(function(){
    // For each set of tabs, we want to keep track of
    // which tab is active and it's associated content
    var $active, $content, $links = $(this).find('a');

    // If the location.hash matches one of the links, use that as the active tab.
    // If no match is found, use the first link as the initial active tab.
    $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
    $active.addClass('active');
	$active.css('background-position','0 0');
	
	
    $content = $($active.attr('href'));

    // Hide the remaining content
    $links.not($active).each(function () {
        $($(this).attr('href')).hide();
		//$(this).css('background-position','-280px 0');
    });

    // Bind the click event handler
    $(this).on('click', 'a', function(e){
		
		
		
        // Make the old tab inactive.
        $active.removeClass('active');
        $content.hide();

        // Update the variables with the new link and content
        $active = $(this);
		$active.css('background-position','0 0');
		
		$links.not($active).each(function () {
        $(this).css('background-position','-280px 0');
		
    });

		
		//alert($active.css('background-image'));
        $content = $($(this).attr('href'));

        // Make the tab active.
        $active.addClass('active');
        $content.show();

        // Prevent the anchor's default click action
        e.preventDefault();
    });
});
}
	
	
//  });



if (document.images) {
				img1 = new Image();
				img2 = new Image();
				img3 = new Image();
				img4 = new Image();
				img1.src="images/05_12-18-2005_elephant_rocks.jpg";
				
				
				
				//document.getElementById('im101').src=img1.src;
				

}



//if (img1.width>0 || img1.complete) alert("ok");
//else alert("NO");


    if(navigator.appName == "Microsoft Internet Explorer")
    {
        //document.getElementById("user")
        if($("#username_id1")){
        $("#username_id1").css("display","inline");
        $("#password_id1").css("display","inline");
        $(".loginForm").css("height","220px");
           $("#password").css("margin-top","15px");
        }
    }



    $('.datepicker').Zebra_DatePicker();

//


 /*$('#calendar1').fullCalendar({

        editable: true,

        events: "json-events.php",

        eventDrop: function(event, delta) {
            alert(event.title + ' was moved ' + delta + ' days\n' +
                '(should probably update your database)');
        },

        loading: function(bool) {
            if (bool) $('#loading').show();
            else $('#loading').hide();
        }

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
//    $("#PleaseWaitPopupID").css("top", $(window).scrollTop() + "px");

    $("#"+popupid).css("top", (($(window).height() - $("#"+popupid).outerHeight()) / 2) +
        $(window).scrollTop() + "px");


    $("#"+popupid).css("left", (($(window).width() - $("#"+popupid).outerWidth()) / 2) +
        $(window).scrollLeft() + "px");



}


function test1(parameter){
    if (window.XMLHttpRequest)xmlhttp=new XMLHttpRequest();
    else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState!=4)return;

        if( xmlhttp.status!=200){

            alert("Error : "+xmlhttp.statusText+"("+xmlhttp.status+")");

            return;
        }

        var str=xmlhttp.responseText;

        alert(str);


    }


    xmlhttp.open("POST","ajax_response.php",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
////// Make the request query...
    alert('just beforeeeee:'+parameter);
    xmlhttp.send("newarea=3");



}






function updateArea(newArea){
    if (window.XMLHttpRequest)xmlhttp=new XMLHttpRequest();
    else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState!=4)return;

        if( xmlhttp.status!=200){

            hideWait('PleaseWaitPopupID');
            alert("Error : "+xmlhttp.statusText+"("+xmlhttp.status+")");
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

    xmlhttp.open("POST","ajax_response.php",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
////// Make the request query...
    xmlhttp.send("newarea="+newArea);

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

