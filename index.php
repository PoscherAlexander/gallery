<!DOCTYPE html>
<html>
    <head>
        <title>Photo Gallery</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.poscher.me/uikit/3.0.0/css/uikit.min.css" />
        <link rel="stylesheet" href="css/albums.css" />
        <script src="https://cdn.poscher.me/uikit/3.0.0/js/uikit.min.js"></script>
		<script src="https://cdn.poscher.me/uikit/3.0.0/js/uikit-icons.min.js"></script>
		<!--<script src="https://cdn.poscher.me/jquery/jquery-3.3.1.min.js"></script>-->
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/loader.js"></script>
    </head>
    <body onload="LoadAlbums()">
		
		<div class="loader">
			<div class="uk-flex uk-flex-middle uk-flex-center" uk-height-viewport>
				<div class="container uk-text-center">
					<span uk-spinner="ratio: 6"></span>
				</div>
			</div>
		</div>
		
		<header>
			<div class="uk-flex uk-flex-center uk-flex-middle uk-background uk-background-cover uk-background-center-center ph-background-heading" style="background-image: url(img/forest.jpg);" uk-height-viewport>
				<div>
					<div class="uk-container">
						<h1 class="ph-heading-header uk-text-center h-bold">My Photo Gallery</h1>
						<div class="uk-align-center uk-text-center"><a class="uk-button ph-button-white uk-button-large ph-button-white-linked" href="#albums" uk-scroll>Show Albums</a></div>
					</div>
				</div>
			</div>
		</header>
		
		<section class="uk-margin-medium-top" id="albums">		
			<h1 class="uk-text-center uk-heading-primary">Albums</h1>	
		</section>
		
		<section class="uk-container uk-margin-medium-top uk-margin-large-bottom">
			<div class="uk-child-width-1-2@m" id="albumcollection" uk-grid>
				<a class="ph-card-no-underline" href="albums/albumtemplate/">
					<div>
						<div class="uk-card uk-card-hover">
							<div class="uk-card-media-top">
								<div class="uk-inline">
									<img src="img/ownidea.jpg" alt="">
									<div class="uk-overlay uk-overlay-primary uk-position-bottom">
										<h2><span class="uk-margin-small-right" uk-icon="icon: album; ratio: 1.7;"></span> Album 1</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>
				<div>
					<div class="uk-card uk-card-hover">
						<div class="uk-card-media-top">
							<div class="uk-inline">
								<img src="img/cliff-login.jpg" alt="">
								<div class="uk-overlay uk-overlay-primary uk-position-bottom">
									<h2><span class="uk-margin-small-right" uk-icon="icon: album; ratio: 1.7;"></span>  Album 2</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div>
					<div class="uk-card uk-card-hover">
						<div class="uk-card-media-top">
							<div class="uk-inline">
								<img src="img/login.jpg" alt="">
								<div class="uk-overlay uk-overlay-primary uk-position-bottom">
									<h2><span class="uk-margin-small-right" uk-icon="icon: album; ratio: 1.7;"></span>  Album 3</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div>
                    <div class="uk-card uk-card-hover">
                        <div class="uk-card-media-top">
                            <div class="uk-inline">
                                <img src="img/forest.jpg" alt="">
                                <div class="uk-overlay uk-overlay-primary uk-position-bottom">
                                    <h2><span class="uk-margin-small-right" uk-icon="icon: album; ratio: 1.7;"></span>  Album 4</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</section>
    </body>
</html>