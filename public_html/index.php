<?php
  
  // Include Medoo
  require_once '../resources/libraries/medoo.min.php';
 
  // Initialize
  $database = new medoo([
  	'database_type' => 'mysql',
  	'database_name' => 'waitlist',
  	'server' => 'localhost',
  	'username' => 'username',
    'password' => 'password',
  	'charset' => 'utf8'
  ]);

?>

<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Waitlist</title>
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
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">


</head>
<body style="background-color:#272727">

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

  <div class="container">
    
    <div class="row">
      <div class="twelve columns" style="margin-top: 5%">
        <img class="logo" src="img/logo.jpg">
        <button class="button" style="float:right;">Logout</button></a><a href="views/addcustomer.php">
        <button class="button-primary" style="float:right; margin-right:20px;">+ Add Customer</button></a>
        <br>
        <br>
        <h1>Equipment Waitlist</h1>
        <br>
        <table class="u-full-width">
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Item</th>
            <th>Date Requested</th>
            <th>Reservation Status</th>
            <th>Delete Customer</th>
          </tr>
          
    <!-- Pulling Records From Database 
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->

          <?php    
                 
            $result = $database->select("customers", "*");           
                
                //Iterate over result array
                foreach ($result as $row) {
                    //Setting up variables
                    $id=$row['ID'];
                    $fullname=$row['name']; 
                    $email=$row['email']; 
                    $item=$row['item']; 
                    $date=date_create($row['datereq']);                                       
                    $contacted=$row['contacted']; 
                    $timestamp=$row['time-contacted'];                     
                    
                    print "<tr>";
                    print "<td>$fullname</td>";
                    print "<td>$email</td>";
                    print "<td>$item</td>";
                    print "<td>";
                    print date_format($date, 'm/d/y');
                    print "</td>";
                    
                    if($contacted == 0) {
                      print "<td>
                        <form method=\"post\" action=\"../resources/email.php\" style=\"margin-bottom:0px\">
                          <input type=\"hidden\" name=\"id\" value=\"$id\">
                          <input type=\"hidden\" name=\"email\" value=\"$email\">
                          <input type=\"hidden\" name=\"item\" value=\"$item\">
                          <button type=\"submit\" name=\"fullname\" value=\"$fullname\" id=\"$fullname\" class=\"button-primary\">Email</button>
                        </form>
                      </td>";                  
                    }elseif ($contacted==1 AND ((time())-$timestamp>86400)) {
                      print"<td>                       
                        <span style=\"color:#9E3437; font-size:20px;\">&#10006;</span> Expired                     
                        </td>";        
                    }
                    elseif ($contacted==1) {
                      print"<td>                       
                        <span style=\"color:#3BA589; font-size:20px;\">&#10003;</span> Contacted
                        </td>";        
                    };
                    
                    print "<td>
                              <form method=\"post\" action=\"../resources/delete.php\" style=\"margin-bottom:0px;\">
                                <button type=\"submit\" name=\"id\" value=$id class=\"button delete\">Delete</button>
                              </form>
                          </td>";
                    
                    print "</tr>";                    
                    
                }                              
                
          ?>
          
        </table>
      </div> <!--Twelve Columns-->
    </div> <!--Row--> 
  </div> <!--Container-->

<!-- End Document
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>


