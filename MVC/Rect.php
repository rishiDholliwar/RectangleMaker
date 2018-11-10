<?php
class Rect{
    private static $usercount = 0;
    private $width;
    private $height;
    private $color;
    private $id;

    public function __construct($width, $height, $color,$id)
    {
        $this->width = $width;
        $this->height = $height;
        $this->color = $color;
        $this->id = $id;
    }

    public static function getUsercount()
    {
        return self::$usercount;
    }


    public static function setUsercount($usercount)
    {
        self::$usercount = $usercount;
    }

    public function getWidth()
    {
        return $this->width;
    }


    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }




}