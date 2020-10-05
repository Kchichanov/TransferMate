<?php 


class Book {

    private $id;
    private $authorName;
    private $bookName;


    public function __construct(){

    }

    // public function __construct($authorName, $bookName){

    //     $this->authorName = $authorName;
    //     $this->bookName = $bookName;

    // }

   
    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setAuthorName($author)
    {
        $this->authorName = $author;
    }


    public function setBookName($book)
    {
        $this->bookName = $book;
    }


  
    public function getAuthorName()
    {
        return $this->authorName;
    }


    public function getBookName()
    {
        return $this->bookName;
    }


}
    

?>