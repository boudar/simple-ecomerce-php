<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>export reciep</title>
</head>
<style>
  
</style>
<body id="reciep" onload="topdf()">    
    <h2 style="margin-left:160px;margin-top:30px">EcoSHop</h2>
    <table class="table" style="width:400px;margin-left:80px;margin-top:80px">    
        <tr><th>description</th><th>category</th><th>price</th></tr>

    <?php

require "conn.php";
$total = 0;
if (isset($_SESSION['cart'])) {
    $mycart = $_SESSION['cart'];
    foreach ($mycart as $id) {
        foreach ($id as $ids) {
            $d = $con->prepare("SELECT * from items where item_id=?");
            $d->execute(array($ids));
            $r = $d->fetch();
            $title = $r['title'];
            $price = $r['price'];
            $description = $r['description'];
            $total += $price;
            echo "<tr><td>".$r['description']."</td><td>".$r['category']."</td><td>".$r['price']."DH</td></tr>";
            
            
        }
    }
}

echo "<tr><th></th><th></th><th>Total:$total dh</th><th></tr>";

?>
</table>
 <span style="margin-left: 90px">Thank You <?php echo $_SESSION['username']?> for Your shop</span>
</body>
<?php
if (isset($_SESSION['username'])) {
    echo "<script>
    function topdf(){
        var exp = document.getElementById('reciep');
        html2pdf(exp);
        window.setTimeout(redirect,200);
    }
    function redirect(){
            window.location.replace('cart.php?buy=true');
    }
</script>";
}else {
    echo "<script>window.location.replace('login.php');</script>";
}

?>
<!-- <script>
    function topdf(){
        var exp = document.getElementById('reciep');
        html2pdf(exp);
        window.setTimeout(redirect,200);
    }
    function redirect(){
            window.location.replace('cart.php?buy=true');
    }
</script> -->
</html>