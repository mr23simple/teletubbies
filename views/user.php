<?php
// Require header
require_once('../partials/header.php');
// Require Nav
require_once('../partials/nav.php');

$sessionUserId = $_SESSION['userId'];

$servername = "localhost";
$username = "root";
$password = "";
$databasename = "hackunamatata";
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server or display error

$query2 = $conn->prepare("SELECT * FROM user WHERE userid='$sessionUserId'"); // prepare a query
$query2->execute(); // actually perform the query
$result2 = $query2->get_result(); // retrieve the result so it can be used inside PHP
$r2 = $result2->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r2
?>

<div class="container profile-card">
    <div class="row">
        <div class="col">
            <div class="row"></div>
            <div class="row justify-content-center align-items-center">
                <div class="photo-frame">
                    <img alt ="" id="previewImage" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($r2['user_Image']); ?>" /> 
                </div>
            </div>
            <form action="../controllers/upload.php" method="post" enctype="multipart/form-data">
                <div class="row mt-5 align-items-center justify-content-center">
                    <input type="file" name="image">
                    <input type="submit" name="submit" value="Upload">

                </div>
            </form>    
            <div class="row"></div>
        </div>
        <div class="col">
            <div class="container">
                <h2>
                    My Profile
                </h2>
            </div>
            <hr>
            <div class="container px-5 py-5 profile">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="Name">Organization / Individual</label>
                            <input type="text" class="form-control" id="Name" value="<?php echo $r2['user_organization']; ?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="MobileNumber">Mobile Number</label>
                            <input type="text" class="form-control" id="MobileNumber"value="<?php echo $r2['user_phoneNumber']; ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Email">Email Adress</label>
                            <input type="email" class="form-control" id="Email" value="<?php echo $r2['user_email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="House No./Street/Subdivision/Barangay/Building" value="<?php echo $r2['user_address']; ?>">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" id="City" placeholder="City">
                        </div>
                        <div class="form-group col-md-4">
                            <select id="inputState" class="form-control">
                                <option selected>Province</option>
                                <option>National Capital Region</option>
                                <option>Batangas</option>
                                <option>Laguna</option>
                                <option>Cavite</option>
                                <option>Rizal</option>
                                <option>Bulacan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <input type="text" class="form-control" id="ZipCode" placeholder="Zip">
                        </div>
                        <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#update">
                        <button type="submit" class="btn btn-primary btn-block">Update</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Divider -->
<div class="divider  mb-5">
    <hr>
</div>

