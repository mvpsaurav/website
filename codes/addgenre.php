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
    <form action="addgenre.php" method ="POST">
        <h1>Add Genre</h1>
        <input class="user-input" type="varchar" name="genre" placeholder="Genre">
        <div class="form-group">
        <button type="submit" name="add">ADD</button>
        </div>
        <div class="form-group">
        <button type="submit" name="delete">DELETE</button>
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
    $genre = $_POST['genre'];
    
    $conn -> query ("INSERT INTO `genre` (`genre_id`, genre) VALUES (NULL, '$genre')")or die(mysqli_error($conn));;
    mysqli_query($conn, $sql);
    header("Location: addgenre.php?insert=success");
    exit();
}

if (isset($_POST['delete'])){
    $genre = $_POST['genre'];
    
    $conn -> query ("DELETE FROM genre WHERE genre = '$genre'") or die(mysqli_error($conn));
    mysqli_query($conn, $sql);
    header("Location: addgenre.php?insert=success");
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
                <td><a class ="html">Genre</a></td>
    		</tr>
    <?php
        $sql = "SELECT * FROM genre";
            
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while($row=mysqli_fetch_assoc($result)){
        ?>
            
        <tr>
            
            <td><?php echo $row['genre_id']; ?></td>
            <td><?php echo $row['genre']; ?></td>

        </tr>
     <?php
            }
        }
    ?>

    </table>