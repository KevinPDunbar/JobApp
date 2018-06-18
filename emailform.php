
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="sendemail.php" method="post" enctype="multipart/form-data">

 <h2>Your Contact Info</h2>
  <p>Your First Name* <br />
    <input type="text" name="firstName" id="firstName" required />
  </p>
  <p>Your Last Name* <br />
    <input type="text" name="lastName" id="lastName" required />
  </p>
  <p>Your Email* <br />
    <input type="email" name="email" id="email" required />
  </p>
  <p>Upload Your logo<br />
    <input type="file" name="uploaded_file" id="uploaded_file"> 
  </p>
  <input type="submit" name="submit" />
 </form>
        
    </body>
</html>


