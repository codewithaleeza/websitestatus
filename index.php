<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/x-icon" href="status.ico" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Poppins|Work+Sans&display=swap" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="style.css">
<title>Website Status </title>
</head>

<body>

<div class="container ">


  <center> <img src="status.ico" style="height:100px;"> <h1>Check Website Status Availability</h1></center>
<hr>
<div class="wrap">
  <form action="" method="GET">
   <div class="search">

     <label class="col-sm-5"><b>Please Enter Website Name: </b></label>

      <input type="text" name="domain" class="searchTerm" placeholder="WebsiteName">
      <select name="suffix">
<option value=".com">.com</option>
<option value=".ph">.ph</option>
<option value=".co.ph">.co.ph</option>
<option value=".net">.net</option>
<option value=".org">.org</option>
<option value=".biz">.biz</option>
<option value=".info">.info</option>
<option value=".mobi">.mobi</option>
<option value=".ws">.ws</option>
<option value=".edu">.edu</option>
<option value=".gov">.gov</option>
<option value=".inc">.go.id</option>
<option value=".tv">.tv</option>
<option value=".cn">.cn</option>
<option value=".cc">.cc</option>
</select>
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>

   </div></form>
   <?php
   function url_test( $url ) {
     $timeout = 10;
     $ch = curl_init();
     curl_setopt ( $ch, CURLOPT_URL, $url );
     curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
     curl_setopt ( $ch, CURLOPT_TIMEOUT, $timeout );
     $http_respond = curl_exec($ch);
     $http_respond = trim( strip_tags( $http_respond ) );
     $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
     if ( ( $http_code == "200" ) || ( $http_code == "302" ) ) {
       return true;
     } else {
       // return $http_code;, possible too
       return false;
     }
     curl_close( $ch );
   }
if(isset($_GET['domain'])){
  $domain2=$_GET['domain'];
  $website = trim($_GET['domain']).$_GET['suffix'];
  if(empty($domain2)){
    echo "<p style='font-size:20px;text-align:center;color:white;'>Field Empty. Please enter domain name.</p>";
  }
  else if (!is_valid_domain_name($domain2)) {
    echo "<p style='font-size:20px;text-align:center;color:white;'>Invalid Domain name</p>";

  }
  else if( !url_test( $website ) ) {
     echo "<p style='font-size:20px;text-align:center;color:white;'>".$website ." is down!</p>";
   }
   else { echo "<p style='font-size:20px;text-align:center;color:white;'>".$website ." functions correctly.</p>"; }
 }
 $domain2=$_GET['domain'];
 function is_valid_domain_name($domain2) {
  // Thanks to http://stackoverflow.com/a/4694816
  return (preg_match("/^([a-z\d](-*[a-z\d])*)(\.([a-z\d](-*[a-z\d])*))*$/i", $domain2) //valid chars check
    && preg_match("/^.{1,253}$/", $domain2) //overall length check
    && preg_match("/^[^\.]{1,63}(\.[^\.]{1,63})*$/", $domain2)   ); //length of each label
}
?><hr>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>
