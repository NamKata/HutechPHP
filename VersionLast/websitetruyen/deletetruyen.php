<?php 
include("Controller/Manga.class.php");
$IdManga = $_GET["IdManga"];
$result = Manga::Huykichhoat($IdManga);
if($result)
{
    echo json_encode(array('Success'=>1));
}
else
{
    echo json_encode(array('Error'=>1));
}
?>