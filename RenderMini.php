<?php

include_once("DivInfo.php");
class RenderMini
{
    private $Info;

    public function __construct($Jutr)
    {
        $this->Info=new Info($Jutr->GetName(),$Jutr->GetPlace(),$Jutr->GetTime(),$Jutr->GetImage(),$Jutr->GetPrice(),$Jutr->GetTopic(),$Jutr->GetInfMore(),$Jutr->GetClicks());
    }

    public function Render()
    {

        return '


                <div class="sell"><a style="text-decoration: none; color: black;" href="blockinfo.php?id='.$this->Info->GetName().'">
                <img class="im" src="'.$this->Info->GetImage().'"/>'.($this->Info->GetTopic()=="true"?'<div class="top">ТОП</div>':'<div></div>').'
                <div style="font-size: 21px; float: left; width: 40%;">'.$this->Info->GetName().'</div>
                <div style="margin-left: 70%;">'.$this->Info->GetPrice().'</div>
                <div style="font-size: 19px; margin-top: 150px; margin-left: 145px;">'. $this->Info->GetPlace() .' '.$this->Info->GetTime().'</div></a>
            </div></br></br>';
    }


    public function GetInfo()
    {
        return $this->Info;
    }
}
//<a style="text-decoration: none; color: black;" name="Click" method="get" action="olxwithclas.php"  value="'.$this->Info->GetName().'"href="">
?>




<!--Количество кликов!!!!!!!!!!!!!!!!!!!!!!!!!   <button class="sell" name="Click" value="'.$this->Info->GetName().'">-->
<!--    <img class="im" style="margin-left: -5px;" src="'.$this->Info->GetImage().'"/>'.($this->Info->GetTopic()=="true"?'<div style="position: absolute; margin-left: -5px; margin-top: 174px" class="top">ТОП</div>':'<div></div>').'-->
<!--    <div style=" margin-left: 5px;text-align: left; font-size: 21px; float: left; width: 40%;">'.$this->Info->GetName().'</div>-->
<!--    <div style="margin-left: 70%;">'.$this->Info->GetPrice().'</div>-->
<!--    <div style=" text-align: left; font-size: 19px; margin-top: 150px; margin-left: 190px;">'. $this->Info->GetPlace() .' '.$this->Info->GetTime().'</div></a>-->
<!--</button>-->
