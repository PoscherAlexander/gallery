<?php
include 'Thumbnail.inc.php';
class Image {
	
	private $name;
	private $type;
	private $fileName;
	
	public function getName() { return $this->name; }
	public function setName($name) { $this->name = $name; }
	public function getType() { return $this->type; }
	public function setType($type) { $this->type = $type; }
	public function getFileName() { return $this->fileName; }
	public function setFileName($filename) { $this->fileName = $filename; }
	
	function __construct($name, $type, $fileName) {
		$this->name = $name;
		$this->type = $type;
		$this->fileName = $fileName;

		makeThumbnail('images/'.$fileName, 'thumbnails/'.$fileName, 800);
	}
}
?>