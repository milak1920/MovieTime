<?php # Script 10.1 - purchase.php #3
error_reporting(0);
$page_title = 'Your tickets';
include('includes/header.php');
echo '<h1 class="principal">Purchase</h1>';

require('../mysqli_connect.php');

// Define the query:
$q = "SELECT title, genre, session FROM movies WHERE movie_id = 1";
$r = @mysqli_query($dbm, $q);

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if ($num > 0) { // If it ran OK, display the records.

// function delete(){
  
// }

	echo "<p>These are your selected movies.</p>\n";

	//<th align="left"><strong>Delete</strong></th>
	// Table header:
	echo '<table width="60%">
	<thead>
	<tr>

		<th align="left"><strong>Title</strong></th>
		<th align="left"><strong>Genre</strong></th>
		<th align="left"><strong>Session</strong></th>
    <th align="left"><strong>Number of tickets</strong></th>
    <th align="left"><strong>Number of armchairs</strong></th>
	</tr>
	</thead>
	<tbody>
	';

	//<td align="left"><input type="button" onclick="delete()">Delete</td>
	// Fetch and print all the records:
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		echo '<tr>
			
			<td align="left">' . $row['title'] . '</td>
			<td align="left">' . $row['genre'] . '</td>
			<td align="left">' . $row['session'] . '</td>
      		<td align="left">'.$_POST['tickets'].'</td>
      		<td align="left">'.$_POST['sillas'].'</td>
		</tr>
		';
	}

	echo '</tbody></table>';
	mysqli_free_result ($r);
     


} else { // If no records were returned.
	echo '<p class="error">There are currently no tickets.</p>';
}

mysqli_close($dbm);

include('includes/footer.html');
?>
<div class="error">
    <img src="https://cdn130.picsart.com/298137588301201.gif?frame=70&to=min&r=480" width="42%">
</div>
 