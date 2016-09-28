function updateArea(newArea){
	alert(newArea);

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



        var str=xmlhttp.responseText;
        alert(str);



    }




    xmlhttp.open("POST","ajax_response.php",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
////// Make the request query...

    xmlhttp.send("newarea="+newArea);
//    xmlhttp.send("skata");

}