<?php
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Math Calculator</title>
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/material.css">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.8.3/angular-material.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">
	    <!-- Angular + Bootstrap -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-animate.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-aria.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angular_material/0.8.3/angular-material.min.js"></script>
		<script src="js/controllers/formsController.js"></script>
	</head>
    <body>
    <div class="container-fluid" ng-app="App" ng-controller="global">
        <div class="col-sm-3 col-md-2c sidebar" ng-controller="sidebarCtrl">
            <section layout="row" class="sidebarbtn" layout-sm="column" layout-align="center center">
				<md-button class="md-primary md-hue-1" ng-click="ordinarySimpleAnnuityClick()">Ordinary Simple annuity</md-button>
			</section>
			<section layout="row" class="sidebarbtn" layout-sm="column" layout-align="center center">
				<md-button class="md-primary md-hue-1" ng-click="compareEconomicValueClick()">Compare Economic Value</md-button>
		    </section>
			<section layout="row" class="sidebarbtn" layout-sm="column" layout-align="center center">
				<md-button class="md-primary md-hue-1" ng-click="originalLoanAndBalanceClick()">Original Loan/Balance</md-button>
			</section>
			<section layout="row" class="sidebarbtn" layout-sm="column" layout-align="center center">
				<md-button class="md-primary md-hue-1" ng-click="generalAnnuitiesClick()">General Annuities</md-button>
		    </section>
			<section layout="row" class="sidebarbtn" layout-sm="column" layout-align="center center">
				<md-button class="md-primary md-hue-1" ng-click="compoundInterestClick()">Compound Interest</md-button>
		    </section>
        </div>
        
        
        
        <!--main content begins here-->
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Math Calculators</h1>		
			
			<div ng-hide="ordinarySimpleAnnuity">
				<!--pv Ordinary Simple Annuity -->
	            <div class="jumbo" ng-controller="fvOrdinarySimpleAnnuityCtrl">
			        <div layout layout-sm="column">
						<md-input-container flex="100" class="float">
							<h2>Future value of an ordinary simple annuity</h2>
						</md-input-container>
		            </div>	
		            <div layout layout-sm="column">
						<md-input-container flex="33" class="float">
							<label>PMT</label>
							<input ng-model="PMT" placeholder="Example '450'">
						</md-input-container>
						<md-input-container flex="33" class="float">
							<label>i</label>
							<input ng-model="I" placeholder="Example 8% compounded monthly = '8'">
						</md-input-container>
						<md-input-container flex="33" class="float">
							<label>n</label>
							<input ng-model="N" placeholder="Example number of compounding periods - '36'">
						</md-input-container>
		            </div>
		            <div layout layout-sm="column">
			            <md-input-container flex="100" class="float">
							<h1 style="text-align: center;">
								FV = {{FV() | currency}}<br>
								Deposit = {{PMT * N | currency}}<br>
								Interest Earned = {{IE() | currency}}				
							</h1>
						</md-input-container>
					</div>			
	            </div>
				
				<div class="jumbo" ng-controller="pvOrdinarySimpleAnnuityCtrl">
			        <div layout layout-sm="column">
						<md-input-container flex="100" class="float">
							<h2>Present value of an ordinary simple annuity</h2>
						</md-input-container>
		            </div>	
		            <div layout layout-sm="column">
						<md-input-container flex="33" class="float">
							<label>PMT</label>
							<input ng-model="PMT" placeholder="Example '450'">
						</md-input-container>
						<md-input-container flex="33" class="float">
							<label>i</label>
							<input ng-model="I" placeholder="Example 8% compounded monthly = '8'">
						</md-input-container>
						<md-input-container flex="33" class="float">
							<label>n</label>
							<input ng-model="N" placeholder="Example number of compounding periods - '36'">
						</md-input-container>
		            </div>
		            <div layout layout-sm="column">
			            <md-input-container flex="100" class="float">
							<h1 style="text-align: center;">
								PV = {{PMT * N | currency}}<br>
								Borrowed = {{PV() | currency}}<br>
								Interest Paid = {{IP() | currency}}				
							</h1>	
						</md-input-container>
					</div>			
	            </div> 
			</div>
            
            
			<div ng-hide="compareEconomicValue">
				<div class="jumbo" ng-controller="compareEconomicValueLump">
			        <div layout layout-sm="column">
						<md-input-container flex="100" class="float">
						<h2>Compare Economic Value with Future Value</h2>
						</md-input-container>
		            </div>	
		            <div layout layout-sm="column">
						<md-input-container flex="25" class="float">
							<label>Interest Rate Per Time Period as %</label>
							<input ng-model="I" placeholder="Example '5'">
						</md-input-container>
						<md-input-container flex="25" class="float">
							<label>Number of Time Periods</label>
							<input ng-model="N" placeholder="Example 8% compounded monthly = '8'">
						</md-input-container>
						<md-input-container flex="25" class="float">
							<label>Future Value</label>
							<input ng-model="FV" placeholder="Future Value, example 100000">
						</md-input-container>
						<md-input-container flex="25" class="float">
                            <label>Down Payment</label>
                            <input ng-model="downPayment" placeholder="Example '5'">
                        </md-input-container>
		            </div>
		            <div layout layout-sm="column">
			            <md-input-container flex="100" class="float">
							<h1 style="text-align: center;">
								PV of Lump Sum = {{PV() | currency}}
							</h1>
							<h1 style="text-align: center;">
							    Todays value of total agreement = {{total() | currency}}
							</h1>
						</md-input-container>
					</div>			
				</div>

				<div class="jumbo" ng-controller="compareEconomicValuePmt">
                    <div layout layout-sm="column">
                        <md-input-container flex="100" class="float">
                        <h2>Compare Economic Value with Payments</h2>
                        </md-input-container>
                    </div>
                    <div layout layout-sm="column">
                        <md-input-container flex="25" class="float">
                            <label>Interest Rate Per Time Period as %</label>
                            <input ng-model="I" placeholder="Example '5'">
                        </md-input-container>
                        <md-input-container flex="25" class="float">
                            <label>Number if Time Periods</label>
                            <input ng-model="N" placeholder="Example 6 durations">
                        </md-input-container>
                        <md-input-container flex="25" class="float">
                            <label>PMT (Payment amounts)</label>
                            <input ng-model="PMT" placeholder="Regular Payments amount">
                        </md-input-container>
                        <md-input-container flex="25" class="float">
                            <label>Down Payment</label>
                            <input ng-model="downPayment" placeholder="Down payment ex 16000">
                        </md-input-container>
                    </div>
                    <div layout layout-sm="column">
                        <md-input-container flex="100" class="float">
                            <h1 style="text-align: center;">
                                PV = {{PV() | currency}}
                            </h1>
                            <h1 style="text-align: center;">
                                Total = {{total() | currency}}
                            </h1>
                        </md-input-container>
                    </div>
                </div>
			</div>
	
			
			
			<div ng-hide="originalLoanAndBalance">
				<div class="jumbo" ng-controller="originalLoanAndBalanceCtrl">
			        <div layout layout-sm="column">
						<md-input-container flex="100" class="float">
						<h2>Calculating the Original Loan and a Subsequent Balance</h2>
						</md-input-container>
		            </div>	
		            <div layout layout-sm="column">
						<md-input-container flex="25" class="float">
							<label>PMT</label>
							<input ng-model="PMT" placeholder="Example '450'">
						</md-input-container>
						<md-input-container flex="25" class="float">
							<label>i</label>
							<input ng-model="I" placeholder="Example 8% compounded monthly = '8'">
						</md-input-container>
						<md-input-container flex="25" class="float">
							<label>n</label>
							<input ng-model="N" placeholder="Example number of compounding periods - '36'">
						</md-input-container>
						<md-input-container flex="25" class="float">
							<label>n payments</label>
							<input ng-model="Np" placeholder="Example number of compounding periods - '36'">
						</md-input-container>
		            </div>
		            <div layout layout-sm="column">
			            <md-input-container flex="100" class="float">
							<h1 style="text-align: center;">
								Original Loan Value = {{PV() | currency}}<br>
								Balance after '{{Np}}' payments = {{PVNp() | currency}}				
							</h1>
						</md-input-container>
					</div>			
				</div>
			</div>
			
			
			<div ng-hide="generalAnnuities">
				<div class="jumbo" ng-controller="generalAnnuitiesCtrl">
			        <div layout layout-sm="column">
						<md-input-container flex="100" class="float">
						<h2>Calculating FV with i<sub>2</sub></h2>
						</md-input-container>
		            </div>	
		            <div layout layout-sm="column">
						<md-input-container flex="33" class="float">
							<label>i</label>
							<input ng-model="I" placeholder="8% compounded = '8'">
						</md-input-container>
						<md-input-container flex="33" class="float">
							<label>c</label>
							<input ng-model="C" placeholder="Compoundings per year = '2'">
						</md-input-container>
						<md-input-container flex="33" class="float">
							<label>n</label>
							<input ng-model="N" placeholder="Payments per year = '52'">
						</md-input-container>
		            </div>
		            <div layout layout-sm="column">
						<md-input-container flex="50" class="float">
							<label>PMT</label>
							<input ng-model="PMT" placeholder="Example $'50' per month">
						</md-input-container>
						<md-input-container flex="50" class="float">
							<label>N<sub>y</sub></label>
							<input ng-model="Ny" placeholder="Number of years '1'">
						</md-input-container>
		            </div>
		            <div layout layout-sm="column">
			            <md-input-container flex="100" class="float">
							<h1 style="text-align: center;">
								i<sub>2</sub> = {{I2()}}<br>
								FV = {{GA() | currency}}
							</h1>
						</md-input-container>
					</div>			
				</div>
			</div>	

			
			<div ng-hide="compoundInterest">
				<div class="jumbo" ng-controller="compoundInterestCtrl">
			        <div layout layout-sm="column">
						<md-input-container flex="100" class="float">
						<h2>Calculating FV</h2>
						</md-input-container>
		            </div>	
		            <div layout layout-sm="column">
						<md-input-container flex="33" class="float">
							<label>pv (Initial value of the loan)</label>
							<input ng-model="pv">
						</md-input-container>
						<md-input-container flex="33" class="float">
							<label>i (interest rate per compounding period)</label>
							<input ng-model="i">
						</md-input-container>
						<md-input-container flex="33" class="float">
							<label>n (number of compounding periods</label>
							<input ng-model="n">
						</md-input-container>
		            </div>
		            <div layout layout-sm="column">
			            <md-input-container flex="100" class="float">
							<h1 style="text-align: center;">
								FV = {{fv() | currency}}
							</h1>
						</md-input-container>
					</div>			
				</div>
			</div>		

			<!-- Vendor Modal -->
			<div class="modal fade" id="vendorModal" tabindex="-1" role="dialog" aria-labelledby="vendorModal" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="vendorModal" id="vendorModal">Add Vendor</h4>
			      </div>
			      <div class="modal-body form-group">
			        <form action="" method="post" onsubmit="return(formValidate())" id="addVendorForm" role="addVendorForm">
				        <label for="vendorNumber">Vendor Number</label>
				        <input type="text" class="form-control" name="addVendorNo" id="addVendorNo">
				        <label for="vendorName">Vendor Name</label>
				        <input type="text" class="form-control" name="addVendorName" id="addVendorName">
				        <label for="address1">Address 1</label>
				        <input type="text" class="form-control" name="addVendorAddress1" id="addVendorAddress1">
				        <label for="address2">Address 2</label>
				        <input type="text" class="form-control" name="addVendorAddress2" id="addVendorAddress2">
				        <label for="city">City</label>
				        <input type="text" class="form-control" name="addVendorCity" id="addVendorCity">
				        <label for="province">Province</label>
				        <input type="text" class="form-control" name="addVendorProvince" id="addVendorProvince">
				        <label for="postalCode">Postal Code</label>
				        <input type="text" class="form-control" name="addVendorPostalCode" id="addVendorPostalCode">
				        <label for="country">Country</label>
				        <input type="text" class="form-control" name="addVendorCountry" id="addVendorCountry">
				        <label for="phone">Phone</label>
				        <input type="text" class="form-control" name="addVendorPhone" id="addVendorPhone">
				        <label for="fax">Fax</label>
				        <input type="text" class="form-control" name="addVendorFax" id="addVendorFax">
			        </form>
			      </div>
			      <div class="modal-footer">
				  <section layout="row" class="sidebarbtn" layout-sm="column" layout-align="center center">
				    <md-button class="md-raised-form md-raised md-warn md-hue-1" data-dismiss="modal">Close</md-button>
					<md-button class="md-raised-form md-raised md-primary md-hue-1" type="submit" name="addVendorSubmit" form="addVendorForm" value="Submit">Add Vendor</md-button>
			      </section>
				  </div>
			    </div>
			  </div>
			</div><!-- End Modal -->
			<!-- Part Modal -->
			<div class="modal fade" id="partModal" tabindex="-1" role="dialog" aria-labelledby="partModal" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="partModal" id="partModal">Add Part</h4>
			      </div>
			      <div class="modal-body">
			        <form action="" method="post" onsubmit="return(formValidate())" id="addPartForm" role="addPartForm">
				        <label for="partId">Part ID</label>
				        <input type="text" class="form-control" name="addPartId" id="addPartId">
				        <label for="vendorNo">Vendor No</label>
				        <input type="text" class="form-control" name="addPartVendorNo" id="addPartVendorNo">
				        <label for="description">Description</label>
				        <input type="text" class="form-control" name="addPartDescription" id="addPartDescription">
				        <label for="onHand">On Hand</label>
				        <input type="text" class="form-control" name="addPartOnHand" id="addPartOnHand">
				        <label for="onOrder">On Order</label>
				        <input type="text" class="form-control" name="addPartOnOrder" id="addPartOnOrder">
				        <label for="cost">Cost</label>
				        <input type="text" class="form-control" name="addPartCost" id="addPartCost">
				        <label for="listPrice">List Price</label>
				        <input type="text" class="form-control" name="addPartListPrice" id="addPartListPrice">
			        </form>
			      </div>
			      <div class="modal-footer">
				    <section layout="row" class="sidebarbtn" layout-sm="column" layout-align="center center">
				    <md-button class="md-raised-form md-raised md-warn md-hue-1" data-dismiss="modal">Close</md-button>
					<md-button class="md-raised-form md-raised md-primary md-hue-1" type="submit" name="addPartSubmit" form="addPartForm" value="Submit">Add Part</md-button>
			        </section>
			      </div>
			    </div>
			  </div>
			</div><!-- End Modal -->		
        </div><!-- End Main Content -->
    </div><!-- End Fluid Container -->
	<div id="footer">
		<h6>Taylor Watson</h6>
	</div>

	</body>
</html>
