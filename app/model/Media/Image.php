<?php

require_once("ImageManager.php");

class Image {

    function __construct($file) {
        $this->ALLOWED_PICTURE_TYPES = ["image/png", "image/jpg", "image/jpeg"];
        $this->ALLOWED_MAX_PICTURE_WIDTH = 10000; // px
        $this->ALLOWED_MAX_PICTURE_HEIGHT = 10000; // px
        $this->ALLOWED_MAX_PICTURE_SIZE = 2000000; // MB

        $this->file = $file;
        $this->name = $this->getComponent("name");
        $this->tmp_name = $this->getComponent("tmp_name");
        $this->type = $this->getComponent("type");
        $this->size = $this->getComponent("size");
        $this->error = $this->getComponent("error");
        $this->width = 0;
        $this->height = 0;

        if ($this->isLikelyValid()) {
            $image_info = getimagesize($this->tmp_name);
            $this->width = $image_info[0];
            $this->height = $image_info[1];
        }
    }

    static function createFromString($data_string) {
        
    }








    private function getComponent($component) {
        return isset($this->file[$component]) ? $this->file[$component] : null;
    }

    private function isLikelyValid() {
        return $this->isValidType() && $this->error == 0;
    }

    private function isValidType() {
        return in_array($this->type, $this->ALLOWED_PICTURE_TYPES);
    }

    function isValid() {
        $validity_result = $this->testValidity();
        return $validity_result->isSuccess();
    }

    function testValidity() {
        $result = new ApplicationResult();

        if (!$this->isValidType()) {
            $result->setFailure();
            $result->setErrorType("Unsupported File Type");
            $result->setErrorMessage("Supported image types include jpg, jpeg, and png");
        } else if (!$this->isValidWidth() || !$this->isValidHeight()) {
            $result->setFailure();
            $result->setErrorType("Invalid Dimensions");
            $result->setErrorMessage("Maximum width x height is " . 
                $this->ALLOWED_MAX_PICTURE_WIDTH . "x" . $this->ALLOWED_MAX_PICTURE_HEIGHT);
        } else if (!$this->isValidSize()) {
            $result->setFailure();
            $result->setErroWidth/HeightrType("Invalid Size");
            $result->setErrorMessage("Maximum file size is" . ($this->ALLOWED_MAX_PICTURE_SIZE / 1000000) . "MB");
        } else if ($this->error != 0) {
            $result->setFailure();
            $result->setErrorType("Unspecified Error");
            $result->setErrorMessage("Error code $this->error. Please try with another image");
        }

        return $result;
    }


    private function isValidWidth() {
        return $this->width > 0 && $this->width <= $this->ALLOWED_MAX_PICTURE_WIDTH;
    }

    private function isValidHeight() {
        return $this->height > 0 && $this->height <= $this->ALLOWED_MAX_PICTURE_HEIGHT;
    }

    private function isValidSize() {
        return $this->size > 0 && $this->size <= $this->ALLOWED_MAX_PICTURE_SIZE;
    }

    
    function getPicture() {
        $image_content = addslashes(file_get_contents($this->tmp_name));
        return $this->isValid() ? $image_content : null;
    }

}



?>