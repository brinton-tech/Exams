<?php

include('../config/app.php');
include_once('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;




include('includes/header.php');


?>

<div class="container-fluid px-4">
  
   

    <div class="row mt-4">
        <div class="col-md-12">

            <?php include('../message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Books Add</h4>
                </div>
                <div class="card-body">
                    
                    <form action="codes/bookcode.php" method="post">
                        <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Call Number</label>
                            <input type="text " class="form-control" name="callnumber" required>
                        </div>
                            <label for="">Book Title</label>
                            <input type="text" class="form-control" name="booktitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Publisher</label>
                            <input type="text" class="form-control" name="publisher" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Year Of Publication</label>
                            <input type="date" class="form-control" name="yearofpublication" required>
                        </div>
                        <div class="mb-3">
                            <label for="">Place Of Publication</label>
                            <input type="text" class="form-control" name="placeofpublication" required>
                        </div>

                        <div class="mb-3">
                            
                            <input type="submit" class="btn btn-primary" name="submit" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
</div>
<?php

include('includes/footer.php');
include('includes/scrits.php');


?>