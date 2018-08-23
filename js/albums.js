$( document ).ready(function() {
    $.ajax({
        type: "POST",
        url: 'php/GetAlbumInfo.inc.php',
        success: function(data){
            var info = data.split(';');
            FireNotification(info);
        }
    });
});

function FireNotification(info)
{
    if(info[0] == 'del')
    {
        UIkit.notification({
            message: '<span uk-icon=\'icon: trash\'></span> Deleted album ' + info[1],
            status: 'primary',
            pos: 'bottom-left',
        });
    }
    else if(info[0] == 'add')
    {
        UIkit.notification({
            message: '<span uk-icon=\'icon: plus\'></span> Created new album ' + info[1],
            status: 'primary',
            pos: 'bottom-left',
        });
    }
}