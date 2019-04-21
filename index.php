<!DOCTYPE html>
<html>
    <head>
        <title>Photo Gallery</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/css/uikit.min.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/albums.css" />
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
        <link rel="manifest" href="img/site.webmanifest">
        <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.3/js/uikit-icons.min.js"></script>
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/loader.js"></script>
        <script src="js/albums.js"></script>
        <script src="js/login.js"></script>

    </head>
    <body onload="LoadAlbums(); Setup();">
		
		<div class="loader">
			<div class="uk-flex uk-flex-middle uk-flex-center" uk-height-viewport>
				<div class="container uk-text-center">
					<span uk-spinner="ratio: 6"></span>
				</div>
			</div>
		</div>

        <div id="content" name="_home" hidden>
            <header>
                <div class="uk-flex uk-flex-center uk-flex-middle uk-background uk-background-cover uk-background-center-center ph-background-heading uk-inline" style="background-image: url(img/photos.jpg);" uk-height-viewport>

                    <!-- NAV -->
                    <div class="uk-position-bottom">
                        <nav class="uk-navbar-container uk-navbar-transparent ph-text-white" data-uk-navbar>
                            <div class="uk-navbar-left">
                                <div class="uk-navbar-item">
                                    <a class="uk-logo ph-text-white ph-nav-button ph-a-no-underline ph-text-small" href="#modalLogin" id="loginButton" uk-toggle><span data-uk-icon="icon: user; ratio: 1.3;"></span> LOGIN</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!-- /NAV -->

                    <div class="uk-container">
                        <h1 class="ph-heading-header uk-text-center h-bold">PHOTO GALLERY</h1>
                        <div class="uk-align-center uk-text-center"><a class="uk-button ph-button-white uk-button-large ph-button-white-linked" href="#albums" uk-scroll>Show Albums</a></div>
                    </div>

                </div>
            </header>

            <section class="uk-margin-medium-top" id="albums">
                <h1 class="uk-text-center uk-heading-primary">Albums</h1>
            </section>

            <section class="uk-container uk-margin-medium-top uk-margin-large-bottom">
                <div class="uk-child-width-1-2@m" id="albumcollection" uk-grid>

                </div>
            </section>

            <section id="footer">
                <div class="uk-container uk-text-center">
                    <div class="ph-heading-logo uk-margin-top"><p>&copy; Alex Poscher</p></div>
                </div>
            </section>

            <!-- MODALS -->
            <div id="modalNewAlbum" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title" id="modalNewAlbumTitle">New Album</h2>
                    </div>
                    <form class="uk-form-stacked" action="php/newalbum/" onsubmit="return CheckNewAlbum();" method="POST" id="frmNewAlbum">
                        <div class="uk-modal-body" id="modalNewAlbumBody">
                                <div class="uk-margin">
                                    <div class="uk-form-controls">
                                        <input class="uk-input" type="text" name="txtAlbumName" id="txtAlbumName" onchange="IsAlbumNameUsed();" placeholder="Name">
                                    </div>
                                    <div class="uk-margin-small">
                                        <div class="uk-form-label uk-form-feedback" id="txtAlbumNameFeedback"></div>
                                    </div>
                                </div>
                        </div>
                        <div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-primary" type="submit" id="modalNewAlbumSubmit">Create</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="modalLogin" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title">Login</h2>
                    </div>
                    <form class="uk-form-stacked" action="." onsubmit="return CheckLogin();" method="POST" id="frmLogin">
                        <div class="uk-modal-body">
                            <div class="uk-margin">
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="text" name="txtUsername" id="txtUsername" placeholder="Username">
                                </div>
                                <div class="uk-margin-small">
                                    <div class="uk-form-label uk-form-feedback" id="txtUsernameFeedback"></div>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="password" name="txtPassword" id="txtPassword" placeholder="Password">
                                </div>
                                <div class="uk-margin-small">
                                    <div class="uk-form-label uk-form-feedback" id="txtPasswordFeedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                            <button class="uk-button uk-button-primary" type="submit" id="modalLoginSubmit">Login</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="modalSetup" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-margin-auto-vertical">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title">Setup</h2>
                    </div>
                    <form class="uk-form-stacked" action="." onsubmit="return DoSetup();" method="POST" id="frmSetup">
                        <div class="uk-modal-body">
                            <div class="uk-margin">
                                <p>Set the username and password for your gallery.</p>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="text" name="txtSetupUsername" id="txtSetupUsername" placeholder="Username">
                                </div>
                                <div class="uk-margin-small">
                                    <div class="uk-form-label uk-form-feedback" id="txtSetupUsernameFeedback"></div>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="password" name="txtSetupPassword" id="txtSetupPassword" placeholder="Password">
                                </div>
                                <div class="uk-margin-small">
                                    <div class="uk-form-label uk-form-feedback" id="txtSetupPasswordFeedback"></div>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <div class="uk-form-controls">
                                    <input class="uk-input" type="password" name="txtSetupPasswordRetype" id="txtSetupPasswordRetype" placeholder="Retype Password">
                                </div>
                                <div class="uk-margin-small">
                                    <div class="uk-form-label uk-form-feedback" id="txtSetupPasswordRetypeFeedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-primary" type="submit" id="modalSetupSubmit">Setup</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <script src="js/check.js"></script>
    </body>
</html>