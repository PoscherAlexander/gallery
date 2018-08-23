$( document ).ready(function() {

    var albumname = document.getElementById('content').getAttribute('name');
    $.ajax({
        type: "POST",
        url: '../../php/GetImageInfo.inc.php',
        data: {album: albumname},
        success: function(data){
            var info = data.split(';');
            FireNotification(info);
        }
    });
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
        success: function() {
            RemoveHiddenAttribute('lightboxDelete');
            location.reload();
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

function FireNotification(info)
{
    if(info[0] == 'del')
    {
        UIkit.notification({
            message: '<span uk-icon=\'icon: trash\'></span> Deleted ' + info[2],
            status: 'primary',
            pos: 'bottom-left',
        });
    }
    else if(info[0] == 'add')
    {
        UIkit.notification({
            message: '<span uk-icon=\'icon: upload\'></span> Images are uploaded',
            status: 'primary',
            pos: 'bottom-left',
        });
    }
}

function DownloadFile(file)
{
    var album = document.getElementById('content').getAttribute('name');

    $.ajax({
        type: "POST",
        url: '../../php/Download.inc.php',
        data: {file: file, album: album},
        success: function(){
            ;
        }
    });
}