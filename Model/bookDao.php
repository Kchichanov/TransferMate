<?php
require_once("Database\dbConnect.php");
require_once("Book.php");

class BookDao{


    public static function getBookByAuthor($author){

    
        $pdo = MyDbConnect::initConn();

        $stmt = $pdo->prepare("SELECT * FROM books WHERE author = ?");

        $stmt->execute([$author]);

        if($row = $stmt->fetch(\PDO::FETCH_OBJ)) {

            $book = new Book();
            $book ->setBookName($row->bookname);
            $book ->setAuthorName($row->author);
            
            
        }

        else{

            echo "Something went Wrong Chief";
            

        }

        return $book->getBookName();

    }

    
    
    
    public static function updateBookDB(Book $book){

        $pdo = MyDbConnect::initConn();

        $stmt1 = $pdo->prepare("SELECT * FROM books WHERE author = ?");

        $stmt1->execute([$book->getAuthorName()]);

        // check if record is present and then update
        if($row = $stmt1->fetch(\PDO::FETCH_OBJ)) {
            
            if($row->bookname != $book->getBookName()){

            $additionalBook = $row->bookname . " + " . $book->getBookName();

            $query = $pdo->prepare("UPDATE books SET bookname = ? WHERE author = ?");

            $query->execute([$additionalBook,$row->author]);

            }
            
        }else{

            $stmt = $pdo->prepare("INSERT INTO books (bookname,author) VALUES (?, ?)");
            
            $stmt->execute([$book->getBookName(),$book->getAuthorName()]);


        }




    }

    public static function getAuthorsArray(){


        $pdo = MyDbConnect::initConn();

        $stmt = $pdo->prepare("SELECT author FROM books");

        $stmt->execute();
        $authorArray = array();

        if($row = $stmt->fetchAll(\PDO::FETCH_OBJ)) {

            foreach($row as $i){

                array_push($authorArray,$i->author);    



            }


        }

        else{

            echo "Something went Wrong Chief";
            

        }

        return $authorArray;
    }

    


}
// bookDao::getAuthorsArray();

// bookDao::getBookByAuthor("dummyauthor");



?>