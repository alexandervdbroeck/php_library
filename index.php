<?php
include_once "lib/lib.php";

function PrintNavBar()
{
    //navbar items ophalen

    $data = GetData("select * from menu order by men_order");

    // welke webpagina is actief
    $filePath = basename($_SERVER['SCRIPT_NAME']);
    $items_temp = LoadTemplate('nav_items');
    // nav bar items samenstellen
    foreach ( $data as $row => $value )
    {

        if($data[$row]['nav_path'] == $filePath){
            $data[$row]['active'] = "active";
        }else{
            $data[$row]['active'] = "";
        }

    }
    $items = ReplaceContent($data,$items_temp);
    $temp = LoadTemplate('nav');
    print str_replace("@@navitems@@",$items,$temp);
}

?>
<!DOCTYPE html>
<html>
<head lang="nl">
    <meta charset="UTF-8">
    <title>Spaintastic</title>
    <link href="./css/opmaak.css" rel="stylesheet">
    <meta name="viewport"  content="width=device-width, initial-scale=1">
</head>
<body>
<header>
    <h1>basic</h1>
</header>

<?php
PrintNavBar();
?>

<main>

</main>
<aside>

</aside>

<footer>

</footer>



</body></html>
