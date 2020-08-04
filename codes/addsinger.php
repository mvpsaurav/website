 <?php
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Insert Data </title>
<link href="index.css" media="all" rel="Stylesheet" type="text/css" />
<link rel="stylesheet" href="css/bootstrap-337.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>  
    <div class="row justify-content-center">
        <br><br><br><br>
    <form action="addsinger.php" method ="POST">
        <h1>Add Singer</h1>
        <input class="user-input" type="varchar" name="singer_name" placeholder="Singer Name">
        <input class="user-input" type="varchar" name="country_id" placeholder="Country">
        <div class="form-group">
        <button type="submit" name="add">ADD</button>
        </div>
        <div class="form-group">
        <button type="submit" name="delete">DELETE</button>
        </div>
    </form>
    </div>
 
    <div class="row justify-content-center">
        <br><br><br><br>
    <form action="addsinger.php" method ="POST">
        <h1>Add Country</h1>
        <input class="user-input" type="varchar" name="country" placeholder="Country Name">
        <div class="form-group">
        <button type="submit" name="add2">ADD</button>
        </div>
        <div class="form-group">
        <button type="submit" name="delete2">DELETE</button>
        </div>
        
    </form>
        <form method="get" action="panel.php">
            <button type="submit">BACK</button>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['add'])){
    $singer_name = $_POST['singer_name'];
    $country_id = $_POST['country_id'];

    $country_id = "SELECT country_id FROM country WHERE country = '$country_id'";
  
    $result = mysqli_query($conn, $country_id);
    $row = mysqli_fetch_assoc($result);
    $country_id = $row['country_id'];
    
    $conn -> query ("INSERT INTO `singer` (`singer_id`, `name`, country_id) VALUES (NULL, '$singer_name', '$country_id')")or die(mysqli_error($conn));;
    mysqli_query($conn, $sql);
    header("Location: addsinger.php?insert=success");
    exit();
}

if (isset($_POST['delete'])){

    $singer_name = $_POST['singer_name'];
    $country_id = $_POST['country_id'];

    $country_id = "SELECT country_id FROM country WHERE country = '$country_id'";
   
  
    $result = mysqli_query($conn, $country_id);
    $row = mysqli_fetch_assoc($result);
    $country_id = $row['country_id'];


    $conn -> query ("DELETE FROM singer WHERE name = '$singer_name' AND country_id = '$country_id' ") or die(mysqli_error($conn));

    header("Location: addsinger.php?delete=success");
    exit();
}



if (isset($_POST['add2'])){
    $country = $_POST['country'];
    
    $conn -> query ("INSERT INTO `country` (`country_id`, country) VALUES (NULL, '$country')")or die(mysqli_error($conn));;
    mysqli_query($conn, $sql);
    header("Location: addsinger.php?insert=success");
    exit();
}

if (isset($_POST['delete2'])){
    $country = $_POST['country'];
    
    $conn -> query ("DELETE FROM country WHERE country = '$country'") or die(mysqli_error($conn));
    mysqli_query($conn, $sql);
    header("Location: addsinger.php?insert=success");
    exit();

}
?>

<br>
<style>
         table, td, th {
            border: 1px solid black;
            width: 10px;
            font-size: 13px;
            text-align: center;

         }
        .html {
        background-color: #2A465B; 
        color:white;
        }
      </style>
    	<table align="center">
          <tr>	
                <td><a class ="html">Id</a></td>
                <td><a class ="html">Country</a></td>
    		</tr>
    <?php
        $sql = "SELECT * FROM country ";
            
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while($row=mysqli_fetch_assoc($result)){
        ?>
            
        <tr>
            
            <td><?php echo $row['country_id']; ?></td>
            <td><?php echo $row['country']; ?></td>

        </tr>
     <?php
            }
        }
    ?>

    </table>
<br>
<br>