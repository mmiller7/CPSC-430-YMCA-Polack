<?php
//This page adds an item to the user's cart and then shows them their current cart
session_start();

//Get cart from the session
$cart=$_SESSSION['cart'];

//Create empty cart if it doesn't exist
if(!isset($cart))
	$cart=array();

//Get the card id and quantity
$gc_id=$_POST['gc_id'];
$qty=$_POST['qty'];
echo 'Got gc_id=',$gc_id,' qty=',$qty,"<br>\n";

//See if it's in the cart already
$found=false;
foreach($cart as &$item)
{
	echo "Looking in the cart<br>\n";
	//If it's already in the cart, increase quantity
	if($item['gc_id'] == $gc_id)
	{
		$found=true;
		//Add the quantity
		$item['qty']+=$qty;
		
		//Break the loop
		break;
	}
}

//If it's not in the cart, add it.
if(!$found)
{
	echo "Putting new stuff in the cart<br>\n";
	//Build the item details
	$item=array();
	$item['gc_id']=$gc_id;
	$item['qty']=$qty;

	//Add them to the cart
	$cart[]=$item;
}

//Store it back in the session
$_SESSION['cart']=$cart;

//Show them their cart
include("viewcart.php");
?>
