<?php include 'log_top.php'; ?>
<?php include '../control/add_location_control.php'; ?>
 <!DOCTYPE html>  
 <html>  
      <head>  
      <style type="text/css">
               table, tr, td,th{
                    border: 1px solid black;
                    border-collapse: collapse;
               }
          </style>
      </head>  
      <body>  
           <br />  
           <div>  
                <h3>Add Locations to JSON File</h3><br />   
                
               
                <table>  
                          <tr>  
                               <th>NAME</th> 
                               <th>ID</th>   
                               <th>TYPE</th> 
                               <th>Cost</th>  
                               <th>freeSlot</th>  
                          </tr>  
                          <?php   
                          $data = file_get_contents("../model/locations.json");  
                          $data = json_decode($data, true);
                          if (isset($data)) {
                              foreach($data as $row)  
                               {  
                                   // if ($row['username']=="john") {
                                        echo '<tr>
                                         <td>'.$row["name"].'</td>
                                         <td>'.$row["id"].'</td>
                                         <td>'.$row["type"].'</td>
                                         <td>'.$row["cost"].'</td>
                                         <td>'.$row["freeSlot"].'</td>
                                         </tr>'; 
                                   // }
                                   
                                     
                               } 
                          }
                           
                          ?>  
                     </table>  


                <form method="post">  
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <label>Name</label>  
                     <input type="text" name="name" /><br />  
                     <label>ID</label>
                     <input type="number" name = "id"/><br />
                     <label>Vehicle Type</label>
                     <input type="text" name = "type"/><br />
                     <label>Parking Cost</label>
                     <input type="number" name = "cost"/><br />
                     <label>Free Slots</label>
                     <input type="number" name = "freeSlot"/><br />

                    
                     <input type="submit" name="submit" value="Add"/><br />                      
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
                <a href="view_profile.php">Back</a>
           </div>  
           <br />  
           <?php include 'footer.php';?>
      </body>  
 </html>  