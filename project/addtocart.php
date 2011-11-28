<?php
//This page adds an item to the user's cart and then shows them their current cart
session_start();

//Get cart from the session
$cart=$_SESSION['cart'];

//Create empty cart if it doesn't exist
if(!isset($cart))
	$cart=array();

//Get the card id and quantity
$gc_id=$_POST['gc_id'];
$qty=$_POST['qty'];

//See if it's in the cart already
$found=false;
foreach($cart as &$item)
{
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
