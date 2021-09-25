<?php 

include "db.php"; 



// $GLOBALS['id'];
$id = "";




if (isset($_GET['id_edit'])) {

  $id_edit = $_GET['id_edit'];

  try{

    $dns = 'mysql:host='.$host.';dbname'.$dbname;
    $pdo = new PDO($dns,$username,$password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql2 ="SELECT * FROM $dbname.goal_list WHERE id = ?";

    $stmt2 = $pdo->prepare($sql2);
    //echo  gettype($stmt2);
    $stmt2->execute([$id_edit]);


   $info = $stmt2->fetch();
   $id = $info['id'];
  
    
    
    
    } catch(PDOException $e) {
      
        echo $e->getMessage();
      }
        
    
}


if(isset($_POST['update'])){
echo "Hello";

echo $id;


$newHeader = $_POST['header2'];
$newBody = $_POST['description2'];
$newDate = $_POST['date2'];



try{
// $id = $_GET['id'];
$dns = 'mysql:host='.$host.';dbname'.$dbname;
$pdo = new PDO($dns,$username,$password);
$pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE $dbname.goal_list SET header = :newHeader, body = :newBody , due_date = :newDate WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id'=> $id, 'newHeader'=>$newHeader, 'newBody'=>$newBody,'newDate'=>$newDate]);




} catch(PDOException $e) {
  
    echo $e->getMessage();

  }

?>
<script>
alert('You have successfully updated your goal');

</script>

<?php

header("location:index.php");     
}



 




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    

<form action="edit.php?id_edit=<?php echo $id ?>" method="POST">

<div> 
<label for="">Header</label>
<input type="text" name="header2" placeholder="header">
</div>  

<div>

<label for="">Description</label>

</div>
<textarea name="description2" id="" cols="30" rows="10" placeholder=""></textarea>

<div>
<label for="">Due date</label>
<input type="date" name="date2" id="">


</div>

<input type="submit" value="Submit" name="update">
</form>


</body>
</html>