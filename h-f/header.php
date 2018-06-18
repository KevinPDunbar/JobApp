  <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="slide-nav">
  <div style="overflow-x: hidden;" class="container">
   <div class="navbar-header">
    <a class="navbar-toggle" onclick="disableScrolling()"> 
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
     </a>
    <a class="navbar-brand" href="indexNEW.php">Workr</a>
   </div>
   <div id="slidemenu">
     
         
     
    <ul class="nav navbar-nav">
     <li class="active"><a href="#">Home</a></li>
     <li><a href="#about">About</a></li>
     <li><a href="#contact">Contact</a></li>

        <?php
          if(is_logged_in())
          {
            echo'<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>'.
           '<ul class="dropdown-menu">'.
            '<li><a href="#">View Account</a></li>'.
            '<li class="divider"></li>'.
            '<li><a href="#">Edit Information</a></li>'.
            '<li class="divider"></li>'.
            '<li><a href="logout.php">Logout</a></li>'.
           '</ul>'.
           '</li>';
          }

          else if(!is_logged_in())
          {
            echo'<li><a href="loginFormNEW.php">Sign In</a></li>';
          }

        ?>
      
          
        
    </ul>
          
   </div>
  </div>
 </div>

<script>
    var x =0;

  function disableScrolling()
  {
    console.log(x);
    if(x %2 == 0 )
    {
      document.body.style.overflowY = "hidden";
      x = x +1;

       /*var $body = $(document);
    $body.bind('scroll', function() {
        // "Disable" the horizontal scroll.
        if ($body.scrollTop() !== 0) {
            $body.scrollTop(0);
        }
    }); */
    }
    else if(!x %2 == 0)
    {
      document.body.style.overflow = "scroll"; 
      document.body.style.overflowX = "hidden";  
      x = x +1;

       /*var $body = $(document);
        $body.scrollTop(false);*/
    }

  }
</script>