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

function CheckLogin()
{
    var username = document.getElementById('txtUsername').value;
    var password = document.getElementById('txtPassword').value;

    var dir = document.getElementById('content').getAttribute('name');

    if(dir == '_home') var url = 'php/CheckLogin.inc.php';
    else url = '../../php/CheckLogin.inc.php';

    if(IsFieldEmpty(username))
    {
        document.getElementById("txtUsernameFeedback").innerHTML = 'Please enter a username.';
        document.getElementById('txtUsername').className += ' uk-form-danger';
        return false;
    }
    else if(IsFieldEmpty(password))
    {
        document.getElementById("txtPasswordFeedback").innerHTML = 'Please enter a password.';
        document.getElementById('txtPassword').className += ' uk-form-danger';
        return false;
    }
    else if(!ValidUsernameCharacters(username))
    {
        document.getElementById("txtUsernameFeedback").innerHTML = 'Please don\'t use invalid characters. (e.g.: !+*#@.)';
        document.getElementById('txtUsername').className += ' uk-form-danger';
        return false;
    }

    $.ajax({
        type: "POST",
        url: url,
        data: {user: username, passwd: password},
        success: function(ret){
            if(ret == 0)
            {
                document.getElementById('frmLogin').submit();
                return true;
            }
            else
            {
                document.getElementById("txtUsernameFeedback").innerHTML = 'Username or password is wrong.';
                document.getElementById('txtUsername').className += ' uk-form-danger';
                document.getElementById('txtPassword').className += ' uk-form-danger';
                return false;
            }
        }
    });

    return false;
}

function DoSetup()
{
    var username = document.getElementById('txtSetupUsername').value;
    var password = document.getElementById('txtSetupPassword').value;
    var passwordRetype = document.getElementById('txtSetupPasswordRetype').value;

    document.getElementById("txtSetupUsernameFeedback").innerHTML = '';
    document.getElementById('txtSetupUsername').classList.remove('uk-form-danger');
    document.getElementById("txtSetupPasswordFeedback").innerHTML = '';
    document.getElementById('txtSetupPassword').classList.remove('uk-form-danger');
    document.getElementById("txtSetupPasswordRetypeFeedback").innerHTML = '';
    document.getElementById('txtSetupPasswordRetype').classList.remove('uk-form-danger');

    var url = 'php/Setup.inc.php';

    if(IsFieldEmpty(username))
    {
        document.getElementById("txtSetupUsernameFeedback").innerHTML = 'Please enter a username.';
        document.getElementById('txtSetupUsername').className += ' uk-form-danger';
        return false;
    }
    else if(IsFieldEmpty(password))
    {
        document.getElementById("txtSetupPasswordFeedback").innerHTML = 'Please enter a password.';
        document.getElementById('txtSetupPassword').className += ' uk-form-danger';
        return false;
    }
    else if(IsFieldEmpty(passwordRetype))
    {
        document.getElementById("txtSetupPasswordRetypeFeedback").innerHTML = 'Please retype your password.';
        document.getElementById('txtSetupPasswordRetype').className += ' uk-form-danger';
        return false;
    }
    else if(!ValidUsernameCharacters(username))
    {
        document.getElementById("txtSetupUsernameFeedback").innerHTML = 'Please don\'t use invalid characters. (e.g.: !+*#@.)';
        document.getElementById('txtSetupUsername').className += ' uk-form-danger';
        return false;
    }
    else if(!PasswordMatch(password, passwordRetype))
    {
        document.getElementById("txtSetupPasswordFeedback").innerHTML = 'The Passwords don\'t match.';
        document.getElementById('txtSetupPassword').className += ' uk-form-danger';
        document.getElementById('txtSetupPasswordRetype').className += ' uk-form-danger';
        return false;
    }

    $.ajax({
        type: "POST",
        url: url,
        data: {username: username, password: password},
        success: function(){
            ;
        }
    });


}

function ValidAlbumCharacters(name)
{
    var re = /^[a-zA-Z0-9\s]*$/;
    return re.test(name);
}

function ValidUsernameCharacters(name)
{
    var re = /^[a-zA-Z0-9]*$/;
    return re.test(name);
}

function PasswordMatch(password1, password2)
{
    return password1 == password2;
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