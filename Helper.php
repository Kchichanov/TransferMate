<?php
require_once("Model/bookDao.php");
require_once("search.php");

if(isset($_POST["start"])){


    search::searchFolders("XMLS/*");
    

    $arr=bookDao::getAuthorsArray();
    $obj=json_encode($arr, JSON_UNESCAPED_UNICODE);
    echo $obj;
    

}elseif(isset($_POST["value"])){

    $res=bookDao::getBookByAuthor($_POST["value"]);

    echo json_encode($res);

    


}






?>