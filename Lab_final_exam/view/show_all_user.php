<?php
    session_start();
    require_once("../model/user_model.php");
    $result = show_authors();
?>
<html>
<head>
    <title>View Author List</title>
</head>
<body>

    <div style="width: 100%; text-align: center;">
        <h3>
            <input  type="text" id="search" onkeyup="search_author()"> 
            Search an user
        </h3>
    </div>

    <table border=1 cellspacing="0" align="center" width="50%" id="table1" class="table">
        <thead>
            <tr align="center">
                <th>User Name</th>
                <th>Author Name</th>
                <th>Contact No</th>
                <th>Password</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php 
            while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr align="center">                          
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['author_name']; ?></td>
                <td><?php echo $row['contact_no']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td>
                    <a href="edit_user.php?user_name=<?php echo $row['user_name']?>"> 
                        <button>EDIT</button> 
                    </a> 
                </td>
                <td>
                    <a href="../controller/delete_user.php?user_name=<?php echo $row['user_name']?>"> 
                        <button>DELETE</button> 
                    </a> 
                </td>
            </tr>
        <?php } ?>
    </table>
    <div style="text-align: center; margin-top: 20px;">
        <a href="user_home.php">
            <button >Back to Home</button>
        </a>
        <a href="../controller/add_user.php">
            <button >Add User</button>
        </a>
    </div>

    <script src="../asset/search_user.js"></script>

</body>
</html>
