function updateArea(newArea){
    /*$.ajax({
        url: 'test.php',
        type: 'post',
        data: '',
        cache: false,
        success: function(response){
//            commentFormCaptchaWrapper.html(response);
            alert(response);
        },
        error: function(response){
            alert ("Ajax Error");
        }
    });*/

   if (window.XMLHttpRequest)xmlhttp=new XMLHttpRequest();
    else xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState!=4)return;

        if( xmlhttp.status!=200){

            alert("@Error : "+xmlhttp.statusText+"("+xmlhttp.status+")");
            return;
        }



        var str=xmlhttp.responseText;
        alert(str);



    }




    xmlhttp.open("POST","test.php",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlhttp.send();


}