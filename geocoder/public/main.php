<?php


require_once $_SERVER['DOCUMENT_ROOT'] . "/geocoder/src/geocoder/" . "geocoder.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/geocoder/src/viewmodifier/" . "viewmodifier.php";

$geo = new Geocoder();
$view = new ViewModifier();
if(array_key_exists('get_addr', $_GET)) {
         $view->printText($geo->getAddress());
     }
     else if(array_key_exists('get_coord', $_GET)) {
         $view->printText($geo->getCoordinates());
     }


?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<html>

<body>

<form action="" method="get">
    <div>
        <label for="body">Введите адрес:</label>
        <input type="text" name="str" required/>
    </div>
    <div>
        <input type="submit" name="get_coord" value="Отправить">
    </div>

</form>

<form action="" method="get">
    <div>
        <label for="body">Введите координаты:</label>
        <input type="text" name="lat" placeholder="Широта" required/>
        <input type="text" name="lon" placeholder="Долгота" required/>
    </div>
    <div>
        <input type="submit" name = "get_addr" value="Отправить">
    </div>

</form>


</body>
</html>
