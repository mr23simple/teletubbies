<?php
// Require header
require_once('../partials/header.php');
// Require Nav
require_once('../partials/nav.php');
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
                        <input type="text" class="form-control" id="Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="MobileNumber">Mobile Number</label>
                        <input type="text" class="form-control" id="MobileNumber">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Email">Email Adress</label>
                        <input type="email" class="form-control" id="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="House No./Street/Subdivision/Barangay/Building">
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