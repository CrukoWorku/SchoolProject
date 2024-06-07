<?php 
    if(isset($_POST["submit"])){
        $newEmployee = new Employee($_POST["lname"],$_POST["fname"],$_POST["position"]);
        $newEmployee->save();
    }

?>

<form class="p-3 mb-3 bg-info" action="" method="POST">
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Enter Firstname..." name="fname">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Enter Lastname" name="lname">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Enter Position" name="position">
    </div>
    <div class="col">
        <input type="submit" value="Create new employee" name="submit" class="btn btn-primary">
    </div>
  </div>
</form>