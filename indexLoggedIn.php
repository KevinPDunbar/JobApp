<?php
require_once 'utils/functions.php';
require_once 'User.php';
require_once 'Connection.php';

start_session();

if (!is_logged_in()) {
    header("Location: loginForm.php");
}

$user = $_SESSION['user'];

$connection = Connection::getInstance();

?>

<!doctype html>
		
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/custom.css" rel="stylesheet">
     <script src="js/respond.js"></script>
	 <script src="js/script.js"></script>

</head>
<body>

<div class="row-fluid">
<nav class="navbar nav nav-tabs nav-justified navcolor  ">
<div class="container container-fluid">
 <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1  ">
		 <a  href="index.php"><img src="images/homebutton.png" alt="l." height="30px" width="30px" class="brand " ></a>
</div>
<div class=" col-lg-2 7 col-md-2  col-sm-6 col-sm-offset-1 col-xs-4 col-xs-offset-1 ">
    <button type="submit" class=" btn  btcustom3  " onclick="location.href='logout.php';">Logout</button>
</div>
<div class=" col-lg-5  col-md-2  col-sm-3 col-xs-5 ">
    <button type="submit" class="  btn btcustom3 " onclick="location.href='latestJobsLoggedIn.php';">Latest jobs</button>
</div>
</div>
</div>


<div class="container container-fluid">
		   
		  <div class="row ">
		  
		 <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3  col-sm-12 col-xs-12 ">
	 
	   <a  href="index.php"><img src="images/logoj.png" alt="l."  class=" logo center-block"> </a>
    </div>
       
	   
      
     <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 ">
	
		  
      <form action="jobSearchLoggedIn.php" method="POST">      
        
       
		 
          
         <div class="form-group ">
           <label for="what" >What</label>
             <input type="text" class="form-control " id="name" name="name" placeholder="Keyword">
          </div>
            
         <div class="form-group">
            <label for="Where">Where</label>
            <select class="form-control i" id="location" name="location" placeholder="Location" >
                <option value="">All</option>
                <option value="antrim">Antrim</option>
                <option value="armagh">Armagh</option>
                <option value="carlow">Carlow</option>
                <option value="cavan">Cavan</option>
                <option value="clare">Clare</option>
                <option value="cork">Cork</option>
                <option value="derry">Derry</option>
                <option value="donegal">Donegal</option>
                <option value="down">Down</option>
                <option value="dublin">Dublin</option>
                
                <option value="dublin 1">Dublin 1</option>
                <option value="dublin 2">Dublin 2</option>
                <option value="dublin 3">Dublin 3</option>
                <option value="dublin 4">Dublin 4</option>
                <option value="dublin 5">Dublin 5</option>
                <option value="dublin 6">Dublin 6</option>
                <option value="dublin 6W">Dublin 6W</option>
                <option value="dublin 7">Dublin 7</option>
                <option value="dublin 8">Dublin 8</option>
                <option value="dublin 9">Dublin 9</option>
                <option value="dublin 10">Dublin 10</option>
                <option value="dublin 11">Dublin 11</option>
                <option value="dublin 12">Dublin 12</option>
                <option value="dublin 13">Dublin 13</option>
                <option value="dublin 14">Dublin 14</option>
                <option value="dublin 15">Dublin 15</option>
                <option value="dublin 16">Dublin 16</option>
                <option value="dublin 17">Dublin 17</option>
                <option value="dublin 18">Dublin 18</option>
                <option value="dublin 20">Dublin 20</option>
                <option value="dublin 22">Dublin 22</option>
                <option value="dublin 24">Dublin 24</option>
                 
                <option value="fermanagh">Fermanagh</option>
                <option value="galway">Galway</option>
                <option value="kerry">Kerry</option>
                <option value="kildare">Kildare</option>
                <option value="kilkenny">Kilkenny</option>
                <option value="laois">Laois</option>
                <option value="leitrim">Leitrim</option>
                <option value="limerick">Limerick</option>
                <option value="longford">Longford</option>
                <option value="louth">Louth</option>
                <option value="mayo">Mayo</option>
                <option value="meath">Meath</option>
                <option value="monaghan">Monaghan</option>
                <option value="offaly">Offaly</option>
                <option value="roscommon">Roscommon</option>
                <option value="sligo">Sligo</option>
                <option value="tipperary">Tipperary</option>
                <option value="tyrone">Tyrone</option>
                <option value="waterford">Waterford</option>
                <option value="westmeath">Westmeath</option>
                <option value="wexford">Wexford</option>
                <option value="wicklow">Wicklow</option>
            </select>
          </div>
          
          <div class="form-group">
            <label for="Category">Category</label>
            <select class="form-control i" id="type" name="type" placeholder="Category" >
                <option value="">All</option>
                <option value="Accounting">Accounting</option>
                <option value="Administrative">Administrative</option>
                <option value="Media">Media</option>
                <option value="Automotive">Automotive</option>
                <option value="Biotechnology">Biotechnology</option>
                <option value="Business">Business</option>
                <option value="Constuction">Construction</option>
                <option value="Customer Service">Customer Service</option>
                <option value="Education">Education</option>
                <option value="Engineering">Engineering</option>
                <option value="Executive">Executive</option>
                <option value="Facilities">Facilities</option>
                <option value="Financial Services">Financial Services</option>
                <option value="Government">Government</option>
                <option value="Healthcare">Healthcare</option>
                <option value="Hospitality">Hospitality</option>
                <option value="Human Resources">Human Resources</option>
                <option value="Information Technology">Information Technology</option>
                <option value="Insurance">Insurance</option>
                <option value="Law Enforcement">Law Enforcement</option>
                <option value="Legal">Legal</option>
                <option value="Manufacturing">Manufacturing</option>
                <option value="Marketing">Marketing</option>
                <option value="Other">Other</option>
                <option value="Real Estate">Real Estate</option>
                <option value="Retail">Retail</option>
                <option value="Sales">Sales</option>
                <option value="Science">Science</option>
                <option value="Telecommunications">Telecommunications</option>
                <option value="Transportation">Transportation</option> 
            </select>
          </div>
		  
		   <div class="collapse" id="collapseExample">
  
         <div class="form-group">
           <label for="type">Job Type</label>
             <input type="text" class="form-control " id="type2" placeholder="Type">
          </div>
	   
	
	</div>
    
            </div>
	  <div class=" form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
		   <button type="submit" class=" btn btcustom2 ">Find Jobs</button>
		   </div>
		   
	       
	</div>
	</div>   
           
           
        
        
       
      </form>
         
   
	
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jscript.js"></script>
	 </body>
	 </html>
	 
  
	