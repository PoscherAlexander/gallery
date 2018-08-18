$( document ).ready(function() {
    if(getParameterByName('del') == 0 && getParameterByName('n'))
    {
        UIkit.notification({
            message: '<span uk-icon=\'icon: trash\'></span> Deleted ' + getParameterByName('n').replace('$', ' '),
            status: 'primary',
            pos: 'bottom-left',
        });
    }
    else if(getParameterByName('del') == 1)
    {
        UIkit.notification({
            message: '<span uk-icon=\'icon: warning\'></span> Something went wrong. Please try again!',
            status: 'danger',
            pos: 'bottom-left',
        });
    }
    else if(getParameterByName('up') == 0)
    {
        UIkit.notification({
            message: '<span uk-icon=\'icon: upload\'></span> Images are uploaded',
            status: 'primary',
            pos: 'bottom-left',
        });
    }
});

function OpenDeleteModal(name)
{
    name = name || 0;
    var caption;

    if(name == 0) {
        caption = getCaption();
    } else {
        caption = name;
    }
    var title = document.getElementById('modalDeleteTitle');
    var text = document.getElementById('modalDeleteText');
    var submit = document.getElementById('modalDeleteSubmit');

    title.innerHTML = 'Delete Image';
    text.innerHTML = 'Are you sure you want to permanently delete ' + caption + '?';
    submit.setAttribute('onclick', 'DeleteImage(\'' + caption + '\')');

    UIkit.modal('#modalDelete').show();
}

function DeleteImage(file)
{
    UIkit.modal('#modalDelete').hide();

    var album = document.getElementById('modalDelete').getAttribute('name');

    $.ajax({
        data: 'delname=' + file + '&album=' + album,
        url: '../../php/DeleteImage.inc.php',
        method: 'POST',
        success: function(ret) {
            var url = window.location.href;
            if(ret == 1 || ret == 2)
            {
                if(url.indexOf('#') > -1) {
                    url = url.substr(0, url.indexOf('#'));
                }
                if (url.indexOf('?') > -1){
                    url = url.substr(0, url.indexOf('?'));
                    url += '?del=1';
                }else{
                    url += '?del=1';
                }
            }
            else
            {
                if(url.indexOf('#') > -1) {
                    url = url.substr(0, url.indexOf('#'));
                }
                if (url.indexOf('?') > -1){
                    url = url.substr(0, url.indexOf('?'));
                    url += '?del=0&n=' + file.replace(' ', '$');
                }else{
                    url += '?del=0&n=' + file.replace(' ', '$');
                }
            }
            RemoveHiddenAttribute('lightboxDelete');
            window.location = url;
        }
    });
}

function getCaption()
{
    return document.getElementById('lightboxCaption').innerHTML;
}

function RemoveHiddenAttribute(id)
{
    if(document.getElementById(id) != null) document.getElementById(id).removeAttribute('hidden');
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}