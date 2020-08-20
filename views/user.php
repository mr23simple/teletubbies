<?php
// Require header
require_once('../partials/header.php');
// Require Nav
require_once('../partials/nav.php');

$eMail = $_SESSION['eMail'];


$servername = "localhost";
$username = "root";
$password = "mySQLp@ssword127";
$databasename = "hackunamatata";
$conn = new mysqli($servername, $username, $password, $databasename) or die(mysqli_error()); //Connect to server or display error

$query2 = $conn->prepare("SELECT * FROM user WHERE user_email='$eMail'"); // prepare a query
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
                    <img src="#" alt="">
                </div>
            </div>
            <div class="row mt-5 align-items-center justify-content-center">
                <button class="btn btn-success btn-lg">Upload Photo</button>
            </div>
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
                </div>
            </form>
            </div>
        </div>
    </div>
</div>




<?php
require_once('../partials/footer.php');
?>