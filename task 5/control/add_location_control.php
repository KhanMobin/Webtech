<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label>Enter Name</label>";  
      }
      else if(empty($_POST["id"]))  
      {  
           $error = "<label>Enter Location ID</label>";  
      }  
      else if(empty($_POST["type"]))  
      {  
           $error = "<label>Enter Vehicle Type</label>";  
      }  
      else if(empty($_POST["cost"]))  
      {  
           $error = "<label >Enter Parking Cost</label>";  
      }
      else if(empty($_POST["freeSlot"]))  
      {  
           $error = "<label>Enter Free Slots</label>";  
      } 
       
      else  
      {  
           if(file_exists('../model/locations.json'))  
           {  
                $current_data = file_get_contents('../model/locations.json');  
                $array_data = json_decode($current_data, true);  
                $new_data = array(  
                     'name'               =>     $_POST['name'],  
                     'id'          =>     $_POST["id"],  
                     'type'     =>     $_POST["type"],  
                     'cost'     =>     $_POST["cost"],  
                     'freeSlot'     =>     $_POST["freeSlot"]  
                );  
                $array_data[] = $new_data;  
                $final_data = json_encode($array_data);  
                if(file_put_contents('../model/locations.json', $final_data))  
                {  
                     $message = "<label>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'JSON File not exits';  
           }  
      }  
 }  
 ?>  