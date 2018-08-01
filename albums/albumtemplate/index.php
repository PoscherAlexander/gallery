<?php
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Album Template</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.poscher.me/uikit/3.0.0/css/uikit.min.css" />
        <link rel="stylesheet" href="../../css/photos.css" />
        <link rel="stylesheet" href="../../css/flex.css" />
        <script src="https://cdn.poscher.me/uikit/3.0.0/js/uikit.min.js"></script>
		<script src="https://cdn.poscher.me/uikit/3.0.0/js/uikit-icons.min.js"></script>
		<!--<script src="https://cdn.poscher.me/jquery/jquery-3.3.1.min.js"></script>-->
		<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
		<script src="../../js/main.js"></script>
		<script src="../../js/loader.js"></script>
    </head>
	<body onload="LoadImages()">
		
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
					<h3>Images are being prepared...</h3>
				</div>
			</div>
		</div>
		
		<header>
			<div class="uk-flex uk-flex-center uk-flex-middle uk-background uk-background-cover uk-background-center-center ph-background-heading" style="background-image: url(../../img/ownidea.jpg);" uk-height-viewport="offset-bottom:35">
				<a class="ph-nav-button ph-a-no-underline" type="button" href="../../#albums"><span uk-icon="icon: chevron-left; ratio: 1.5"></span> ALBUMS</a>
				<div class="ph-header-border">
					<div class="uk-container">
						<h1 class="ph-heading-header uk-text-center h-bold">Album Template</h1>
					</div>
				</div>
			</div>
		</header>
		
		<section class="uk-margin-medium uk-margin-medium-left uk-margin-medium-right">
			<div class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@xl" uk-lightbox="animation: slide" id="photoarea"  uk-grid>
				
			</div>
		</section>

		<!-- FLEXBIN GOOGLE IMAGE SEARCH
		<section class=" uk-margin-medium-top uk-margin-medium-right">
			<div class="flexbin flexbin-margin" uk-grid uk-lightbox="animation: slide" id="photoarea">

			</div>
		</section>
		-->

		<section class="uk-align-center uk-text-center uk-margin-medium-bottom">
			<a class="uk-text-center uk-heading-primary" href="#" uk-totop uk-scroll></a>
		</section>
		
	</body>
</html>