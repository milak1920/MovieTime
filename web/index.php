<?php # Script 3.7 - index.php #2
// This function outputs theoretical HTML
// for adding ads to a Web page.

$page_title = 'MovieTime!';
include('includes/header.php');
?>

<div class="page-header"><h1>Cinema Listings</h1></div>
 
 
<?php
require('../mysqli_connect.php');

// Define the query:
$m = "SELECT title, genre, year, director, duration, session, photo FROM movies";
$s = @mysqli_query($dbm, $m);

// Count the number of returned rows:
$num = mysqli_num_rows($s);

if ($num > 0) { // If it ran OK, display the records.
  while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
     
 
    echo '
     
      <div class="gallery">
            <img src="'.$row['photo'].'"]>
            <div class="desc">
                <p class="titulo">' . $row['title'] . '</p>
                <p><strong>Genre:</strong> ' . $row['genre'] . '</p>
                <p><strong>Year:</strong> ' . $row['year'] . '</p>
                <p><strong>Director:</strong> ' . $row['director'] . '</p>
                <p><strong>Duration:</strong> ' . $row['duration'] . '</p>
                <p><strong>Session:</strong> ' . $row['session'] . '</p>
            </div>
      </div>
      ';

 
  }
}
 
    ?>
  
<div class="bot">

<a href="armchairs.php" class="boton_personalizado">Buy tickets</a>
</div>
 

<?php
include('includes/footer.html');
?>