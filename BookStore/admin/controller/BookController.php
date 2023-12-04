<?php

class BookController
{
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function index()
    {
        $bookQuery = "SELECT * FROM bookstore";
        $result = $this->conn->query($bookQuery);
        if($result->num_rows){
            return $result;
        }else{
            return false;
        }
    }
    public function create($inputdata)
    {
        $data = "'" . implode ("','",$inputdata) . "'";
        

        $bookQuery = "INSERT INTO bookstore(callnumber,booktitle,publisher,yearofpublication,placeofpublication) VALUES ($data)";
        $result = $this->conn->query($bookQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function edit($id)
    {
        $book_id = validateInput($this->conn, $id);
        $bookQuery = "SELECT * FROM bookstore WHERE id='$book_id' LIMIT 1";
        $result = $this->conn->query($bookQuery);
        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data;
        }else{
            return false;
        }
    }

    public function update($inputdata, $id)
    {
        $book_id = validateInput($this->conn, $id);
        $callnumber = $inputdata['callnumber'];
        $booktitle = $inputdata['booktitle'];
        $publisher = $inputdata['publisher'];
        $yearofpublication = $inputdata['yearofpublication'];
        $placeofpublication = $inputdata['placeofpublication'];

        $bookUpdateQuery = "UPDATE bookstore SET callnumber='$callnumber', booktitle='$booktitle', publisher='$yearofpublication', placeofpublication='$placeofpublication' WHERE id='$book_id' LIMIT 1";
        $result = $this->conn->query($bookUpdateQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $book_id = validateInput($this->conn,$id);
        $bookdeleteQuery = "DELETE FROM bookstore WHERE id='$book_id' LIMIT 1";
        $result = $this->conn->query($bookdeleteQuery);

        if($result){
            return true;
        }else{
            return false;
        }
    }
}

?>