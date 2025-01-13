<?php 
require_once("../model/user_model.php");
$search=$_REQUEST['search'];
$result = show_authors();


$author_found = false;
while ($row = mysqli_fetch_assoc($result)) {
        if (strpos($row['user_name'], $search) !== false) {
            echo "
                <tr align='center'>                          
                <td>{$row['user_name']}</td>
                <td>{$row['author_name']}</td>
                <td>{$row['contact_no']}</td>
                <td> {$row['password']}</td>
                <td>
                    <a href='../view/edit_user.php?user_name={$row['user_name']}'> <button> EDIT</button> </a> 
                </td>
                <td>
                    <a href='delete_user.php?user_name={$row['user_name']}'>  <button> DELETE</button> </a> 
                </td>
                <?php } ?>
            </tr>
            ";
            $author_found = true;
        }
       
       
    }

    if(!$author_found){
        echo "No User found";
    }
   


?>