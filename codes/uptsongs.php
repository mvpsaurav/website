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
    <form action="uptsongs.php" method ="POST">
        <h1>Update Song Chord And Level</h1>
        <input class="user-input" placeholder="Song Name" type="varchar" name="song_name">

        <input class="user-input" placeholder="Singer" type="varchar" name="singer_id">

        <input class="user-input" placeholder="Song Type" type="varchar" name="type_id">
        <input class="user-input" placeholder="New Chord Id" type="varchar" name="chord_id">
        <input class="user-input" placeholder="Updated Song Level" type="varchar" name="diff_id">
        <div class="form-group">
        <button type="submit" name="update" href="uptsongs.php">UPDATE</button>
        </div>
    </form>
        <form method="get" action="panel.php">
            <button type="submit">BACK</button>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['update'])){
    $song_name = $_POST['song_name'];
    $singer_id = $_POST['singer_id'];
    $type_id = $_POST['type_id'];
    $chord_id = $_POST['chord_id'];
    $diff_id = $_POST['diff_id'];

    
    $song_name = "SELECT song_name FROM songs WHERE song_name = '$song_name'";
    $singer_id = "SELECT singer_id FROM singer WHERE name = '$singer_id'";  
    $type_id = "SELECT type_id FROM type WHERE type = '$type_id'";
    $diff_id = "SELECT diff_id FROM difficulty WHERE dif = '$diff_id'";


    
    $result = mysqli_query($conn, $song_name);
    $row = mysqli_fetch_assoc($result);
    $song_name = $row['song_name'];
    $result = mysqli_query($conn, $singer_id);
    $row = mysqli_fetch_assoc($result);
    $singer_id = $row['singer_id'];
    $result = mysqli_query($conn, $type_id);
    $row = mysqli_fetch_assoc($result);
    $type_id = $row['type_id'];
    $result = mysqli_query($conn, $diff_id);
    $row = mysqli_fetch_assoc($result);
    $diff_id = $row['diff_id'];

    
    $conn -> query ("UPDATE songs SET chord_id = '$chord_id', diff_id = '$diff_id' WHERE song_name = '$song_name' AND singer_id = '$singer_id' AND type_id ='$type_id'") or die(mysqli_error($conn));
    mysqli_query($conn, $sql);
    header("Location: uptsongs.php?insert=success");
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
             <td><a class ="html" >Chord</a></td>
             <td><a class ="html" >Level</a></td>
    		</tr>

        
    <?php
        $sql = "SELECT * FROM songs, singer, type, difficulty
        WHERE songs.singer_id = singer.singer_id
        AND songs.type_id = type.type_id
        AND songs.diff_id = difficulty.diff_id";          
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['song_name']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td><?php echo $row['chord_id']; ?></td>
            <td><?php echo $row['dif']; ?></td>
            
        </tr>
     <?php
            }
        }
    ?>
    </table>
 
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
                <td><a class ="html">Chords</a></td>
    		</tr>
    <?php
        $sql = "SELECT * FROM chords";
            
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while($row=mysqli_fetch_assoc($result)){
        ?>
            
        <tr>
            
            <td><?php echo $row['chords_id']; ?></td>
            <td><?php echo $row['Chords']; ?></td>

        </tr>
     <?php
            }
        }
    ?>

    </table>
<br>
<br><br>