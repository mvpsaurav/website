<?php
    include_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="copy.css" media="all" rel="Stylesheet" type="text/css" />
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
    <STYLE>A {text-decoration: none;} </STYLE>
<header>
    <a class="header-item">
        Contact Us: c#ords@gmail.com
    </a>

      <div class = "navbar">
        <img id="logo" src = "circle-cropped.png"  alt="Logo"  >
          <div class = "navigate">
            <div class="dropdown nav-item" >
              <a class="dropbtn">CHORDS</a>

                <div class="dropdown-content">
                  <a href="guitar.php">GUITAR </a><br>
                  <a href="ukulele.php">UKULELE</a>

              </div>
            </div>
           <a class="nav-item" href="index.php">TABS</a>
              <a class="nav-item" href="singer.php">ARTISTS</a>
          <div class = "navigate">
            <div class="dropdown nav-item" >
              <a class="dropbtn">GENRES</a>
                <div class="dropdown-content">
                  <a href="rock.php">ROCK </a><br>
                  <a href="metal.php">METAL </a><br>
                  <a href="pop.php">POP </a><br>
                  <a href="rb.php">R&B </a><br>
                  <a href="acoustic.php">ACOUSTIC </a>
              </div>
            </div>
          </div>
          <div class = "navigate">
            <div class="dropdown nav-item" >
              <a class="dropbtn">LEVELS</a>
                <div class="dropdown-content">
                  <a href="beginner.php">Beginner </a><br>
                  <a href="easy.php">Easy </a><br>
                  <a href="int.php">Intermediate </a><br>
                  <a href="adv.php">Advanced</a><br>
                  <a href="expert.php">Expert </a>
              </div>
            </div>
          </div>
        </div>
        <div class = "navigate">
          <a class="buttonstyle" href="signup.php" >SIGN UP</a>
          <a class="buttonstyle" href="login.php">LOG IN</a>
        </div> 
    </div>
  </header>
    <main style= "padding:90px 0px">
<form id= "main-wrapper" >

        <img id="logo" alt="logo" src="circle-cropped.png">
    <h2>Expert</h2>
    <style>

      </style>
    	<table>
            <tr>
                <td><a style="color:white">Singer</a></td>
        		<td><a style="color:white">Song Name</a></td>
                
        		<td><a style="color:white">Chords</a></td>
                <td><a style="color:white">Type</a></td>
       			<td><a style="color:white">Type</a></td>
    		</tr>
        
    <?php
        $sql = "SELECT * FROM songs, singer, chords, type, genre
        WHERE songs.singer_id = singer.singer_id
        AND songs.chord_id = chords.chords_id
        AND songs.type_id = type.type_id
        AND songs.genre_id = genre.genre_id
        AND diff_id = 5
        ORDER BY singer.name, songs.song_name ASC";          
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck > 0){
            while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['song_name']; ?></td>
            
            <td><?php echo $row['Chords']; ?></td>
            <td><?php echo $row['genre']; ?></td>
            <td><?php echo $row['type']; ?></td>
            
        </tr>
     <?php
            }
        }
    ?>
    </table>
    
        </form>
    </main>
</body>
</html>