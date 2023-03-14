<!DOCTYPE html>  
 <html>  
      <head>  
        <title></title>  
          
          <style type="text/css">
               table, tr, td,th{
                    border: 1px solid black;
                    border-collapse: collapse;
               }
          </style>
      </head>  
      <body>
      <?php include 'log_top.php';?>
      <?php
          $id = $name = $type = $cost = $freeSlot = "";
          $index = 0;


      ?>
        <div>              
               
                          <?php   
                          $data = file_get_contents("../model/locations.json");
                          $data = json_decode($data, true);
                          if (isset($data)) {
                              foreach($data as $row)  
                               {  
                                    if ($row["id"] == $_POST["id"]) {

                                        
                                        $name = $row["name"];
                                        $id = $row["id"];
                                        $type = $row["type"];
                                        $cost = $row["cost"];
                                        $freeSlot = $row["freeSlot"];
                                        
                                        
                                         break;
                                    }
                                    else{
                                        $index++;
                                    }
                               } 
                          }
                          ?>
                     <!--</table>  -->
                     <a href="view_profile.php">Back</a>
                   </div>
                 </div>
                        
        <fieldset>
		<table border="1" width="100%">
			<tr>
				<td width="75%">
					<fieldset>
						<legend>EDIT PROFILE</legend>
						<form method="post" action="">
								
								<legend>ID</legend>
								<input type="text" name="id" value="<?php echo $id; ?>">
								<hr>
							
								
								<legend>Name</legend>
								<input type="text" name="name" value="<?php echo $name; ?>">
								<hr>

                                        <legend>Type</legend>
								<input type="text" name="type" value="<?php echo $type; ?>">
								<hr>
							
                                        <legend>Cost</legend>
								<input type="number" name="cost" value="<?php echo $cost; ?>">
								<hr>

                                        <legend>Free Slot</legend>
								<input type="number" name="freeSlot" value="<?php echo $freeSlot; ?>">
								<hr>
						
							

								<input type="submit" name="submit" value="Submit">

						</fieldset>
					</td>
				</tr>
			</table>
		</fieldset>


          <?php
          
          if ($_SERVER["REQUEST_METHOD"] == "POST") {

               $new_data = array(  
                    'id'               =>     $_POST['id'],  
                    'name'          =>     $_POST["name"],  
                    'type'     =>     $_POST["type"],  
                    'cost'     =>   $_POST["cost"],
                    'freeSlot'     =>     $_POST["freeSlot"],  
               );
               
               $current_data = file_get_contents('../model/locations.json');  
               $data = json_decode($current_data, true);
               //var_dump($data);
               echo '<br>';
               $data[$index] = $new_data;
               $final_data = json_encode($data);
               if(file_put_contents('../model/locations.json', $final_data))  
               {  
                    echo "<p>Done Successfully</p>";
               }
               else {
                    echo "<p>fatal error!</p>";
               }
          }
          
          ?>
                 <?php include 'footer.php';?>


      </body>  
 </html>  