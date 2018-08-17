<?php
include '../../php/GetAlbumData.inc.php';
error_reporting(E_ALL);
$a = InitAlbum();
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $a->getName(); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.poscher.me/uikit/3.0.0/css/uikit.min.css" />
        <link rel="stylesheet" href="../../css/main.css" />
        <link rel="stylesheet" href="../../css/images.css" />
        <link rel="stylesheet" href="../../css/flex.css" />
        <script src="https://cdn.poscher.me/uikit/3.0.0/js/uikit.min.js"></script>
		<script src="https://cdn.poscher.me/uikit/3.0.0/js/uikit-icons.min.js"></script>
		<!--<script src="https://cdn.poscher.me/jquery/jquery-3.3.1.min.js"></script>-->
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/ionicons@4.3.0/dist/ionicons.js"></script>
		<script src="../../js/main.js"></script>
        <script src="../../js/loader.js"></script>
        <script src="../../js/modals.js"></script>
        <script src="../../js/initComponents.js"></script>
        <script src="../../js/fileUpload.js"></script>
    </head>
	<body onload="LoadImages(); InitComponents();" onkeyup="InitIconLinks();" onmouseup="InitIconLinks();" ontouchend="InitIconLinks();">
		
		<div class="loader">
			<div class="uk-flex uk-flex-middle uk-flex-center" uk-height-viewport>
				<div class="container uk-text-center">
					<span uk-spinner="ratio: 6"></span>
				</div>
			</div>
		</div>
		
		<div class="imageLoader">
			<div class="uk-flex uk-flex-middle uk-flex-center" uk-height-viewport>
				<div class="container uk-text-center">
					<span uk-spinner="ratio: 6"></span>
					<h3>Hang on...</h3>
				</div>
			</div>
		</div>

        <div id="content" name="<?php echo $a->getPath(); ?>">
            <header>
                <div class="uk-flex uk-flex-center uk-flex-middle uk-background uk-background-cover uk-background-center-center ph-background-heading uk-inline" style="background-image: url(<?php echo 'images/' . $a->getThumbnail(); ?>);" uk-height-viewport="offset-bottom:35" id="backgroundpicture">

                    <!-- NAV -->
                    <div class="uk-position-top">
                        <nav class="uk-navbar-container uk-navbar-transparent ph-text-white" data-uk-navbar>
                            <div class="uk-navbar-left">
                                <div class="uk-navbar-item">
                                    <a class="uk-logo ph-text-white" href=""><a class="ph-nav-button ph-a-no-underline" href="../../#albums"><span data-uk-icon="icon: chevron-left; ratio: 1.3;"></span> ALBUMS</a>
                                </div>
                            </div>
                            <div class="uk-navbar-right">
                                <div class="uk-navbar-item">
                                    <a class="uk-logo ph-text-white" href=""><a class="ph-nav-button ph-a-no-underline" href=""><span data-uk-icon="icon: user; ratio: 1.3;"></span> LOGIN</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!-- /NAV -->

                    <div class="ph-header-border">
                        <div class="uk-container">
                            <h1 class="ph-heading-header uk-text-center h-bold" id="albumname"><?php echo $a->getName(); ?></h1>
                        </div>
                    </div>

                    <div class="uk-position-bottom-center">
                        <nav class="uk-navbar-container uk-navbar-transparent" data-uk-navbar>
                            <div class="uk-navbar-left">
                                <div class="uk-margin uk-align-center uk-text-center">
                                    <a class="uk-button ph-button-white uk-button-large ph-button-white-linked" href="#modalAdd" uk-toggle uk-scroll><span data-uk-icon="icon: plus; ratio: 1;"></span> ADD PICTURES</a>
                                    <!--<a class="uk-button ph-button-white uk-button-large ph-button-white-linked uk-hidden@s" href="#albums" uk-scroll><span data-uk-icon="icon: pencil; ratio: 1;"></span> EDIT</a>-->
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>

            <section class="uk-section">
                <div class="uk-container uk-container-expand">
                    <div class="uk-grid uk-grid-small uk-child-width-1-2 uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-match" data-uk-lightbox="toggle:a.uk-position-cover" id="photoarea" data-uk-grid uk-grid="masonry: true">

                    </div>
                </div>
            </section>

            <!-- First Design
            <section class="uk-margin-medium uk-margin-medium-left uk-margin-medium-right">
                <div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" uk-lightbox="animation: slide" id="photoarea" uk-grid>

                </div>
            </section>
            -->

            <!-- FLEXBIN GOOGLE IMAGE SEARCH
            <section class=" uk-margin-medium-top uk-margin-medium-right">
                <div class="flexbin flexbin-margin" uk-grid uk-lightbox="animation: slide" id="photoarea">

                </div>
            </section>
            -->
            <section class="uk-align-center uk-text-center uk-margin-medium-bottom">
                <a class="uk-text-center uk-heading-primary" href="#" uk-totop uk-scroll></a>
            </section>

            <!-- MODALS -->
            <div id="modalDelete" class="uk-flex-top" name="<?php echo $a->getPath(); ?>" uk-modal>
                <div class="uk-modal-dialog uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title" id="modalDeleteTitle">Delete</h2>
                    </div>
                    <div class="uk-modal-body" id="modalDeleteBody">
                        <p id="modalDeleteText"></p>
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                        <button class="uk-button uk-button-default uk-modal-close" type="button" onclick="RemoveHiddenAttribute('lightboxDelete');">Cancel</button>
                        <button class="uk-button uk-button-danger" type="button" onclick="DeleteImage();" id="modalDeleteSubmit">Delete</button>
                    </div>
                </div>
            </div>

            <div id="modalAdd" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title" id="modalDeleteTitle">Add Pictures</h2>
                    </div>
                    <div class="uk-modal-body" id="modalDeleteBody">
                        <div class="js-upload uk-placeholder uk-text-center">
                            <span uk-icon="icon: cloud-upload"></span>
                            <span class="uk-text-middle">Drag & Drop images or </span>
                            <div uk-form-custom>
                                <input type="file" multiple>
                                <span class="uk-link">click here</span>
                            </div>
                            <span class="uk-text-middle"> to select images</span>
                        </div>
                        <progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                        <button class="uk-button uk-button-default uk-modal-close" type="button">Close</button>
                    </div>
                </div>
            </div>

        </div>

        <script>

        </script>

	</body>
</html>