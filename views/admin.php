<?php

// Require header
require_once('../partials/header.php');
// Require Nav
require_once('../partials/nav.php');

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "hackunamatata";
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server or display error

//UPDATE `user` SET `user_type`="Admin" WHERE `user_email` = "TestUser123"
?>
        <!-- Content -->
        <div class="container-fluid">
            
            <!-- Title -->
            <div class="container mt-5">
                <h1>Admin</h1>  
            </div>

            <!-- Divider -->
            <div class="divider  mb-5">
                <hr>
            </div>

            <div class="container mt-5">
                <h3>Update user type</h3>  
            </div>
            
            <!-- view and edit users -->
            <div class="container">
              <form action="../controllers/updatetype.php" method="post">
                <div class="form-group">
                  <?php
                    $query = $conn->prepare("SELECT * FROM user"); // displays all users
                    $query->execute(); // actually perform the query
                    $result = $query->get_result(); // retrieve the result so it can be used inside PHP
                    $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r

                    if ($result -> num_rows > 0)
                    {
                        echo'<div style="max-height: 400px; overflow: scroll;">
                        <div style="width: 100%;">
                        <table class="table table-hover text-center" id="myTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="cursor: pointer;" onclick="sortTable(0)">User ID</th>
                                        <th style="cursor: pointer;" onclick="sortTable(1)">Company Name</th>
                                        <th style="cursor: pointer;" onclick="sortTable(2)">Email</th>
                                        <th style="cursor: pointer;" onclick="sortTable(3)">Phone Number</th>
                                        <th style="cursor: pointer;" onclick="sortTable(4)">Address</th>
                                        <th style="cursor: pointer;" onclick="sortTable(5)">User Type</th>
                                        <th style="cursor: pointer;" onclick="sortTable(6)">Corporate</th>
                                    </tr>
                            </thead>
                            <tbody>';
                        do
                        {
                            echo "<tr>";
                            echo "<td>" .
                            "<div class='form-check'>
                            <label class='form-check-label' for='".$r['userid']."'>
                            <input type='checkbox' class='form-check-input' id='".$r['userid'].
                            "' name='userid[]' value='".$r['userid']."'> ".$r['userid']."
                            </label>
                            </div></td>";
                            echo "<td>".$r['user_organization']."</td>";
                            echo "<td>".$r['user_email']."</td>";
                            echo "<td>".$r['user_phoneNumber']."</td>";
                            echo "<td>".$r['user_address']."</td>";
                            echo "<td>".$r['user_type']."</td>";
                            echo "<td>".$r['user_isCorporate']."</td>";
                            echo "</tr>";
                        }
                        while ($r = $result -> fetch_assoc());
                        echo '</tbody>
                        </table></div></div>';
                    }
                    else
                    {
                        echo 'No records found.';
                    }
                  ?>
                </div>
                <button type="submit" name="submit" Value="Submit" class="btn btn-primary" id="checkBtn" onclick="checkboxes()">Update</button>
              </form>
            </div>

            <!-- Divider -->
            <div class="divider  mb-5">
                <hr>
            </div>

            <div class="container mt-5">
                <h3>Delete users</h3>  
            </div>

            <!-- view and edit users -->
            <div class="container">
              <form action="../controllers/deleteuser.php" method="post">
                <div class="form-group">
                  <?php
                    $query = $conn->prepare("SELECT * FROM user"); // displays all users
                    $query->execute(); // actually perform the query
                    $result = $query->get_result(); // retrieve the result so it can be used inside PHP
                    $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r

                    if ($result -> num_rows > 0)
                    {
                        echo'<div style="max-height: 400px; overflow: scroll;">
                        <div style="width: 100%;">
                        <table class="table table-hover text-center" id="myTable1">
                                <thead class="thead-dark">
                                    <tr>
                                        <th style="cursor: pointer;" onclick="sortTable1(0)">User ID</th>
                                        <th style="cursor: pointer;" onclick="sortTable1(1)">Company Name</th>
                                        <th style="cursor: pointer;" onclick="sortTable1(2)">Email</th>
                                        <th style="cursor: pointer;" onclick="sortTable1(3)">Phone Number</th>
                                        <th style="cursor: pointer;" onclick="sortTable1(4)">Address</th>
                                        <th style="cursor: pointer;" onclick="sortTable1(5)">User Type</th>
                                        <th style="cursor: pointer;" onclick="sortTable1(6)">Corporate</th>
                                    </tr>
                            </thead>
                            <tbody>';
                        do
                        {
                            echo "<tr>";
                            echo "<td>" .
                            "<div class='form-check'>
                            <label class='form-check-label' for='".$r['userid']."'>
                            <input type='checkbox' class='form-check-input' id='".$r['userid'].
                            "' name='userid[]' value='".$r['userid']."'> ".$r['userid']."
                            </label>
                            </div></td>";
                            echo "<td>".$r['user_organization']."</td>";
                            echo "<td>".$r['user_email']."</td>";
                            echo "<td>".$r['user_phoneNumber']."</td>";
                            echo "<td>".$r['user_address']."</td>";
                            echo "<td>".$r['user_type']."</td>";
                            echo "<td>".$r['user_isCorporate']."</td>";
                            echo "</tr>";
                        }
                        while ($r = $result -> fetch_assoc());
                        echo '</tbody>
                        </table></div></div>';
                    }
                    else
                    {
                        echo 'No records found.';
                    }
                  ?>
                </div>
                <button type="submit" name="submit" Value="Submit" class="btn btn-primary" id="checkBtn" onclick="checkboxes()">Set as inactive</button>
              </form>
            </div>

            <!-- Divider -->
            <div class="divider  mb-5">
                <hr>
            </div>

            <!-- check if a checkbox is checked -->
            <script>
                function checkboxes()
                {
                    checked = document.querySelectorAll('input[type="checkbox"]:checked').length;
                    if(checked == 0) {
                    alert("You must check at least one checkbox.");
                    return false;
                  }
                  else {
                    return confirm('Update user data?');
                  }
                }
            </script>

            <!-- sort table contents on click -->
            <script>
                function sortTable(n) 
                {
                    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                    table = document.getElementById("myTable");
                    switching = true;
                    //Set the sorting direction to ascending:
                    dir = "asc"; 
                    /*Make a loop that will continue until
                    no switching has been done:*/
                    while (switching) 
                    {
                        //start by saying: no switching is done:
                        switching = false;
                        rows = table.rows;
                        /*Loop through all table rows (except the
                        first, which contains table headers):*/
                        for (i = 1; i < (rows.length - 1); i++) 
                        {
                            //start by saying there should be no switching:
                            shouldSwitch = false;
                            /*Get the two elements you want to compare,
                            one from current row and one from the next:*/
                            x = rows[i].getElementsByTagName("TD")[n];
                            y = rows[i + 1].getElementsByTagName("TD")[n];
                            /*check if the two rows should switch place,
                            based on the direction, asc or desc:*/
                            if (dir == "asc") {
                                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch= true;
                                break;
                                }
                            } 
                            else if (dir == "desc") 
                            {
                                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) 
                                {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch = true;
                                break;
                                }
                            }
                        }
                        if (shouldSwitch) 
                        {
                        /*If a switch has been marked, make the switch
                        and mark that a switch has been done:*/
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        //Each time a switch is done, increase this count by 1:
                        switchcount ++;      
                        } else 
                        {
                            /*If no switching has been done AND the direction is "asc",
                            set the direction to "desc" and run the while loop again.*/
                            if (switchcount == 0 && dir == "asc") 
                            {
                                dir = "desc";
                                switching = true;
                            }
                        }
                    }
                }
            </script>

            <!-- sort table contents on click -->
            <script>
                function sortTable1(n) 
                {
                    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
                    table = document.getElementById("myTable1");
                    switching = true;
                    //Set the sorting direction to ascending:
                    dir = "asc"; 
                    /*Make a loop that will continue until
                    no switching has been done:*/
                    while (switching) 
                    {
                        //start by saying: no switching is done:
                        switching = false;
                        rows = table.rows;
                        /*Loop through all table rows (except the
                        first, which contains table headers):*/
                        for (i = 1; i < (rows.length - 1); i++) 
                        {
                            //start by saying there should be no switching:
                            shouldSwitch = false;
                            /*Get the two elements you want to compare,
                            one from current row and one from the next:*/
                            x = rows[i].getElementsByTagName("TD")[n];
                            y = rows[i + 1].getElementsByTagName("TD")[n];
                            /*check if the two rows should switch place,
                            based on the direction, asc or desc:*/
                            if (dir == "asc") {
                                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch= true;
                                break;
                                }
                            } 
                            else if (dir == "desc") 
                            {
                                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) 
                                {
                                //if so, mark as a switch and break the loop:
                                shouldSwitch = true;
                                break;
                                }
                            }
                        }
                        if (shouldSwitch) 
                        {
                        /*If a switch has been marked, make the switch
                        and mark that a switch has been done:*/
                        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                        switching = true;
                        //Each time a switch is done, increase this count by 1:
                        switchcount ++;      
                        } else 
                        {
                            /*If no switching has been done AND the direction is "asc",
                            set the direction to "desc" and run the while loop again.*/
                            if (switchcount == 0 && dir == "asc") 
                            {
                                dir = "desc";
                                switching = true;
                            }
                        }
                    }
                }
            </script>
        </div>
    <?php
    require_once('../partials/footer.php');
    ?>