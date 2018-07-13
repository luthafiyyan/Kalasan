<?php
session_start(); //start session
include("../phplogin/koneksi.php");
setlocale(LC_MONETARY,"en_US"); // US national format (see : http://php.net/money_format)
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Order Anda - Kalasan Multimedia</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
</head>
<body oncontextmenu='return false;' onkeydown='return false;' onmousedown='return false;'>
<h3 style="text-align:center">Order Anda - Kalasan Multimedia</h3>

<br>
<h5 style="text-align:center"><?php echo date('l, d-m-Y'); ?></h5>


<?php
if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
	$total 			= 0;
	$list_tax 		= '';
	$cart_box 		= '<ul class="view-cart">';

	foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
		$product_name = $product["product_name"];
		$product_qty = $product["product_qty"];
		$product_price = $product["product_price"];
		$product_code = $product["id"];
		$product_speck = $product["product_speck"];
		$product_desc = $product["product_desc"];
		
		
		$item_price 	= sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price
		
		$cart_box 		.=  "<li>  &ndash;  $product_name (Qty : $product_qty   ) <span> Rp $item_price </span></li>";
		
		$subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
		$total 			= ($total + $subtotal); //Add up to total price
	}
	
	$grand_total = $total; //grand total
	
	foreach($taxes as $key => $value){ //list and calculate all taxes in array
			$tax_amount 	= round($total * ($value / 100));
			$tax_item[$key] = $tax_amount;
			$grand_total 	= $grand_total + $tax_amount; 
	}
	
	foreach($tax_item as $key => $value){ //taxes List
		$list_tax .= $key. ' '. $currency. sprintf("%01.2f", $value).'<br />';
	}
		
	//Print Shipping, VAT and Total

	$cart_box .= "<li class=\"view-cart-total\"><br>Harga Total : Rp ".sprintf("%01.2f", $grand_total)."

				</li>";
	$cart_box .= "</ul>";	
	echo $cart_box;
	
}else{
	echo "<center>Keranjang Anda Kosong !</center>";
}
?>
<center><a href="https://api.whatsapp.com/send?phone=62811286810&amp;text=Halo%20gan,%20Saya%20mau%20order....."><img src="images/wa.jpg" style="    max-width: 30%;" / /></a><br>
	<a style="font-family: calibri; font-size: 10pt;"href="https://web.whatsapp.com/send?phone=62811286810&amp;text=Halo%20gan,%20Saya%20mau%20order.....">Klik Di Sini Untuk Order Via Web</a>
</center>

</body>
</html>
