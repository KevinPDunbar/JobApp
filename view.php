<!doctype html>
<html>
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/custom.css" rel="stylesheet">
     <script src="js/respond.js"></script>
	 <script src="js/script.js"></script>

</head>

<body>
<div class="row-fluid">
        <nav class="navbar nav nav-tabs nav-justified navcolor  ">
		<div class = "container">
		<div class=" col-xs-1  ">
		 <a  href="index.html"><img src="images/homebutton.png" alt="l." height="30px" width="30px" class="brand " ></a>
		</div>
		<div class=" col-lg-6 col-lg-offset-2 col-md-6 col-md-offset-2 col-sm-6 col-xs-6 col-xs-offset-1 ">
      
         <input type="text" class=" field  input-large1 " id="email" placeholder="Keyword">
		 <span class="glyphicon glyphicon-search form-control-feedback icon1"></span>
		  </div>
		  <div class=" col-lg-3 col-md-3 col-sm-4 col-xs-3 ">
		<!--<input type="button" class="btn btcustom1 pull-right"  value="Filter"   >-->
		<button type="button" class="btn btcustom1 pull-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Filter</button>
		
		<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    
      <div class="modal-body">
        <form>
          <div class="form-group">
		  
            <label for="relevance" >Relevance:</label>
			 <p>Sort by date</p>
            
	      
          </div>
		  
		  <hr></hr>
		  
          <div class="form-group">
            <label for="location" >Distance</label>
			
            
			
          </div>
		  <hr></hr>
		   
		   <label for="jobtype" >Job Type</label>
		
            <div class="form-group">
			<div class=" col-xs-4 text-center ">
			<label class="radio-inline modal1">
      <input type="radio" name="optradio">Permanent
	 </label> 
	</div>
	<div class=" col-xs-4 text-center ">
    <label class="radio-inline modal1">
      <input type="radio" name="optradio">Contract
    </label>
	</div>
	<div class=" col-xs-4 text-center ">
    <label class="radio-inline modal1">
      <input type="radio" name="optradio">temporary
    </label>
	</div>
	<div class=" col-xs-4 text-center ">
		  <label class="radio-inline modal1">
      <input type="radio" name="optradio">Full-Time
    </label>
	</div>
	<div class=" col-xs-4 text-center ">
	<label class="radio-inline modal1">
      <input type="radio" name="optradio">Part-Time
    </label>
	</div>
	<div class=" col-xs-4 text-center ">
	<label class="radio-inline modal1">
      <input type="radio" name="optradio">Internship
    </label>
	</div>
	
	
        </div> 
		
       
        

     
	 </form>
	 
       
    </div>
	
  </div>
</div>
	     
		<!--<button type="submit" class="  btn  btcustom pull-right ">Filter</button>-->
	    
	    </div>
		
		
		</div>
		</div>
		</div>
		</div>
		<div class = "container">
		<div class="row">
        <nav class="navbar navbar-default nav1 ">
		
		
		 <ul class="nav nav-tabs nav-justified" role="tablist">
    <div class=" col-xs-4 text-center ">
    <li role="presentation" ><a href="#Map" aria-controls="Map"  role="tab" data-toggle="tab"><h3>Map</h3></a></li>
	</div>
	<div class="  col-xs-4 text-center  ">
    <li role="presentation"><a href="#list" aria-controls="list"  role="tab" data-toggle="tab"><h3>List</h3></a></li>
	</div>
	<div class="  col-xs-2  col-xs-offset-2 ">
    <li role="presentation"><a href="#Saved" aria-controls="Saved" role="tab" data-toggle="tab"><h3>Saved Jobs</h3></a></li>
	</div>
  </ul>

  <!-- Tab panes -->
  
         
         
		
		
		</div>
		<div class="tab-content">
   
		<div  class="tab-pane active" id="Map">this is where the map goes</div>
		<div role="tabpanel" class="tab-pane " id="list">this is the listview</div>
		<div role="tabpanel" class="tab-pane " id="Saved">this is the section for favourite jobs that are saved</div>
        </div>
		</div>
		

       </div>
            
             


       
			
 

<!--javascript-->
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jscript.js"></script>

</body>
</html>
