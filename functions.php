<?php 

	use \Hcode\Model\User;
	use \Hcode\Model\Cart;
	
	function post($key)
	{
		return str_replace("'", "", $_POST[$key]);
	}

	function get($key)
	{
		return str_replace("'", "", $_GET[$key]);
	}

	function formatDate($date)
	{

		return date('d/m/Y', strtotime($date));
		
	}

	function formatPrice($vlprice)
	{

		if (!$vlprice > 0) $vlprice = 0;

		return number_format($vlprice, 2, ",", ".");

	}

	function formatValueToDecimal($value) : float
	{

		$value = str_replace('.', '', $value);
		return str_replace(',', '.', $value);
	}

	function checkLogin($inadmin = true)
	{

		return User::checkLogin($inadmin);

	}

	function getUserName()
	{

		$user = User::getFromSession();

		return $user->getdesperson();

	}

	function getCartNrQtd()
	{

		$cart = Cart::getFromSession();

		$totals = $cart->getProductsTotals();

		return $totals['nrqtd'];

	}

	function getCartVlSubTotal()
	{

		$cart = Cart::getFromSession();

		$totals = $cart->getProductsTotals();

		return formatPrice($totals['vlprice']);
		
	}

	function encrypt_decrypt($action, $string)
	{

		$output = false;
	 
	   	// hash
	   	$key = hash('sha256', User::SECRET);

	   	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	   	$iv = substr(hash('sha256', User::IV), 0, 16);

	   	if ($action == 'encrypt') 
	   	{

     		$output = base64_encode(openssl_encrypt($string, User::CIFRA, $key, 0, $iv));

     	} else {

     		if ($action == 'decrypt') 
     		{

     			$output = openssl_decrypt(base64_decode($string), User::CIFRA, $key, 0, $iv);

			}
		}

		return $output;
	}
	
 ?>