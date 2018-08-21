function CheckNewAlbum()
{
    var albumname = document.getElementById('txtAlbumName').value;
    if(IsFieldEmpty(albumname))
    {
        document.getElementById("txtAlbumNameFeedback").innerHTML = 'Please enter an album name.';
        document.getElementById('txtAlbumName').className += ' uk-form-danger';
    }
    else if(!ValidAlbumCharacters(albumname))
    {
        document.getElementById("txtAlbumNameFeedback").innerHTML = 'Please don\'t use invalid characters for your album. (e.g.: !+*#@.)';
        document.getElementById('txtAlbumName').className += ' uk-form-danger';
        return false;
    }
    else
    {
        if(IsAlbumNameUsed()) return false;
        return true;
    }
}

function ValidAlbumCharacters(name)
{
    var re = /^[a-zA-Z0-9\s]*$/;
    return re.test(name);
}

function IsFieldEmpty(content)
{
    return content == '';
}

function IsAlbumNameUsed() {
    var name = document.getElementById('txtAlbumName').value;
    if (name == "") {
        document.getElementById("txtAlbumName").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(parseInt(this.responseText) == 1)
                {
                    document.getElementById("txtAlbumNameFeedback").innerHTML = 'This album already exists.';
                    document.getElementById('txtAlbumName').className += ' uk-form-danger';
                    document.getElementById(('modalNewAlbumSubmit')).disabled = true;
                    return false;
                }
                else if(parseInt(this.responseText) == 0)
                {
                    document.getElementById("txtAlbumNameFeedback").innerHTML = '';
                    document.getElementById('txtAlbumName').classList.remove("uk-form-danger");
                    document.getElementById(('modalNewAlbumSubmit')).disabled = false;
                }
            }
        };
        xmlhttp.open("POST","php/CheckAlbumNames.inc.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send("n=" + name);
    }
}