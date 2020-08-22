<?php
require_once('../partials/header.php');
require_once('../partials/nav.php');
?>

        <!-- Content -->
        <div class="container-fluid">
            
            <!-- Search Bar -->
            <div class="container">
                <div class="row mt-5 pt-5 mx-auto">
                    <div class="col mx-auto">
                        <form class="form-inline my-2 my-lg-0 align-items-center justify-content-center">
                            <input class="form-control mr-sm-2 input-srch" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0 btn-srch" type="submit">
                                <i class="fas fa-search" id="srch"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <h3>Transaction History</h3>  
           </div>

            <!-- Divider -->
            <div class="divider mb-5">
                <hr>
            </div>

            <!-- Transaction History Table -->
            <div class="container">
    <form >
        <div class="form-group">
            <?php
            $local = $_SESSION['eMail'];
            
            $servername = "localhost";
            $username = "root";
            $password = "mySQLp@ssword127";
            $databasename = "hackunamatata";
            $conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server or display error
            $query = $conn->prepare("SELECT * FROM user WHERE user_email='$local'"); // get current user
            $query->execute(); // actually perform the query
            $result = $query->get_result(); // retrieve the result so it can be used inside PHP
            $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
            $userid = $r['userid'];//assign current user's user id to local variable

            $query = $conn->prepare("SELECT * FROM orders WHERE userid='$userid'"); // get current user
            $query->execute(); // actually perform the query
            $result = $query->get_result(); // retrieve the result so it can be used inside PHP
            $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
            $orderid = $r['orderID'];//assign current user's user id to local variable
            
            $query1 = $conn->prepare("SELECT * FROM transaction WHERE orderId = '$orderid'"); // get products of current user
            $query1->execute(); // actually perform the query
            $result1 = $query1->get_result(); // retrieve the result so it can be used inside PHP
            $r1 = $result1->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
            
            if ($result1 -> num_rows > 0)
            {
                echo'<div style="max-height: 400px; overflow: scroll;">
                <div style="width: 100%;">
                <table class="table table-hover text-center" id="myTable">
                        <thead class="thead-dark">
                            <tr>
                                <th style="cursor: pointer;" onclick="sortTable(0)">Transaction Id</th>
                                <th style="cursor: pointer;" onclick="sortTable(1)">Order Id </th>
                                <th style="cursor: pointer;" onclick="sortTable(2)">Particulars</th>
                                <th style="cursor: pointer;" onclick="sortTable(3)">Transaction Date</th>       
                                <th style="cursor: pointer;" onclick="sortTable(4)">Total Price </th>         
                                <th style="cursor: pointer;" onclick="sortTable(5)"></th>
                                <th></th>
                            </tr>
                    </thead>
                    <tbody>';
                do
                {   
                    echo "<tr>";
                    echo "<td>".$r1['transactionID']."</td>";
                    echo "<td>".$r1['orderId']."</td>";
                    echo "<td></td>";
                    echo "<td>".$r1['transaction_date']."</td>";
                    echo "<td>".$r1['transaction_totalPrice']."</td>";
                    echo "<td> <a href='#7'><i class='fas fa-eye'></i></a></td>";
                    echo "</tr>";
                }
                while ($r1 = $result1 -> fetch_assoc());
                           }
            else
            {
                echo 'No records found.<br><br><br></div>';
            }
            ?>
    </form>
</div>

<?php
require_once('../partials/footer.php');
?>