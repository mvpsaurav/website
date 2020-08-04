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
    <form action="deletepanel.php" method ="POST">
        <h1>Delete Song</h1>
        <input class="user-input" placeholder="Song Name" type="varchar" name="song_name">

        <input class="user-input" placeholder="Singer" type="varchar" name="singer_id">

        <input class="user-input" placeholder="Song Type" type="varchar" name="type_id">
        <div class="form-group">
        <button type="submit" name="delete" href="delete.php">Delete</button>
        </div>
    </form>
        <form method="get" action="panel.php">
            <button type="submit">BACK</button>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['delete'])){
    $song_name = $_POST['song_name'];
    $singer_id = $_POST['singer_id'];
    $type_id = $_POST['type_id'];

    $singer_id = "SELECT singer_id FROM singer WHERE name = '$singer_id'";
    $type_id = "SELECT type_id FROM type WHERE type = '$type_id'";
    
    $result = mysqli_query($conn, $singer_id);
    $row = mysqli_fetch_assoc($result);
    $singer_id = $row['singer_id'];
    $result = mysqli_query($conn, $type_id);
    $row = mysqli_fetch_assoc($result);
    $type_id = $row['type_id'];

    
    $conn -> query ("DELETE FROM songs WHERE song_name = '$song_name' AND singer_id = '$singer_id' AND type_id ='$type_id'") or die(mysqli_error($conn));
    mysqli_query($conn, $sql);
    header("Location: index.php?insert=success");
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
                <td><a class ="html" >Song</a></td>
                <td><a class ="html" >Singer</a></td>
              <td><a class ="html" >Type</a></td>
    		</tr>

        
    <?php
        $sql = "SELECT * FROM songs, singer, type
        WHERE songs.singer_id = singer.singer_id
        AND songs.type_id = type.type_id";          
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['song_name']; ?></td>
            <td><?php echo $row['type']; ?></td>
            
        </tr>
     <?php
            }
        }
    ?>
    </table>
 