<?php if($_SESSION["type"] == "Farmer")
{
    ?>

<!-- Title -->
<div class="container mt-5">
    <h1>Products</h1>  
</div>

<!-- Divider -->
<div class="divider  mb-5">
    <hr>
</div>

<!-- Title -->
<div class="container mt-5">
    <h3>My products</h3>  
</div>

<!-- Divider -->
<div class="divider  mb-5">
    <hr>
</div>

<!-- view and manage products -->
<div class="container">
    <form action="../controllers/deleteproduct.php" method="post" onsubmit="return confirm('Remove product data?')">
        <div class="form-group">
            <?php
            $local = $_SESSION['eMail'];

            $query = $conn->prepare("SELECT * FROM user WHERE user_email='$local'"); // get current user
            $query->execute(); // actually perform the query
            $result = $query->get_result(); // retrieve the result so it can be used inside PHP
            $r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
            $userid = $r['userid'];//assign current user's user id to local variable

            $query = $conn->prepare("SELECT * FROM product WHERE userid = '$userid'"); // displays all users
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
                                <th style="cursor: pointer;" onclick="sortTable(0)">Product ID</th>
                                <th style="cursor: pointer;" onclick="sortTable(1)">User ID</th>
                                <th style="cursor: pointer;" onclick="sortTable(2)">Product Name</th>
                                <th style="cursor: pointer;" onclick="sortTable(3)">Price</th>
                                <th style="cursor: pointer;" onclick="sortTable(4)">Unit of Measure</th>
                                <th style="cursor: pointer;" onclick="sortTable(5)">Quantity</th>
                                <th style="cursor: pointer;" onclick="sortTable(6)">Description</th>
                            </tr>
                    </thead>
                    <tbody>';
                do
                {
                    echo "<tr>";
                    echo "<td>" .
                    "<div class='form-check'>
                    <label class='form-check-label' for='".$r['productId']."'>
                    <input type='checkbox' class='form-check-input' id='".$r['productId'].
                    "' name='productId[]' value='".$r['productId']."'> ".$r['productId']."
                    </label>
                    </div></td>";
                    echo "<td>".$r['userid']."</td>";
                    echo "<td>".$r['product_name']."</td>";
                    echo "<td>".$r['product_price']."</td>";
                    echo "<td>".$r['product_unitOfMeasure']."</td>";
                    echo "<td>".$r['product_quantity']."</td>";
                    echo "<td>".$r['product_description']."</td>";
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
        <button type="submit" name="submit" Value="Submit" class="btn btn-primary" id="checkBtn" onclick="checkboxes()">Remove</button>
    </form>
</div>

<!-- Divider -->
<div class="divider  mb-5">
    <hr>
</div>

<!-- Title -->
<div class="container mt-5">
    <h3>Add product</h3>  
</div>

<!-- Divider -->
<div class="divider  mb-5">
    <hr>
</div>

<!-- Add product -->
<div class="container">
    <form action="../controllers/addproduct.php" method="post" onsubmit="return confirm('Add product data?')">
        <div class="form-group">
            <label for="prodName">Product name:</label>
            <input type="text" class="form-control" id="prodName" placeholder="Enter product name" name="prodName">
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" placeholder="Enter price" name="price">
        </div>
        <div class="form-group">
            <label for="unit">Unit of measure:</label>
            <input type="text" class="form-control" id="unit" placeholder="Enter unit of measure" name="unit">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="text" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity">
        </div>
        <div class="form-group">
            <label for="desc">Description:</label>
            <input type="text" class="form-control" id="desc" placeholder="Enter description" name="desc">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- Divider -->
<div class="divider  mb-5">
    <hr>
</div>

        <?php }
    ?>

<!-- update modal -->
<div class="modal fade" id="update">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="float:left;">Update Info</h4>
                <button type="button" class="close" data-dismiss="modal" data-toggle="modal"
                data-target="#login" style="float:right">&times;</button>
            </div>

            <div class="modal-body px-4 py-5" style="max-height: calc(100vh - 210px); overflow-y: auto;">
                <form action="../controllers/updateuser.php" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="name">Organization's / Person's Name :</label> <input type="text"
                        class="form-control" id="name" placeholder="Please enter name"
                        name="name" required="required" autocomplete="off" autofocus value="<?php echo $r2['user_organization']; ?>">
                    </div>

                    <div class="custom-control custom-switch mb-3">
                        <input type="hidden" name="customSwitch1" value=0 />
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="customSwitch1" value=1 <?php echo ($r2['user_isCorporate']==1 ? 'checked' : '');?>>
                        <label class="custom-control-label" for="customSwitch1">A Corporate Client?</label>
                    </div>

                    <div class="form-group">
                        <label for="eMail">Email Address</label> <input type="text"
                        class="form-control" id="eMail" placeholder="Please enter email address"
                        name="eMail" required="required" autocomplete="off" autofocus value="<?php echo $r2['user_email']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="pNum">Mobile Number</label> <input type="text"
                        class="form-control" id="pNum" placeholder="Please enter mobile number"
                        name="pNum" required="required" autocomplete="off" autofocus value="<?php echo $r2['user_phoneNumber']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="loc">Address</label> <input type="text"
                        class="form-control" id="loc" placeholder="Please enter address"
                        name="loc" required="required" autocomplete="off" autofocus value="<?php echo $r2['user_address']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="pWord">Password</label> <input type="password"
                        class="form-control" id="pWord" placeholder="Please enter password"
                        name="pWord" required="required" autocomplete="off" value="<?php echo $r2['user_password']; ?>" >
                    </div>

                    <div class="form-group">
                        <label for="pwd">Confirm Password</label> <input type="password"
                        class="form-control" id="cpWord" placeholder="Please confirm Password"
                        name="cpWord" required="required" autocomplete="off" value="<?php echo $r2['user_password']; ?>">
                    </div>

                    <!-- password complexity -->
                    <b>
                        <p class="text-muted">
                            Password requirements:
                        </p>
                    </b>
                    
                    <ul>
                        <li class="text-muted font-italic">
                            At least one upper case letter.
                        </li>
                        <li class="text-muted font-italic">
                            At least one lower case letter.
                        </li>
                        <li class="text-muted font-italic">
                            At least one number.
                        </li>
                        <li class="text-muted font-italic">
                            At least eight(8) characters in length.
                        </li>
                    </ul>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-secondary btn-block"
                            data-dismiss="modal" data-toggle="modal"
                            data-target="#login">
                                Previous
                            </button>                               
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">
                                Submit
                            </button>                                
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer align-items-center justify-content-center">
                <p class="text-muted text-center">Copyright &copy; Telebubbies 2020</p>
            </div>
        </div>
    </div>
</div>

<?php
require_once('../partials/footer.php');
?>

<!--Preview Image Script TODO" -->
<!--<script>
    function displayimage(e){
        if (e.files[0]){
            var reader = new FileReader()

            reader.onload = function(e){
                document.querySelector('#imagePreview').setAttribute('src',e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>-->

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