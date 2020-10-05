<?php
require_once("Controller\bookController.php");


 class Search{
        
    
    
    public static function searchFolders($directory){


            $glob = glob($directory);

            foreach($glob as $file){

                if(is_dir($file)){
                   
                    
                    search::searchFolders($file ."/*");

                }else{

                    
                    bookController::xmlIntoObj($file);
                    


                }

                


            }

    
    
    }

    

 }

 // give the destination of the start folder
//  search::searchFolders("XMLS/*");


?>