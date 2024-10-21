<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stp.css">
   <title>show_profile</title>
  </head>
  <body>


 <form method = "post" action = "https://www.sandbox.paypal.com/cgi-bin/websrc">
  <input type = "hidden" name = "cmd" value="_xclick">
  <input type = "hidden" name = "business" value="sb-g10a518053886@business.example.com">
  <input type = "hidden" name = "item_name" value="Books">
  <input type = "hidden" name = "item_number" value="1">
  <input type = "hidden" name = "amount" value="200">
  <input type = "hidden" name = "no_shipping" value="0">
  <input type = "hidden" name = "no_note" value="1">
  <input type = "hidden" name = "currency_code" value="USD">
  <input type = "hidden" name = "lc" value="AU">
  <input type = "hidden" name = "rm" value="2">
  <input type = "hidden" name = "notify_url" value="http://localhost/cwh/confirm.php">
  <input type = "hidden" name = "return" value="http://localhost/cwh/confirm.php">

  <button type = "submit" name ="pay">Pay Now</button>

 </form>
 </body>
 </html>