<?php

class Ship
{
    // Properties
    public $length;
    public $hitCount;
    public $hitBefore;
    public $sunk;

    function __construct($size)
    {
        $this->length = $size;
        $this->hitCount = 0;
        $this->hitBefore = false;
        $this->sunk = false;
    }

    public function __toString()
    {
        return "Length: " . $this->length . ", Hits: " . $this->hitCount ." Sunk: " . ($this->sunk ? 'Yes <br>' : 'No <br>');
    }

    // Methods
    function setLength($length)
    {
        $this->length = $length;
    }

    function getLength()
    {
        return $this->length;
    }

    function setHitCount($count)
    {
        $this->hitCount = $count;
    }

    function getHitCount()
    {
        return $this->hitCount;
    }

    function setHitBefore($isHit)
    {
        $this->hitBefore = $isHit;
    }

    function getHitBefore()
    {
        return $this->hitBefore;
    }

    function setSunk($isSunk)
    {
        $this->sunk = $isSunk;
    }

    function getSunk()
    {
        return $this->sunk;
    }
}

?>