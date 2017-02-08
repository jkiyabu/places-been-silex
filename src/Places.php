<?php
class Place
{
    private $place_name;

    function __construct($place_name)
    {
        $this->place_name = $place_name;
    }

    function setPlace_name($new_place_name)
    {
        $this->place_name = (string) $new_place_name;
    }

    function getPlace_name()
    {
        return $this->place_name;
    }

    function save()
    {
        array_push($_SESSION['places'], $this);
    }

    static function getAll()
    {
        return $_SESSION['places'];
    }

    static function deleteAll()
    {
        $_SESSION['places'] = array();
    }
}
?>
