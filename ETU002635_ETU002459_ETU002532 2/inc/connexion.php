<?php
    function dbconnect()
	{
    	static $connect = null;
    	if ($connect === null)
    	{
    	    //$connect = mysqli_connect('172.10.0.113','ETU002635','XknkRnWSwr0w','db_p16_ETU002635');
			$connect = mysqli_connect('localhost','root','','the_the');
    	}
    	return $connect;
	}
?>