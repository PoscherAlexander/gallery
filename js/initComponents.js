function InitComponents()
{
    UIkit.component('lightboxPanel', UIkit.component('lightboxPanel').extend({
        data: {
            template: `<div class="uk-lightbox uk-overflow-hidden">
                    <ul class="uk-lightbox-items"></ul>
                    <div class="uk-lightbox-toolbar uk-position-top uk-text-right uk-transition-slide-top uk-transition-opaque">
                        <a class="uk-icon-link uk-margin-small-left" onclick="OpenDeleteModal();" uk-icon="icon: trash; ratio: 1.2;" id="lightboxDelete" uk-toggle></a>
                        <a class="uk-icon-link uk-margin-small-left" href="#" uk-icon="icon: social; ratio: 1.2;" id="lightboxShare" hidden></a>
                        <a class="uk-icon-link uk-margin-small-left" href="#" uk-icon="icon: cloud-download; ratio: 1.2;" id="lightboxDownload"></a>
                        <button class="uk-lightbox-toolbar-icon uk-close-large uk-margin-small-left" type="button" uk-close></button>
                     </div>
                    <a class="uk-lightbox-button uk-position-center-left uk-position-medium uk-transition-fade" href="#" uk-slidenav-previous uk-lightbox-item="previous" onclick="InitIconLinks();" id="lightboxPrevious"></a>
                    <a class="uk-lightbox-button uk-position-center-right uk-position-medium uk-transition-fade" href="#" uk-slidenav-next uk-lightbox-item="next" onclick="InitIconLinks();" id="lightboxNext"></a>
                    <div class="uk-lightbox-toolbar uk-lightbox-caption uk-position-bottom uk-text-center uk-transition-slide-bottom uk-transition-opaque" id="lightboxCaption"></div>
                </div>`
        }
    }));

    UIkit.component('modal', UIkit.component('modal').extend({

    }));
}

function InitIconLinks()
{
    setTimeout(function(){
        try {
            var caption = document.getElementById('lightboxCaption').innerHTML;
            //alert(caption);
            document.getElementById('lightboxDelete').setAttribute('onclick', 'OpenDeleteModal(\'' + caption + '\');');
            document.getElementById('lightboxShare').setAttribute('data-href', 'share.php/?n=' + caption);
            document.getElementById('lightboxDownload').setAttribute('data-href', 'download.php/?n=' + caption);
        }
        catch {
            ;
        }
    }, 0.00001);
}

