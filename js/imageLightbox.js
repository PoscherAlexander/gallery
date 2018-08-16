function ImageLightbox()
{
    UIkit.component('lightboxPanel', UIkit.component('lightboxPanel').extend({
        data: {
            template: `<div class="uk-lightbox uk-overflow-hidden">
                    <ul class="uk-lightbox-items"></ul>
                    <div class="uk-lightbox-toolbar uk-position-top uk-text-right uk-transition-slide-top uk-transition-opaque">
                        <a class="uk-icon-link uk-margin-small-left" href="delete.php/?n=" data-href="delete.php/?n=` + name + `" uk-icon="icon: trash; ratio: 1.2;" id="lightboxDelete"></a>
                        <a class="uk-icon-link uk-margin-small-left" href="#" data-href="share.php/?n=" uk-icon="icon: social; ratio: 1.2;" id="lightboxShare"></a>
                        <a class="uk-icon-link uk-margin-small-left" href="#" data-href="download.php/?n=" uk-icon="icon: cloud-download; ratio: 1.2;" id="lightboxDownload"></a>
                        <button class="uk-lightbox-toolbar-icon uk-close-large uk-margin-small-left" type="button" uk-close></button>
                     </div>
                    <a class="uk-lightbox-button uk-position-center-left uk-position-medium uk-transition-fade" href="#" uk-slidenav-previous uk-lightbox-item="previous" id="lightboxPrevious"></a>
                    <a class="uk-lightbox-button uk-position-center-right uk-position-medium uk-transition-fade" href="#" uk-slidenav-next uk-lightbox-item="next" id="lightboxNext"></a>
                    <div class="uk-lightbox-toolbar uk-lightbox-caption uk-position-bottom uk-text-center uk-transition-slide-bottom uk-transition-opaque"></div>
                </div>`
        }
    }));
}

function SetLightboxValues(name, imagesString)
{
    var images = imagesString.split(';');
    var i = images.indexOf(name);

    for(var c = 0; c < images.length; c++)
    {
        images[c] = images[c].replace(/(\r\n|\n|\r)/gm,"");
    }

    if(i == 0)
    {
        i = images.length;
    }

    document.getElementById('lightboxDelete').setAttribute('href', 'delete.php/?n=' + name);
    document.getElementById('lightboxDelete').setAttribute('data-href', 'delete.php/?n=' + name);
    document.getElementById('lightboxShare').setAttribute('data-href', 'share.php/?n=' + name);
    document.getElementById('lightboxDownload').setAttribute('data-href', 'download.php/?n=' + name);
    document.getElementById('lightboxPrevious').setAttribute('onclick', "SetLightboxValues('" + images[i-1] + "', '" + images.join(';') + "')");
    console.log('success: ' + name);
}

function LoadImageFiles(name)
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
            if(xmlhttp.responseText.indexOf(';') != -1) SetLightboxValues(name, xmlhttp.responseText);
        }
    }

    xmlhttp.open('POST','GetImageFiles.inc.php',true);
    xmlhttp.send();
}
