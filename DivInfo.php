<?php


class Info
{

    private $name;
    private $place;
    private $time;
    private $image;
    private $price;
    private $topic;
    private $infomore;
    private $clicks;

    public function __construct($name,$place,$time,$image,$price,$topic,$infomore,$clicksm)
    {
        $this->clicks=$clicksm;
        $this->name=$name;
        $this->place=$place;
        $this->time=$time;
        $this->image=$image;
        $this->price=$price;
        $this->topic=$topic;
        $this->infomore=$infomore;
    }
    public function SetClicks()
    {
        var_dump($this->clicks);
        $this->clicks=intval($this->clicks)+1;
    }

    public function GetClicks()
    {
        return $this->clicks;
    }

    public function GetInfMore()
    {
        return $this->infomore;
    }

    public function GetName()
    {
        return $this->name;
    }
    public function GetPlace()
    {
        return $this->place;
    }
    public function GetTime()
    {
        return $this->time;
    }
    public function GetImage()
    {
        return $this->image;
    }
    public function GetPrice()
    {
        return $this->price;
    }
    public function GetTopic()
    {
        return $this->topic;
    }
}

?>