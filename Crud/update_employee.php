<?php 
    if(isset($_GET["id"]) && $_GET["id"]){
        include_once("models/Employee.php");
        $empID = $_GET["id"];
        //SEARCH DATABASE FOR EMPLOYE
        $emp = Employee::search($empID);

        if($_SERVER["REQUEST_METHOD"]==="POST"){
            $emp->fname = $_POST["fname"];
            $emp->lname = $_POST["lname"];
            $emp->position = $_POST["position"];

            $emp->update();
        }

    }else{
       header("location:index.php");
       die();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
        <div class="container p-5 bg-light mt-5">
            <p>Employee ID: <strong><?= $empID ?></strong> </p>
        
            <form action="update_employee.php?id=<?= $empID ?>" method="POST">
                <div class="mb-3 mt-3">
                    <label for="fname" class="form-label">Firstname:</label>
                    <input value=<?= $emp->fname ?> type="text" class="form-control" placeholder="Enter Firstname" name="fname">
                </div>
                <div class="mb-3">
                    <label for="lname" class="form-label">Lastname:</label>
                    <input value=<?= $emp->lname ?>  type="text" class="form-control"  placeholder="Enter Lastname" name="lname">
                </div>
                <div class="mb-3">
                    <label for="position" class="form-label">Position:</label>
                    <input value=<?= $emp->position ?>  type="text" class="form-control"  placeholder="Enter Position" name="position">
                </div>
               
                <button type="submit" class="btn btn-primary">Update Employee Record</button>
            </form>
        </div>
</body>
</html>