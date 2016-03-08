
<!DOCTYPE html>
<html>
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>LS Waitlist</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Titillium+Web:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
   
  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">


</head>
<body style="background-color:#272727">

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <div class="container">
    
    <div class="row">
      <div class="five columns" style="margin-top: 5%">

        <h2>Add Customer</h2>
        <br>
         
        <!-- Form Submission, creating customer
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        
        <form action="../../resources/createcust.php" method="post">

            <label for="name">Full Name</label>
            <input class="u-full-width" type="text" placeholder="John Doe" name="name" required></input>
            <label for="email">Customer Email</label>
            <input class="u-full-width" type="email" placeholder="abc12d@acu.edu" name="email" required></input>
            <label for="item">Item</label>
            <input class="u-full-width" type="text" placeholder="Canon 60D" name="item" required></input>
            <label for="datepicker">Date Requested</label>
            <input class="u-full-width" type="text" name="datereq" value="<?php print(date('Y-m-d',time())) ?>" id="datepicker" required>
            <br>
            <br>
            <input class="button-primary" type="submit" value="Add Customer"/> &nbsp; &nbsp; <a href="../index.php"><button type="button">Go Back</button></a>

        </form>      
          
      </div>
    
  </div>

</body>
</html>

