<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php
        echo '<link href="style1.css" rel="stylesheet"/>';
    ?>
</head>
<body>
<form  method="get" action="olxwithclas.php">
    <div class="main">
        <?php

        include_once("DivInfo.php");
        include ("Main.php");

        if(false===($handle = opendir('imges')))
        {
            echo "SERVER ERROR! We are so sorry! Some problems at our server. Please wait. ";
        }
        else {

            while (false !== ($entry = readdir($handle))) {
                if($entry!="." && $entry!="..") {
                    echo '<img style="width:100px; height: 105px;" src="imges/' . $entry . '" />';
                }
            }
//            echo '<img src="imges/$entry" />';


            $asoc = [
                0 => new Info("iPhone 11 256 GB", "Днепр, Новокодакский", date("j.n.Y h:m:s"),
                    "https://ireland.apollo.olxcdn.com/v1/files/9gqcltubszrt2-UA/image;s=644x461", "24 000 грн.", "true", "Машинка в хорошем состоянии!", 0),

                1 => new Info("купить Айфон | iPhone 8 PLUS 64/256 Neverlock", "Днепр, Центральный", date("j.n.Y h:m:s"),
                    "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQxOhVQMW6FvMWuq07O4k_gt0xvDno_biMbKghOcnTWxFPFZFcSN-l2qjcQOYgokbE9AGBn2_yK&usqp=CAc", "10 699 грн.", "false", "Работает как часы!", 0),

                2 => new Info("Apple iPhone XR 64 GB Red, Original , Neverlock", "Днепр, Центральный", date("j.n.Y h:m:s"),
                    "https://ireland.apollo.olxcdn.com/v1/files/6apwegjhzbo02-UA/image;s=644x461", "12 500 грн.", "true", "Слегка поцарапан корпус, в остальном работает идеально", 0),

                3 => new Info("Купить IPhone 7 | 8 а ещё (плюс X Xr Max XS 5 5 C 6 S ) Телефон Айфон", "Павлоград", date("j.n.Y h:m:s"),
                    "https://ireland.apollo.olxcdn.com/v1/files/krhnb9uji85j-UA/image;s=644x461", "4 999 грн.", "true", "Асболютно исправен.", 0),

                4 => new Info("Смартфон Apple iPhone 5 16Gb neverlock плюс подарок", "Днепр, Чечеловский", date("j.n.Y h:m:s"),
                    "https://ireland.apollo.olxcdn.com/v1/files/c2atrx0nyd8f-UA/image;s=644x461;r=270", "900 грн.", "true", "Продам телефон в хоршем качестве", 0),

                5 => new Info("Iphone 7 plus 128k", "Днепр, Центральный", date("j.n.Y h:m:s"),
                    "https://ireland.apollo.olxcdn.com/v1/files/420zwiwn45jt2-UA/image;s=644x461;r=90", "6 200 грн.", "false", "Новый телефон, практически не использовался", 0),

                6 => new Info("iPhone X 64Gb Белое Серебро", "Днепр, Соборный", date("j.n.Y h:m:s"),
                    "https://ireland.apollo.olxcdn.com/v1/files/lt488mvnsuhx2-UA/image;s=644x461", "11 600 грн.", "true", "Асболютно исправен. Цену лучше не найдете", 0),

                7 => new Info("Продам iPhone 7 Plus 32 gb", "Никополь", date("j.n.Y h:m:s"),
                    "https://ireland.apollo.olxcdn.com/v1/files/xjcjo1n9t3ey1-UA/image;s=644x461", "7 500 грн.", "false", "Покупай", 0),

                8 => new Info("Купить Айфон | iPhone 5 | 5S 16/32/64 Магазин Днепр R-Sim | Neverlock", "Днепр, Амур-Нижнеднепровский", date("j.n.Y h:m:s"),
                    "https://ireland.apollo.olxcdn.com/v1/files/80vpxa8qhh6y2-UA/image;s=644x461", "1 499 грн.", "true", "Просто купи", 0),

                9 => new Info("Смартфон Apple iPhone 8 plus 64GB (256Gb) Space Grey/Gold/Red/Silver", "Никополь", date("j.n.Y h:m:s"),
                    "https://ireland.apollo.olxcdn.com/v1/files/imtpg4bvd33n3-UA/image;s=644x461;r=90", "9 899 грн.", "true", "Купи не пожалеешь", 0),

                10 => new Info("Продам iPhone 6 plus 12gb/ Айфон 6 плюс 12гб Состояние ИДЕАЛ!", "Днепр, Соборный", date("j.n.Y h:m:s"),
                    "https://i1.rozetka.ua/goods/1335538/apple_iphone_6s_plus_128gb_gold_images_1335538059.jpg", "2 850 грн.", "false", "Купи, а то пожалеешь", 0),

                11 => new Info("Iphone Xr красный 128гб", "Днепр, Соборный", date("j.n.Y h:m:s"),
                    "https://ireland.apollo.olxcdn.com/v1/files/khohj6tl0u6y-UA/image;s=644x461", "19 500 грн.", "true", "Купи, он тебя пожалеет", 0)


            ];


            $mn = new Main($asoc, 5);
//        if(isset($_GET['Click']) && $_GET['Click'])
//        {
//Clicks count
//            $mn->Analitics($_GET['Click']);
//        }
            if (isset($_GET['Plage'])) {


                if ($_GET['Plage'] == 'found') {
                    if ($_GET['Hello']) {

                        echo $mn->RenderFind($_GET['Hello']);
                    } else {
                        echo $mn->RenderBy($_COOKIE['last']);
                    }


                } else {
//                    var_dump($_GET['Click']);
//                    if(isset($_GET['Click']))
//                    {
//                        var_dump($_GET['Click']);
//                           $mn->Analitics($_GET['Click']);
//                    }
//                    else {
                    echo $mn->RenderBy($_GET['Plage']);
//                    }
                }

//    for ($cp = 0; $cp < $tmpcp; $cp++) {
//        echo '';
//    }


            } else {


                echo $mn->RenderBy(1);

            }
            //function Paggin()
            //{
            //
            //}
        }
        ?>




    </div>
    <!--    <input type="button" name="Release" onclick="document.write('');" value="Click to Release">-->
    <!--    <button onclick="function first(){-->
    <!--        getElementById('yp1').value=4;-->
    <!--        alert('Hello');-->
    <!--    }" action="ollxcopy.php">There</button>-->
</form>
</body>
</html>