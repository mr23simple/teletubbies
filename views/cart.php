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


?>
        <!-- Content -->
        <div class="container-fluid">
            
            <!-- Title -->
            <div class="container mt-5">
                <h1>My Cart</h1>  
           </div>

            <!-- Divider -->
            <div class="divider  mb-5">
                <hr>
            </div>
            
            <!-- view and manage cart items -->
            <div class="container">
                <form action="../controllers/checkout.php" method="post">
                    <div class="form-group">
                        <?php
                        $local = $_SESSION['eMail'];

                        //getting user details from db
                        $getUser = $conn->prepare("SELECT * FROM user WHERE user_email = '$local'"); // get current user
                        $getUser->execute(); // actually perform the query
                        $userResult = $getUser->get_result(); // retrieve the result so it can be used inside PHP
                        $user = $userResult->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r

                        $getId = $user['userid'];//get user id

                        $getOrder = $conn->prepare("SELECT * FROM orders WHERE userid='$getId'"); // get current user
                        $getOrder->execute(); // actually perform the query
                        $result = $getOrder->get_result(); // retrieve the result so it can be used inside PHP
                        $orders = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
                        
                        $name = $orders['productid'];

                        //getting product details from db
                        $getProduct = $conn->prepare("SELECT * FROM product WHERE productId = '$name'"); // get selected product details
                        $getProduct->execute(); // actually perform the query
                        $productResult = $getProduct->get_result(); // retrieve the result so it can be used inside PHP
                        $product = $productResult->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r


                        if ($result -> num_rows > 0)
                        {
                            echo'<div style="max-height: 400px; overflow: scroll;">
                            <div style="width: 100%;">
                            <table class="table table-hover text-center" id="myTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th style="cursor: pointer;" onclick="sortTable(0)">Product Name</th>
                                            <th style="cursor: pointer;" onclick="sortTable(1)">Product Price</th>
                                            <th style="cursor: pointer;" onclick="sortTable(2)">Quantity Ordered</th>
                                            <th></th>
                                        </tr>
                                </thead>
                                <tbody>';
                            do
                            {   
                                echo "<tr>";
                                echo "<td>" .
                                "<div class='form-check'>
                                <label class='form-check-label' for='".$product['productId']."'>
                                <input type='hidden' name='productId' value='".$product['productId']."'/>
                                <input type='checkbox' class='form-check-input' id='".$product['product_name'].
                                "' name='product_name[]' value='".$product['product_name']."'> ".$product['product_name']."
                                </label>
                                </div></td>";
                                echo "<td>".$product['product_price']."</td>";
                                echo "<td>".$orders['order_quantityOrdered']."</td>";
                                echo "</tr>";
                            }
                            while ($orders = $result -> fetch_assoc());
                            echo '</tbody>
                            </table></div></div></div>
                            <button type="submit" name="submit" Value="Submit" class="btn btn-success" id="checkBtn" onclick="checkboxes()">Checkout</button>';
                        }
                        else
                        {
                            echo 'Cart is empty.<br><br><br></div>';
                        }
                        ?>
                </form>
            </div>
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
                return confirm('Checkout selected products?');
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
<?php
require_once('../partials/footer.php');
?>