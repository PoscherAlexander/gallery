$( document ).ready(function() {
    if(getParameterByName('del') == 1 && getParameterByName('n'))
    {
        UIkit.notification({
            message: '<span uk-icon=\'icon: trash\'></span> Deleted ' + getParameterByName('n'),
            pos: 'bottom-left',
        });
    }
});

function OpenDeleteModal()
{
    var caption = getCaption();
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

    var url = window.location.href;
    if(url.indexOf('#') > -1) {
        url = url.substr(0, url.indexOf('#'));
    }
    if (url.indexOf('?') > -1){
        url = url.substr(0, url.indexOf('?'));
        url += '?del=1&n=' + file.replace(' ', '$');
    }else{
        url += '?del=1&n=' + file.replace(' ', '$');
    }
    RemoveHiddenAttribute('lightboxDelete');
    window.location = url;
}

function getCaption()
{
    return document.getElementById('lightboxCaption').innerHTML;
}

function RemoveHiddenAttribute(id)
{
    document.getElementById(id).removeAttribute('hidden');
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