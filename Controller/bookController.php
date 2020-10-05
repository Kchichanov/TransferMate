<?php
require_once("Model\bookDao.php");



class bookController{

    public static function xmlIntoObj($file) {

    $xml = new XMLReader();

    // path to first file/directory
    $xml->open($file);   


    while($xml->read()){

        

        if($xml->nodeType == XMLReader::ELEMENT && $xml->localName == "book"){

            $currentBook = new Book();
            
    }

        if($xml->nodeType == XMLReader::ELEMENT && $xml->localName == "author"){
            
                $xml->read();
                $currentBook->setAuthorName($xml->value);
                
                

        }


        if($xml->nodeType == XMLReader::ELEMENT && $xml->localName == "name"){

            $xml->read();
            $currentBook->setBookName($xml->value);
            
           

            
            }


        }

        
        
        BookDao::updateBookDB($currentBook);
    
    }

   
}

    // bookController::xmlIntoObj("..\XMLS\HarryPotter.xml");


?>
