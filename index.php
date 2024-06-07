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
    <div class="container mt-5">
        <?php  include("widget/nav.php"); ?>
        <?php include_once("models/Employee.php") ?>
        <?php include("widget/new_employee.php") ?>
        <div class="list">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Position</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- START MAO NI ATONG E LOOP UNYA -->
                <?php
                    $result  = Employee::getAll();

                    if($result->num_rows > 0){
                         while($row = $result->fetch_assoc()){
                ?>
                    <tr> 
                        <td><?=$row["ID"]?></td>
                        <td><?=$row["LNAME"]?></td>
                        <td><?=$row["FNAME"]?></td>
                        <td><?=$row["POSITION"]?></td>
                        <td>
                            <a href="update_employee.php?id=<?=$row["ID"]?>" class="btn btn-info">Edit</a>
                            <a href="delete_employee.php?id=<?=$row["ID"]?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                  <?php
                        } //CLOSING SA WHILE
                    } // CLOSING SA IF
                  ?>
                <!-- END MAO NI ATONG E LOOP UNYA -->
            </table>
        </div>
    </div>
</body>
</html>