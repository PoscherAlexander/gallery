$(window).on('load',function() {

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
                    document.getElementById('loginButton').setAttribute('onclick', 'Logout(\'home\');');
                    document.getElementById('loginButton').removeAttribute('href');
                }
                else {
                    document.getElementById('loginButton').innerHTML = '<span data-uk-icon="icon: user; ratio: 1.3;"></span> LOGOUT';
                    document.getElementById('loginButton').setAttribute('onclick', 'Logout(\'album\');');
                    document.getElementById('loginButton').removeAttribute('href');
                    document.getElementById('addPictures').hidden = false;
                }
            }
        }
    });
});

function Logout(dir)
{
    var url;
    if(dir == 'home')
    {
        url = 'php/Logout.inc.php';
    }
    else
    {
        url = '../../php/Logout.inc.php';
    }

    $.ajax({
        type: "POST",
        url: url,
        success: function(){
            location.reload();
        }
    });
}

