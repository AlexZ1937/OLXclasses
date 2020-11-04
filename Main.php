<?php

include_once("RenderPage.php");
class Main
{
    private $renders=[];
    private $pageSize;

    public function RenderFind($str_zapros)
    {

        $out='<input style=" width: 300px; height: 40px;" type="text" name="Hello" ><button class="btnPages" name="Plage" value="found">Find</button><br><br>';
        $fin='<button class="btnPages" style="width: 200px;" name="Plage" value="' . 1 . '">Return to Main</button>';
        $mas='';
        $count=0;
//        setcookie("last", "Found");
        for($y=0;$y<count($this->renders);$y++)
        {
            for($j=0;$j<count($this->renders[$y]->GetMas());$j++)
            {
                if (stristr($this->renders[$y]->GetMas()[$j]->GetInfo()->GetName(), $str_zapros) === FALSE)
                {

                }
                else
                {
                    $count++;
                    $mas=$mas.$this->renders[$y]->GetMas()[$j]->Render();
                }
            }

        }
        if($count>0) {
            return $out.$mas.$fin;
        }
        return $out.'<h1>Zero!</h1>'.$fin;

    }

//    public function Analitics($name)
//    {
//        $tmpf='';
//        $info='';
//        $tmpkj=0;
//        $tmpky=0;
//        for($y=0;$y<count($this->renders);$y++)
//        {
//            for($j=0;$j<count($this->renders[$y]->GetMas());$j++)
//            {
//                if (stristr($this->renders[$y]->GetMas()[$j]->GetInfo()->GetName(), $name) === FALSE)
//                {
//
//                }
//                else
//                {
//
//                    $tmpkj=$j;
//                    $tmpky=$y;
////                    $info=new Info($this->renders[$y]->GetMas()[$j]->GetInfo()->GetName(),$this->renders[$y]->GetMas()[$j]->GetInfo()->GetPlace(),
////                        $this->renders[$y]->GetMas()[$j]->GetInfo()->GetTime(),$this->renders[$y]->GetMas()[$j]->GetInfo()->GetImage(),
////                        $this->renders[$y]->GetMas()[$j]->GetInfo()->GetPrice(),$this->renders[$y]->GetMas()[$j]->GetInfo()->GetTopic(),
////                        $this->renders[$y]->GetMas()[$j]->GetInfo()->GetInfUrl(),$this->renders[$y]->GetMas()[$j]->GetInfo()->GetClicks());
//                    $info=$this->renders[$y]->GetMas()[$j]->GetInfo();
//                    $info->SetClicks();
//                    var_dump($info);
//                    $this->renders[$y]->GetMas()[$j]=
//                        new Info($info->GetName(),$info->GetPlace(),
//                            $info->GetTime(),$info->GetImage(),
//                            $info->GetPrice(),$info->GetTopic(),
//                            $info->GetInfUrl(),$info->GetClicks());
//                    var_dump( $this->renders[$y]->GetMas()[$j]->GetInfo());
//                    break;
//                }
//            }
//        }
//        var_dump( $this->renders[$tmpky]->GetMas()[$tmpkj]->GetInfo());
//
//
//        $file = fopen('analizis.txt', 'r') or die("Не удалось создать файл");
//        while(!feof($file)) {
//            $tmpf=$tmpf.fgets($file);
//        }
//        $tmpf = str_replace($name.(($info->GetClicks()>1)?(' '.($info->GetClicks()-1)):''), $name.' '.$info->GetClicks(), $tmpf);
//        fclose($file);
//        $file = fopen('analizis.txt', 'w') or die("Не удалось создать файл");
//        fwrite($file, $tmpf."\n");
//        fclose($file);
//    }

    public function __construct($masInfo,$pageSize)
    {
        if($pageSize>0)
        {
            $this->pageSize = $pageSize;
        }
        else
        {
            $this->pageSize = 5;
        }

        $counter=intval(count($masInfo)/$pageSize);

        for($r=0;$r<$counter;$r++)
        {
            $tmpmas=[];
            for($t=0;$t<$this->pageSize;$t++)
            {
                array_push($tmpmas,$masInfo[$r*$this->pageSize+$t]);
            }
            array_push($this->renders,new RenderPage($tmpmas));
        }
        if($counter*$this->pageSize<count($masInfo))
        {
            $tmpeho=count($masInfo)-$counter*$this->pageSize;
            $tmpmas=[];
            for($j=$counter*$this->pageSize;$j<$counter*$this->pageSize+$tmpeho;$j++)
            {
                array_push($tmpmas,$masInfo[$j]);
            }
            array_push($this->renders,new RenderPage($tmpmas));
        }




    }


    public function RenderBy($pagenum)
    {
        $out='<input style=" width: 300px; height: 40px;" type="text" name="Hello" ><button class="btnPages" name="Plage" value="found">Find</button><br><br>';


                $pagenum=intval($pagenum);
            if ($pagenum > count($this->renders) || $pagenum == 0) {
                return $out.'<h1>ERROR 404! PAGE NOT FOUND!</h1><button style="width: 200px;" name="Plage" value="' . $_COOKIE['last'] . '">Return Last Page</button>';
            }
            setcookie("last", $pagenum);

            $tmph = '';
            for ($k = 0; $k < count($this->renders); $k++) {
                $tmph = $tmph . '<button class="btnPages" name="Plage" value="' . ($k + 1) . '">' . ($k + 1) . '</button>';
            }

            return $out.$this->renders[$pagenum - 1]->Render() . $tmph;



    }



}