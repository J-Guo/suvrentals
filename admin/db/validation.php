<?php
	function emailvalidation($email)
	{
		$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
		if(ereg($pattern, $email))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function amountvalidation($amount)
	{
		$amountpattern="^([1-9]{1}[0-9]{0,5}|0)+(\.[0-9]{5})$";
		if(ereg($amountpattern,$amount))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
?>
