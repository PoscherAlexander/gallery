$( document ).ready(function() {

    var url;
    if(document.getElementById('content').getAttribute('name') == '_home') url = 'php/IsLoggedIn.inc.php';
    else url = '../../php/IsLoggedIn.inc.php';

    $.ajax({
        type: "POST",
        url: url,
        success: function (ret) {
            if (ret == 0) {
                if(document.getElementById('content').getAttribute('name') == '_home') {
                    document.getElementById('loginButton').innerHTML = '<span data-uk-icon="icon: user; ratio: 1.3;"></span> LOGOUT';
                    document.getElementById('loginButton').setAttribute('href', 'php/logout');
                    setTimeout(function () {
                        document.getElementById('cardNewAlbum').hidden = false;
                    }, 0.1);
                }
                else {
                    document.getElementById('loginButton').innerHTML = '<span data-uk-icon="icon: user; ratio: 1.3;"></span> LOGOUT';
                    document.getElementById('loginButton').setAttribute('href', '../../php/logout');
                    document.getElementById('addPictures').hidden = false;
                    setTimeout(function () {
                        document.getElementById('imageOptionDelete').hidden = false;
                    }, 0.1);
                }
            }
        }
    });
});