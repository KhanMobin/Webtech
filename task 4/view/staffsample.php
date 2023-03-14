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
        <div>              
                <div> 
                     <table>  
                          <tr>  
                               <th>ID</th> 
                               <th>NAME</th>   
                               <th>User name</th> 
                               <th>Password</th>  
                               <th>Gender</th>  
                               <th>SALARY</th>   
                               <th>Date of birth</th> 
                               <th>Profile Picture Path</th>  
                          </tr>  
                          <?php   
                          $data = file_get_contents("../model/hhhusers.json");  
                          $data = json_decode($data, true);
                          if (isset($data)) {
                              foreach($data as $row)  
                               {  
                                   // if ($row['username']=="john") {
                                        echo '<tr>
                                         <td>'.$row["id"].'</td>
                                         <td>'.$row["name"].'</td>
                                         <td>'.$row["username"].'</td>
                                         <td>'.$row["password"].'</td>
                                         <td>'.$row["gender"].'</td>
                                         <td>'.$row["salary"].'</td>
                                         <td>'.$row["dob"].'</td>
                                         <td>'.$row["profilePicPath"].'</td>
                                         <td><a href="editlocation.php?id='.$row["id"].'">Edit</a></td>
                                         </tr>'; 
                                   // }
                                   
                                     
                               } 
                          }
                           
                          ?>  
                     </table>  
                     <a href="view_profile.php">Back</a>
                   </div>
                 </div>
                 <?php include 'footer.php';?>
      </body>  
 </html>  