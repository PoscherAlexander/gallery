function ImageLightbox(name)
{
    UIkit.component('lightboxPanel', UIkit.component('lightboxPanel').extend({
        data: {
            template: `<div class="uk-lightbox uk-overflow-hidden">
                        <ul class="uk-lightbox-items"></ul>
                        <div class="uk-lightbox-toolbar uk-position-top uk-text-right uk-transition-slide-top uk-transition-opaque">
                            <a class="uk-icon-link uk-margin-small-left" href="#" data-href="delete.php/?n=` + name + `" uk-icon="icon: trash; ratio: 1.2;"></a>
                            <a class="uk-icon-link uk-margin-small-left" href="#" data-href="share.php/?n=` + name + `" uk-icon="icon: social; ratio: 1.2;"></a>
                            <a class="uk-icon-link uk-margin-small-left" href="#" data-href="download.php/?n=` + name + `" uk-icon="icon: cloud-download; ratio: 1.2;"></a>
                            <button class="uk-lightbox-toolbar-icon uk-close-large uk-margin-small-left" type="button" uk-close></button>
                         </div>
                        <a class="uk-lightbox-button uk-position-center-left uk-position-medium uk-transition-fade" href="#" uk-slidenav-previous uk-lightbox-item="previous"></a>
                        <a class="uk-lightbox-button uk-position-center-right uk-position-medium uk-transition-fade" href="#" uk-slidenav-next uk-lightbox-item="next"></a>
                        <div class="uk-lightbox-toolbar uk-lightbox-caption uk-position-bottom uk-text-center uk-transition-slide-bottom uk-transition-opaque"></div>
                    </div>`
        }
    }));
}