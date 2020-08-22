<?php

// Require header
require_once('../partials/header.php');
// Require Nav
require_once('../partials/nav.php');

?>

<div class="container mt-5">
	<div class="row align-object-center justify-content-center">
		<div class="col-md-4"></div>
		<div class="col-md-4 text-center">
			<h2>
				Confirm Order
			</h2>
		</div>
	<div class="col-md-4"></div>
</div>

<hr>

<div class="container">
	<div class="row justify-content-center form-group">
		<div class="col-10">
			<div class="row">
				<div class="col-md-6">
					<div class="row my-4">
						<div class="col-md-6">
							Transaction Code:
						</div>
						<div class="col-md-6">
							<p>
								PH5148500
							</p>
						</div>
					</div>
					<div class="row my-4">
						<div class="col-md-6">
							Delivery Address:
						</div>
						<div class="col-md-6">
							<p>
								Makati, City
							</p>
						</div>
					</div>
					<div class="row my-4">
						<div class="col-md-6">
							Transaction Date:
						</div>
						<div class="col-md-6">
							<p>
								August 24, 2020
							</p>
						</div>
					</div>
					<div class="row my-4">
						<div class="col-md-6">
							Total Costs:
						</div>
						<div class="col-md-6">
							<p>
								PHP 5,000.00
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row my-4">
						<div class="col-md-6">
							Payment Method
						</div>
						<div class="col-md-6">
							<select class="form-control" id="exampleFormControlSelect1">
						      <option>Cash on delivery</option>
						      <option>GCASH</option>
						      <option>PAYMAYA</option>
						    </select>
						</div>
					</div>
					<div class="row my-4">
						<div class="col-md-6">
							Payment Status
						</div>
						<div class="col-md-6">
							<p>
								Pending
							</p>
						</div>
					</div>
					<div class="row my-4">
						<div class="col-md-6">
							Delivery Status
						</div>
						<div class="col-md-6">
							<p>
								For Shipment
							</p>
						</div>
					</div>
					<div class="row my-4">
						<div class="col-md-6">
							Estimated Time of Delivery
						</div>
						<div class="col-md-6">
							<p>
								2-3 Days
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<button class="btn btn-outline-primary btn-block">
				Proceed
			</button>
		</div>
		<div class="col-md-4"></div>
	</div>
</div>


<?php
require_once('../partials/footer.php');
?>