function LoadImages()
{
    var xmlhttp;
    var url;

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {           
            document.getElementById("photoarea").innerHTML=xmlhttp.responseText;
            $('.imageLoader').fadeOut('slow');
        }
    }

    xmlhttp.open('POST','getimages.php',true);
    xmlhttp.send();
}

function LoadAlbums()
{
    var xmlhttp;
    var url;

    if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("albumcollection").innerHTML=xmlhttp.responseText;
            $('.albumLoader').fadeOut('slow');
        }
    }

    xmlhttp.open('POST','php/GetAlbums.inc.php',true);
    xmlhttp.send();
}