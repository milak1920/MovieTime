<?php # armchairs.php #3
include('includes/header.php');
?>
<h1>Tickets and armchairs</h1>
<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	  
//    if (isset ($_REQUEST['tickets'])){
//        $tickets=$_REQUEST['tickets'];
//    } 
    
       
  
//    if ($tickets==count($armchair)){
//        
//       echo "<h1>Your tickets</h1>";
//       	// Table header:
//	echo '<table width="60%">
//	<thead>
//	<tr>
//		<th align="left"><strong>Delete</strong></th>
//		<th align="left"><strong>Title</strong></th>
//		<th align="left"><strong>Genre</strong></th>
//		<th align="left"><strong>Session</strong></th>
//    <th align="left"><strong>Number of tickets</strong></th>
//    <th align="left"><strong>Number of armchairs</strong></th>
//	</tr>
//	</thead>
//	<tbody>
//	'; 
//        
//        	// Fetch and print all the records:
//	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
//		echo '<tr>
//			<td align="left"><input type="button" onclick="delete()">Delete</td>
//			<td align="left">' . $row['title'] . '</td>
//			<td align="left">' . $row['genre'] . '</td>
//			<td align="left">' . $row['session'] . '</td>
//      		<td align="left">'.$_POST['tickets'].'</td>
//      		<td align="left">'.$_POST['armchair'].'</td>
//		</tr>
//		';
//	}
//
//	echo '</tbody></table>';
//        
//    }
     

 }
        
     
?>


<form action="armchairs.php" method="post">
  <h2>Select the number of tickets</h2>
    <?php
        $tickets=range(1,20);
            echo '<select name="tickets">';
            foreach($tickets as $value){
                echo '<option value="value">'.$value.'</option>';
            }
            echo "</select>";
    ?>
  <h2>Select the armchairs</h2>
  <div id="divid">
<?php
      require('../mysqli_connect.php');
      // Define the query:
      $m = "SELECT armchair_id, image FROM armchairs";
      $s = @mysqli_query($dbm, $m);
      // Count the number of returned rows:
      $num = mysqli_num_rows($s);
            if ($num > 0) { // If it ran OK, display the records.
            while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
            echo '<img   onclick="cambia(this.id)"  width="9%" id="'.$row['armchair_id'].'" src="'.$row['image'].'" name="sillas">'; 
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
