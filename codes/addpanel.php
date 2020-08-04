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
    <form action="addpanel.php" method ="POST">
        <h1>Add Song</h1>
        <input class="user-input" type="varchar" name="song_name"placeholder="Song Name">
        <input class="user-input" placeholder = "Chords" type="int" name="chord_id"placeholder="Chord Id">
        <input class="user-input" type="varchar" placeholder = "Difficulty" name="diff_id"placeholder="Difficulty">
        <input class="user-input" type="varchar" placeholder = "Genre" name="genre_id"placeholder="Genre">

        <input class="user-input" type="varchar" placeholder = "Singer"name="singer_id" placeholder="Singer Id"> 
        
        <input class="user-input" type="varchar" placeholder = "Type" name="type_id"placeholder="Type">
        <div class="form-group">
        <button type="submit" name="save">Save</button>
        </div>
    </form>
        <form method="get" action="panel.php">
            <button type="submit">BACK</button>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['save'])){
    $song_name = $_POST['song_name'];
	$chord_id = $_POST['chord_id'];
    $diff_id = $_POST['diff_id'];
    $genre_id = $_POST['genre_id'];
    $singer_id = $_POST['singer_id'];
    $type_id = $_POST['type_id'];

    $diff_id = "SELECT diff_id FROM difficulty WHERE dif = '$diff_id'";
    $genre_id = "SELECT genre_id FROM genre WHERE genre = '$genre_id'";
    $singer_id = "SELECT singer_id FROM singer WHERE name = '$singer_id'";
    $type_id = "SELECT type_id FROM type WHERE type = '$type_id'";
    
 
    $result = mysqli_query($conn, $diff_id);
    $row = mysqli_fetch_assoc($result);
    $diff_id = $row['diff_id'];
    $result = mysqli_query($conn, $genre_id);
    $row = mysqli_fetch_assoc($result);
    $genre_id = $row['genre_id'];
    $result = mysqli_query($conn, $singer_id);
    $row = mysqli_fetch_assoc($result);
    $singer_id = $row['singer_id'];
    $result = mysqli_query($conn, $type_id);
    $row = mysqli_fetch_assoc($result);
    $type_id = $row['type_id'];


    $conn -> query ("INSERT INTO `songs` (`song_id`, `song_name`, `chord_id`, `diff_id`, `genre_id`, `singer_id`, `type_id`) VALUES (NULL, '$song_name', '$chord_id', '$diff_id', '$genre_id', '$singer_id', '$type_id')") or die(mysqli_error($conn));
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
<br>
<br>
<br>