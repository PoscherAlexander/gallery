<?php
include 'Image.class.php';
class Album {

    private $name;
    private $path;
    private $thumbnail;
    private $files;
    private $images = array();
    private $errorMessage;
    private $validExtensions = array('jpg', 'png', 'gif');

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }
    public function getPath() { return $this->path; }
    public function setPath($path) { $this->path = $path; }
    public function getThumbnail() { return $this->thumbnail; }
    public function setThumbnail($thumbnail) { $this->thumbnail = $thumbnail; }
    public function getFiles() { return $this->files; }
    /*public function setFiles($files) { $this->files = $files; }*/
    public function getImages() { return $this->images; }
    /*public function setImages($images) { $this->images = $images; }*/
    public function getErrorMessage() { return $this->errorMessage; }
    public function setErrorMessage($errorMessage) { $this->errorMessage = $errorMessage; }

    public function __construct($files = '')
    {
        if($files !== '') {
            foreach ($files as $file) {
                if ($this->isFile($file) && in_array(strtolower($this->getFileExtension($file)), $this->validExtensions)) $this->files[] = $file;
            }
        }
    }

    private function getImagesOfAlbum() {
        foreach($this->files as $file) {
            if(in_array(strtolower($this->getFileExtension($file)), $this->validExtensions)) {
                $this->images[] = new Image($this->getFileName($file), $this->getFileExtension($file), $file);
            }
        }
        return $this->checkImageArray();
    }

    public function DisplayImages()
    {
        $check = $this->getImagesOfAlbum();

        if($check == 0) {
            foreach ($this->images as $image) {
                /*echo ' <a class="uk-inline" href="images/' . $image->getFileName() . '" data-caption="' . $image->getName() . '">
							<div class="uk-background-cover uk-panel uk-height-medium uk-flex uk-flex-center uk-flex-middle uk-margin" style="background-image: url(thumbnails/' . $image->getFileName() . ');">
							</div>
						</a>';*/
                /*echo '<a class="uk-inline" href="images/' . $image->getFileName() . '" data-caption="' . $image->getName() . '">
                        <img src="thumbnails/' . $image->getFileName() . '" alt="">
                      </a>';*/
                echo '<div>
							<div class="uk-card uk-card-default uk-card-small">
								<div class="uk-card-media-top">
									<div class="uk-inline-clip uk-transition-toggle uk-light">
										<img src="thumbnails/' . $image->getFileName() . '">
										<div class="uk-transition-fade uk-position-cover uk-overlay uk-overlay-primary uk-flex uk-flex-center uk-flex-middle">
											<div data-uk-margin class="uk-transition-slide-bottom-small">
												<span data-uk-icon="icon: plus; ratio: 1.3"></span>
											</div>
										</div>
										<a data-caption="' . $image->getName() . '" href="images/' . $image->getFileName() . '" onclick="ImageLightbox(\'' . $image->getFileName() . '\',\'' . implode(";", $this->getFiles()) . '\')" class="uk-position-cover"></a>
									</div>
									
								</div>
								<div class="uk-card-header uk-visible@s">
									<div class="uk-grid-small uk-flex uk-flex-middle" data-uk-grid>
										<div class="uk-width-expand">
											<h5 class="uk-margin-remove-bottom">' . $image->getName() . '</h5>
										</div>
										<div class="uk-width-auto">
											<div class="uk-inline">
												<a data-uk-icon="icon:more-vertical"></a>
												<div data-uk-dropdown="mode: click; pos:top-right">
													<ul class="uk-nav uk-dropdown-nav ph-text-black">
														<li><a href="#"><span data-uk-icon="icon: trash; ratio: 0.9"></span> Delete</a></li>
														<li><a href="#"><span data-uk-icon="icon: info; ratio: 0.9"></span> Details</a></li>
														<li><a href="#"><span data-uk-icon="icon: social; ratio: 0.9"></span> Share</a></li>
														<li><a href="#"><span data-uk-icon="icon: cloud-download; ratio: 0.9"></span> Download</a></li>
													</ul>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>';
            }
        }
        else {
            echo '<h1 class="uk-text-muted uk-width-1-1 uk-text-center">' . $this->errorMessage . '</h1>';
        }
    }

    public static function LoadAlbum($data)
    {
         return unserialize($data);
    }

    private function checkImageArray()
    {
        if(count($this->images) == 0) {
            $this->errorMessage = 'This album is empty.';
            return 1; //no images in folder
        }
        else if (count($this->images) < 0) {
            $this->errorMessage = 'An unknown error occurred.';
            return 2; //unknown error
        }
        else {
            return 0; //no errors
        }
    }

    private function getFileExtension($file)
    {
        $data = explode('.', $file);
        return $data[1];
    }

    private function getFileName($file)
    {
        $data = explode('.', $file);
        return $data[0];
    }

    private function isFile($file)
    {
        if(strpos($file, '.') === false) return false;
        return true;
    }
}
?>
