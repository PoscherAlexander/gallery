<?php
include 'Album.class.php';
class Gallery {
    private $name;
    private $albums = array();
    private $albumArray;

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }
    public function getAlbums() { return $this->albums; }

    public function __construct($name, $albumArray)
    {
        $this->name = $name;
        $this->albumArray = $albumArray;
        $this->prepareAlbums();
    }

    public function DisplayAlbums()
    {
        foreach($this->albums as $album)
        {
            /*echo '<a class="ph-card-no-underline" href="albums/' . $album->getPath() . '/?n=' . str_replace(' ', '$', $album->getName()) . '&t=' . str_replace(' ', '$', $album->getThumbnail()) . '">
					<div>
						<div class="uk-card uk-card-hover">
							<div class="uk-card-media-top">
								<div class="uk-inline">
									<img src="albums/' . $album->getPath() . '/thumbnails/' . $album->getThumbnail() . '" alt="">
									<div class="uk-overlay uk-overlay-primary uk-position-bottom">
										<h2><span class="uk-margin-small-right" uk-icon="icon: album; ratio: 1.7;"></span> ' . $album->getName() . '</h2>
									</div>
								</div>
							</div>
						</div>
					</div>
				</a>';*/
            echo ' <a class="uk-inline" href="albums/' . $album->getPath() . '">
                            <div class="uk-card uk-card-hover">
                                <div class="uk-background-cover uk-panel ph-height-medium uk-flex uk-flex-center uk-flex-middle uk-margin" style="background-image: url(albums/' . $album->getPath() . '/thumbnails/' . $album->getThumbnail() . ');">
                                    <div class="uk-overlay uk-overlay-primary uk-position-bottom">
										<h2><span class="uk-margin-small-right" uk-icon="icon: album; ratio: 1.7;"></span> ' . $album->getName() . '</h2>
									</div>
                                </div>
							</div>
						</a>';
        }

        echo '<a class="uk-inline" href="#">
                        <div class="uk-card uk-card-hover ph-height-medium" id="newAlbum">
                            <div class="uk-card-body">
                                <div class="uk-position-center">
                                    <p class="uk-text-muted" data-uk-icon="icon: album; ratio: 4;"></p>
                                </div>
                                <div class="uk-overlay uk-overlay-primary uk-position-bottom">
										<h2><span class="uk-margin-small-right" uk-icon="icon: plus; ratio: 1.7;"></span> New Album</h2>
									</div>
                            </div>
                        </div>
                    </a>';
    }

    private function prepareAlbums()
    {
        foreach($this->albumArray as $albumText)
        {
            $this->albums[] = Album::LoadAlbum(file_get_contents('../albums/' . $albumText . '/properties.bin'));
        }
    }
}
?>