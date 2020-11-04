<?php

include_once ("RenderMini.php");
class RenderPage
{
    private $masMini=[];

    public function __construct($masInfo5)
    {
        for($h=0;$h<count($masInfo5);$h++)
        {
            array_push($this->masMini,new RenderMini($masInfo5[$h]));
        }
//        $this->masMini=[new RenderMini($masInfo5[0]),new RenderMini($masInfo5[1]),new RenderMini($masInfo5[2]),new RenderMini($masInfo5[3]),new RenderMini($masInfo5[4])];
    }

    public function Render()
    {

        $forreturn='';
        for ($k = 0; $k < count($this->masMini); $k++) {
//            var_dump($this->masMini[$k]->Render());

            $forreturn=$forreturn.$this->masMini[$k]->Render();

        }

        return $forreturn;
    }

    public function GetMas()
    {
        return $this->masMini;
    }
}

?>