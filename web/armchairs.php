<?php # armchairs.php #3
include('includes/header.php');

require('../mysqli_connect.php');
      // Define the query:
      $m = "SELECT armchair_id, image FROM armchairs";
      $s = @mysqli_query($dbm, $m);
?>
<h1>Tickets and armchairs</h1>
 
<?php
 
if ($_SERVER["REQUEST_METHOD"]=="POST"){  
  $errors = []; // Initialize an error array.
     //Check tickets 
   $ti = mysqli_real_escape_string($dbm, $_POST['tickets']);
    
	// Check sillas:
	if (empty($_POST['sillas'])) {
		$errors[] = 'No has seleccionado ninguna butaca';
	} else {
    if ($_POST['tickets']==count($_POST['sillas'])) {
      $ar = mysqli_real_escape_string($dbm, $_POST['sillas']);
    } else {
      $errors[] = 'No coinciden número de tickets y cantidad de butacas seleccionadas.';
  }
 	} 
     
	if (empty($errors)) { // If everything's OK.
		// Register the purchase in the database...
		// Make the query:
		$q = "INSERT INTO purchase (tickets, armchair_id) VALUES ('$ti', '$ar')";
		$r = @mysqli_query($dbm, $q); // Run the query.agarra la query y lo envia a la base de datos 
        
 
		 
	} else { // Report the errors.
		echo '<h1>Error!</h1>
		<p class="error">Ha ocurrido un problema:<br>';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br>\n";
		}
		echo '</p><p>Prueba de nuevo.</p><p><br></p>';
	} // End of if (empty($errors)) IF.
     
 }
?>
 


<form action="purchase.php" method="post">
  <h2>Select the number of tickets</h2>
    <?php
        $tickets=range(1,20);
            echo '<select name="tickets">';
            foreach($tickets as $value){
                echo "<option value=\"$value\">$value</option>\n";
            }
            echo "</select>";
    ?>
  <h2>Select the armchairs</h2>
  <div id="divid">
<?php
      
      // Count the number of returned rows:
      $num = mysqli_num_rows($s);
            if ($num > 0) { // If it ran OK, display the records.
            while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
            echo '<div class="texto"> '.$row['armchair_id'].'º-</div>' ;

            echo '<img   onclick="cambia(this.id)"  width="9%" id="'.$row['armchair_id'].'" src="'.$row['image'].'" name="sillas[]">'; 
                } 
            }     
?>   
    </div><br><br>
  <input type="submit" value="Send">
</form>
 
<script>
 var cuantosClicks = 0;
 function cambia(id){
    src = "";
    cuantosClicks++;
    // En realidad va sin las comillas simples ''
    if(cuantosClicks % 2 == 0){
        src= "images/ocupado.jpg";
    }else{
        src= 'images/libre.jpg';
    }
    $.ajax(
        {
            url : "update.php",
            type: "POST",
            data : {idP: id,imagen:src}
        })
    .done(function(data) {
        //$("#respuesta").html(data);
        //alert(id)
      $("#divid").load(" #divid");
    });
 }
</script>
 
 
<?php
include('includes/footer.html');
?>
