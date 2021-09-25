<?php 
use Componere\Value;

include "db.php";
include "delete.php"

?>
<script>

window.addEventListener('load', function() {
    
 let numberOfConfirmBtn = document.querySelectorAll(".confirm").length;

 for(var i =0; i<numberOfConfirmBtn; i++){
  document.querySelectorAll(".confirm")[i].addEventListener("click", change);  
 }
    
    
 function change(){
  console.log("I have been clicked");   
  document.getElementById("con-container").style.display = "inherit"; 
}   
    
});


    
</script>
<?php
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form action="index.php" method="POST">
<input type="submit" value="showall" name="showall" >    
</form>


<?php

if(isset($_POST['showall'])){


// try{
    
$dns = 'mysql:host='.$host.';dbname'.$dbname;
$pdo = new PDO($dns,$username,$password);
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM  $dbname.goal_list";
$stmt = $pdo->prepare($sql);
$stmt->execute();
// return $stmt;
// }catch(PDOException $th){
// echo "Connection failed: ".$th->getMessage();
// }


    
        
while ($row = $stmt->fetch()) { ?>
<h1> <?php  echo "Were underway";  ?> </h1> 
<form action="index.php" method="POST">
<input type="submit"   name="click" value="Click Me" id="<?php echo $id = $row['id'] ?>">

</form>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you would like to delete the Goal
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="delete.php?del_id=<?php echo $id = $row['id']?>" method="post">

        <input type="submit"  name="delete"  class="btn btn-primary">
      
      </form>
      </div>
    </div>
  </div>
</div>
















<button class="confirm" id="confirm">Delete</button>
<a href="index.php?id=<?php echo $row['id'] ?>"></a>
<a href="edit.php?id_edit=<?php echo $row['id'] ?>">Edit</a>  


<!-- <form action="delete.php?goal_id=<phP echo $row['id'] ?>" method="post">  <input type="submit" value="Delete" name="delete"></form> -->
<h1> <?php echo $row['id'];  ?>  </h1>
<h1> <?php echo $row['header'];  ?>  </h1>

<?php }    
    
}
// elseif(isset($_GET['id'])){
// $id = $_GET['id'];
// $dns = 'mysql:host='.$host.';dbname'.$dbname;
// $pdo = new PDO($dns,$username,$password);
// $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $sql = "DELETE FROM  $dbname.goal_list WHERE id= :id LIMIT 1";
// $stmt = $pdo->prepare($sql);
// $stmt->execute();

// }



else{
echo "Nothing is happening";     
}




$number = cal_days_in_month(CAL_GREGORIAN, 2, 2021);
echo $number;
 ?>  

 <script src="index.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>