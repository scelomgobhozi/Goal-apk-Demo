<?php 
use Componere\Value;

include "db.php";
include "delete.php"
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
<form action="index.php" method="get">
<input type="submit"   name="click" value="Click Me" id="<?php echo $id = $row['id'] ?>">

</form>

<div class="confirm" id="confirm">

<p>Are sure you would like to delete the goal</p>
<a href="index.php">No</a>

<form action="index.php?id_delete=<?php echo $row['id'] ?>" method="post">
<input type="submit" value="Yes" name="delete">
</form>


</div>


<a href="index.php?id=<?php echo $row['id'] ?>"></a>
<a href="edit.php?id_edit=<?php echo $row['id'] ?>">Edit</a>   

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
</body>
</html>