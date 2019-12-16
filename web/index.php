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
$m = "SELECT title, genre, year, director, duration, session FROM movies";
$s = @mysqli_query($dbm, $m);

// Count the number of returned rows:
$num = mysqli_num_rows($s);

if ($num > 0) { // If it ran OK, display the records.
  while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
    echo '<div>
      <img src="">
      <h2>Title: ' . $row['title'] . '</h2>
      <p>Genre: ' . $row['genre'] . '</p>
      <p>Year: ' . $row['year'] . '</p>
      <p>Director: ' . $row['director'] . '</p>
      <p>Duration: ' . $row['duration'] . '</p>
      <p>Session: ' . $row['session'] . '</p>
    </div>';
  }
}
?>


<?php
include('includes/footer.html');
?>
