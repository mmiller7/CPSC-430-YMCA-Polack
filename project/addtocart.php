<?php
//This page adds an item to the user's cart and then shows them their current cart
session_start();

$debug=false;

//Get cart from the session
$cart=$_SESSION['cart'];

//Create empty cart if it doesn't exist
if(!isset($cart))
{
	if($debug) echo "Init cart<br>\n";
	$cart=array();
}

//Get the card id and quantity
$gc_id=$_POST['gc_id'];
$qty=$_POST['qty'];
if($debug) echo "Got gc_id=".$gc_id." and qty=".$qty."<br>\n";

//See if it's in the cart already
$found=false;
foreach($cart as &$oldItem)
{
	if($debug) echo "Looking in cart for existing item<br>\n";
	//If it's already in the cart, increase quantity
	if($oldItem['gc_id'] == $gc_id)
	{
		if($debug) echo "Found item, adding quantity<br>\n";
		$found=true;
		//Add the quantity
		$oldItem['qty']+=$qty;
		
		//Break the loop
		break;
	}
}

//If it's not in the cart, add it.
if(!$found)
{
	if($debug) echo "Not in cart, adding new item<br>\n";
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
