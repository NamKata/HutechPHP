<?php 
include("Controller/Chapter.class.php");
$IdChapter = $_GET["IdChapter"];
var_dump($IdChapter);
$result = Chapter::DeleteChuong($IdChapter);
if($result)
{
    echo json_encode(array('Success'=>1));
}
else
{
    echo json_encode(array('Error'=>1));
}
?>