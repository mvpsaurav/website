 <?php
include("config.php");
?>

<!DOCTYPE html>
<html>
<head>
<style>
.container { 
  position: relative;
  top: 30%;
}

.wrapper {
    text-align: center;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Insert Data </title>
<link href="index.css" media="all" rel="Stylesheet" type="text/css" />
<link rel="stylesheet" href="css/bootstrap-337.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>  
    <div class="container">  
        <div class="wrapper">
    
           <form method="get" action="addpanel.php">
            <button type="submit">ADD SONGS</button>
            </form>
           <form method="get" action="deletepanel.php">
                <button type="submit">DELETE SONGS</button>
            </form>
            <form method="get" action="addsinger.php">
                <button type="submit">ADD-DELETE SINGER</button>
            </form>
            <form method="get" action="addgenre.php">
                <button type="submit">ADD-DELETE GENRE</button>
            </form>
            <form method="get" action="addchords.php">
                <button type="submit">ADD-DELETE CHORDS</button>
            </form>
            <form method="get" action="uptsongs.php">
                <button type="submit">UPDATE SONG CHORD AND LEVEL</button>
            </form>
            <form method="get" action="mainpage.php">
                <button type="submit">BACK</button>
            </form>
            </div>
    </div>
</body>
</html>
