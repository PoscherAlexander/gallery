function LoadAlbumData()
{

}

function LoadImages()
{
    var xmlhttp;

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
            document.getElementById('content').style.display = 'block';
        }
    }

    xmlhttp.open('POST','getimages.php',true);
    xmlhttp.send();
}

function LoadAlbums()
{
    var xmlhttp;

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
            document.getElementById('content').style.display = 'block';
        }
    }

    xmlhttp.open('POST','php/GetAlbums.inc.php',true);
    xmlhttp.send();
}