<?php
include_once "DivInfo.php";
include_once "RenderMini.php";

class FullrenDesc
{
    public $info;


    public function __construct(){}


    function RenderFullDesc($arr)
    {


        echo '<div style="margin-left: 5%; margin-top: 2%;">
           
                <div style="width: 500px;height: 400px;">
                    <img src="'.$arr->GetImage().'" style="width: 360px;height: 400px;" />'
            .($arr->GetTopic()=="true"?'<div style="position: absolute;background: aqua;width: 85px;margin-top: -44px; font-size: 38px;">ТОП</div>':'<div></div>').'
                </div> 
                <div><h2>'.$arr->GetName().'</h2></div>
                <div><h2>'.$arr->GetPrice().'</h2></div>
                <br>  
                     <div><h3>Описaние: </h3></div>
                     <div><h4>'.$arr->GetInfMore().'</h4></div>
                     <br>
   
                <div><h3>'. $arr->GetPlace() .' '.$arr->GetTime().'</h3></div><br><br>
                    <a style="width: 200px; float: left;height: 40px;  font-size: 25px;  background-color: darkgray;"
                   href="olxwithclas.php?Plage=1">Return to Main</a> </div>
                   ';

    }
}

function ShowAd()
{
    $asoc=[
        0=>new Info("iPhone 11 256 GB", "Днепр, Новокодакский", date("j.n.Y h:m:s"),
            "https://ireland.apollo.olxcdn.com/v1/files/9gqcltubszrt2-UA/image;s=644x461", "24 000 грн.","true","Машинка в хорошем состоянии!",0),

        1=>new Info("купить Айфон | iPhone 8 PLUS 64/256 Neverlock","Днепр, Центральный",date("j.n.Y h:m:s"),
            "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQxOhVQMW6FvMWuq07O4k_gt0xvDno_biMbKghOcnTWxFPFZFcSN-l2qjcQOYgokbE9AGBn2_yK&usqp=CAc", "10 699 грн.","false","Работает как часы!",0),

        2=>new Info("Apple iPhone XR 64 GB Red, Original , Neverlock", "Днепр, Центральный",date("j.n.Y h:m:s"),
            "https://ireland.apollo.olxcdn.com/v1/files/6apwegjhzbo02-UA/image;s=644x461","12 500 грн.","true","Слегка поцарапан корпус, в остальном работает идеально",0),

        3=>new Info("Купить IPhone 7 | 8 а ещё (плюс X Xr Max XS 5 5 C 6 S ) Телефон Айфон","Павлоград",date("j.n.Y h:m:s"),
            "https://ireland.apollo.olxcdn.com/v1/files/krhnb9uji85j-UA/image;s=644x461","4 999 грн.","true","Асболютно исправен.",0),

        4=>new Info("Смартфон Apple iPhone 5 16Gb neverlock плюс подарок","Днепр, Чечеловский",date("j.n.Y h:m:s"),
            "https://ireland.apollo.olxcdn.com/v1/files/c2atrx0nyd8f-UA/image;s=644x461;r=270","900 грн.","true","Продам телефон в хоршем качестве", 0),

        5=>new Info("Iphone 7 plus 128k","Днепр, Центральный",date("j.n.Y h:m:s"),
            "https://ireland.apollo.olxcdn.com/v1/files/420zwiwn45jt2-UA/image;s=644x461;r=90","6 200 грн.","false","Новый телефон, практически не использовался",0),

        6=>new Info("iPhone X 64Gb Белое Серебро","Днепр, Соборный",date("j.n.Y h:m:s"),
            "https://ireland.apollo.olxcdn.com/v1/files/lt488mvnsuhx2-UA/image;s=644x461","11 600 грн.","true","Асболютно исправен. Цену лучше не найдете",0),

        7=>new Info("Продам iPhone 7 Plus 32 gb","Никополь",date("j.n.Y h:m:s"),
            "https://ireland.apollo.olxcdn.com/v1/files/xjcjo1n9t3ey1-UA/image;s=644x461","7 500 грн.","false","Покупай",0),

        8=>new Info("Купить Айфон | iPhone 5 | 5S 16/32/64 Магазин Днепр R-Sim | Neverlock","Днепр, Амур-Нижнеднепровский",date("j.n.Y h:m:s"),
            "https://ireland.apollo.olxcdn.com/v1/files/80vpxa8qhh6y2-UA/image;s=644x461","1 499 грн.","true","Просто купи",0),

        9=>new Info("Смартфон Apple iPhone 8 plus 64GB (256Gb) Space Grey/Gold/Red/Silver","Никополь",date("j.n.Y h:m:s"),
            "https://ireland.apollo.olxcdn.com/v1/files/imtpg4bvd33n3-UA/image;s=644x461;r=90","9 899 грн.","true","Купи не пожалеешь",0),

        10=>new Info("Продам iPhone 6 plus 12gb/ Айфон 6 плюс 12гб Состояние ИДЕАЛ!","Днепр, Соборный",date("j.n.Y h:m:s"),
            "https://i1.rozetka.ua/goods/1335538/apple_iphone_6s_plus_128gb_gold_images_1335538059.jpg","2 850 грн.","false","Купи, а то пожалеешь",0),

        11=>new Info("Iphone Xr красный 128гб","Днепр, Соборный",date("j.n.Y h:m:s"),
            "https://ireland.apollo.olxcdn.com/v1/files/khohj6tl0u6y-UA/image;s=644x461","19 500 грн.","true","Купи, он тебя пожалеет",0)




    ];
    $info='';
    $ad=new FullrenDesc();
    if(isset($_GET['id']))
    {
        foreach ($asoc as $key=>$value)
        {
            if($value->GetName()== $_GET['id'])
            {
                $info=new  Info($value->GetName(),$value->GetPlace(),$value->GetTime(),$value->GetImage(),$value->GetPrice(),$value->GetTopic(),$value->GetInfMore(),$value->GetClicks());
                //$info=$value;
                break;
            }
        }
        $ad->RenderFullDesc($info);
    }

}
ShowAd();
?>
