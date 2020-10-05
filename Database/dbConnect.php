<?php 


class MyDbConnect{
    
    public static function initConn(){
    //this is usually split into a separate conn file with the parameters
    $dsn = "pgsql:host=localhost;port=5432;dbname=postgres;user=postgres;password=kur";


    try{

    $PDO = new PDO($dsn);
    
    // test if connected
    if($PDO){
    
        

        return $PDO;


        }



    }catch (PDOException $e){

    // report error message

    echo $e->getMessage();

    }   


 }

}

?>