<?php

include('../../config/app.php');
include_once('../controller/BookController.php');


if(isset($_POST['delete']))
{
    $id = validateInput($db->conn, $_POST['delete']);
    $book = new BookController;
    $result = $book->delete($id);
    if($result){
        redirect("Book Deleted Successfully","admin/add_book.php");

    }else{
        redirect("Something Went Wrong","admin/add_book.php");

    }
}

if(isset($_POST['update_book']))
{
    $id = validateInput($db->conn,$_POST['book_id']);
    $inputdata = [

        'callnumber' => validateInput($db->conn,$_POST['callnumber']),
        'booktitle' => validateInput($db->conn,$_POST['booktitle']),
        'publisher' => validateInput($db->conn,$_POST['publisher']),
        'yearofpublication' => validateInput($db->conn,$_POST['yearofpublication']),
        'placeofpublication' => validateInput($db->conn,$_POST['placeofpublication']),
    
    ];

    $book = new BookController;
    $result = $book->update($inputdata, $id);
    if($result){
        redirect("Book Updated Successfully","admin/add_book.php");

    }else{
        redirect("Something Went Wrong","admin/viewbooks.php");

    }
}

if(isset($_POST['submit']))
{
    $inputdata = [

    'callnumber' => validateInput($db->conn,$_POST['callnumber']),
    'booktitle' => validateInput($db->conn,$_POST['booktitle']),
    'publisher' => validateInput($db->conn,$_POST['publisher']),
    'yearofpublication' => validateInput($db->conn,$_POST['yearofpublication']),
    'placeofpublication' => validateInput($db->conn,$_POST['placeofpublication']),

    ];
    
    $book = new BookController;
    $result = $book->create($inputdata);
    if($result){
        redirect("Book Added Successfully","admin/viewbooks.php");
    }else{
        redirect("Something Went wrong","admin/add_book.php");

    }
}


?>