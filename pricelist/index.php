<?php
session_start(); //start session
include("../phplogin/koneksi.php"); //include config file
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Kalasan Multimedia Pricelist</title>
<link href="style/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script>
$(document).ready(function(){	
		$(".form-item").submit(function(e){
			var form_data = $(this).serialize();
			var button_content = $(this).find('button[type=submit]');
			button_content.html('Adding...'); //Loading button text 

			$.ajax({ //make ajax request to cart_process.php
				url: "cart_process.php",
				type: "POST",
				dataType:"json", //expect json value from server
				data: form_data
			}).done(function(data){ //on Ajax success
				$("#cart-info").html(data.items); //total items in cart-info element
				button_content.html('Add to Cart'); //reset button text to original text
				alert("Item added to Cart!"); //alert user
				if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
					$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
				}
			})
			e.preventDefault();
		});

	//Show Items in Cart
	$( ".cart-box").click(function(e) { //when user clicks on cart box
		e.preventDefault(); 
		$(".shopping-cart-box").fadeIn(); //display cart box
		$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
		$("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
	});
	
	//Close Cart
	$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
		e.preventDefault(); 
		$(".shopping-cart-box").fadeOut(); //close cart-box
	});
	
	//Remove items from cart
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); //get product code
		$(this).parent().fadeOut(); //remove item element from box
		$.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
			$("#cart-info").html(data.items); //update Item count in cart-info
			$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
		});
	});

});
</script>
</head>
<body>
<div align="center">
<h3>Kalasan Multimedia Pricelist</h3>
</div>

<a href="#" class="cart-box" id="cart-info" title="View Cart">
<?php 
if(isset($_SESSION["products"])){
	echo count($_SESSION["products"]); 
}else{
	echo 0; 
}
?>
</a>

<div class="shopping-cart-box">
<a href="#" class="close-shopping-cart-box" >Close</a>
<h3>Your Item Cart</h3>
    <div id="shopping-cart-results">
    </div>
</div>

<?php
//List products from database
$results = $conn->query("SELECT * FROM products_list");
if (!$results){
    printf("Error: %s\n", $mysqli_conn->error);
    exit;
}

//Display fetched records as you please
$products_list =  '<ul class="products-wrp">';

while($row = $results->fetch_assoc()) {
$products_list .= <<<EOT
<table class="item-box" cellpadding="2" >
    <tr>
       <th >No</th>
       <th >Nama</th>
       <th >Speck</th>
       <th >Harga</th>
       <th >Keterangan</th>
       <th >Qty</th>
       <th >Aksi</th>
    </tr>
    <tr>        
        <td class=mdl-data-table__cell--non-numeric>$no</td>
                        <td class=mdl-data-table__cell--non-numeric>$row[product_name]</td>                       
                        <td class=mdl-data-table__cell--non-numeric>$row[product_speck]</td>
                        <td class=mdl-data-table__cell--non-numeric>Rp $row[product_price]</td>
                        <td class=mdl-data-table__cell--non-numeric>$row[product_desc]</td>
                        <td align=center><input name="product_qty" ></td>                        
        <td align=center><button type="submit">Tambah</button></td>    
    </tr>    
    <input name="id" type="hidden" value="{$row["id"]}">
</table>
</form>
EOT;

}
$products_list .= '</ul></div>';

echo $products_list;
?>
</body>
</html>
