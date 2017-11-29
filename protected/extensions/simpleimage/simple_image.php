<?php

class simple_image {

    var $image;
    var $image_type;
    var $image_info;

    function __construct($filename) {
        $this->image_info = $image_info = getimagesize($filename);
        $this->image_type = $image_info[2];
        if ($this->image_type == IMAGETYPE_JPEG) {
            $this->image = imagecreatefromjpeg($filename);
        } elseif ($this->image_type == IMAGETYPE_GIF) {
            $this->image = imagecreatefromgif($filename);
        } elseif ($this->image_type == IMAGETYPE_PNG) {
            $this->image = imagecreatefrompng($filename);
        }
    }

    function save($filename, $image_type = IMAGETYPE_JPEG, $compression = 75, $permissions = null) {
        $waterMark = Yii::app()->params['watermarkImg'];
        $stamp = imagecreatefrompng($waterMark);
// Set the margins for the stamp and get the height/width of the stamp image
        $marge_right = 10;
        $marge_bottom = 50;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

        if ($image_type == IMAGETYPE_JPEG) {


            imagecopymerge($this->image, $stamp, imagesx($this->image) - $sx - $marge_right, imagesy($this->image) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);
            imagejpeg($this->image, $filename, $compression);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagecopymerge($this->image, $stamp, imagesx($this->image) - $sx - $marge_right, imagesy($this->image) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);

            imagegif($this->image, $filename);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagecopymerge($this->image, $stamp, imagesx($this->image) - $sx - $marge_right, imagesy($this->image) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp), 10);

            imagepng($this->image, $filename);
        }
        if ($permissions != null) {
            chmod($filename, $permissions);
        }
    }

    function output($image_type = IMAGETYPE_JPEG) {
        if ($image_type == IMAGETYPE_JPEG) {
            imagejpeg($this->image);
        } elseif ($image_type == IMAGETYPE_GIF) {
            imagegif($this->image);
        } elseif ($image_type == IMAGETYPE_PNG) {
            imagepng($this->image);
        }
    }

    function getWidth() {
        return imagesx($this->image);
    }

    function getHeight() {
        return imagesy($this->image);
    }

    function resizeToHeight($height) {
        $ratio = $height / $this->getHeight();
        $width = $this->getWidth() * $ratio;
        $this->resize($width, $height);
    }

    function resizeToWidth($width) {
        $ratio = $width / $this->getWidth();
        $height = $this->getheight() * $ratio;
        $this->resize($width, $height);
    }

    function scale($scale) {
        $width = $this->getWidth() * $scale / 100;
        $height = $this->getheight() * $scale / 100;
        $this->resize($width, $height);
    }

    function resize($width, $height) {
        $new_image = imagecreatetruecolor($width, $height);
        imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        $this->image = $new_image;
    }

}

?>