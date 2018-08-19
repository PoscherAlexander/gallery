function CheckNewAlbum()
{
    var albumname = document.getElementById('txtAlbumName').value;
    if(!ValidAlbumCharacters(albumname))
    {
        document.getElementById("txtAlbumNameFeedback").innerHTML = 'Please don\'t use invalid characters for your album. (e.g.: !+*#@.)';
        document.getElementById('txtAlbumName').className += ' uk-form-danger';
        return false;
    }
}

function ValidAlbumCharacters(name)
{
    var re = /^[a-zA-Z0-9\s]*$/;
    return re.test(name);
}