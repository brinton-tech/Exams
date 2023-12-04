<?php

include('../config/app.php');
include_once('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;


include_once('controller/BookController.php');




include('includes/header.php');


?>

<div class="container-fluid px-4">
  
   

    <div class="row mt-4">
        <div class="col-md-12">

            <?php include('../message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Books Edit</h4>
                </div>
                <div class="card-body">

                    <?php
                        if(isset($_GET['id']))
                        {
                            $book_id = validateInput($db->conn, $_GET['id']);
                            $book = new BookController;
                            $result = $book->edit($book_id);

                            if($result)
                            {
                                ?>


                    
                    <form action="codes/bookcode.php" method="post">
                        <input type="hidden" name="book_id" value="<?=$result['id'] ?>">
                        <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Call Number</label>
                            <input type="text " value="<?= $result['callnumber']  ?>" class="form-control" name="callnumber" required>
                        </div>
                            <label for="">Book Title</label>
                            <input type="text" value="<?= $result['booktitle']  ?>" class="form-control" name="booktitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Publisher</label>
                            <input type="text" value="<?= $result['publisher']  ?>" class="form-control" name="publisher" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Year Of Publication</label>
                            <input type="date" value="<?= $result['yearofpublication']  ?>" class="form-control" name="yearofpublication" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Place Of Publication</label>
                            <input type="text" value="<?= $result['placeofpublication']  ?>" class="form-control" name="placeofpublication" required>
                        </div>

                        <div class="mb-3">
                            
                            <input type="submit" value="Update Books" class="btn btn-primary" name="update_book" >
                        </div>
                    </form>

                    
                    <?php
                            }else{
                                echo "<h4>No record found</h4>";
                            }
                        }else{
                            echo "<h4>Something Went Wrong</h4>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>


    
</div>
<?php

include('includes/footer.php');
include('includes/scrits.php');


?>