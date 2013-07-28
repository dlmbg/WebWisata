<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('salam'))
{
	function salam()
	{
		  $pesan = "";
		  if(gmdate("H", time()+60*60*7)<03)
		  {
		    $pesan = "malam";
		  }
		  else if(gmdate("H", time()+60*60*7)<10)
		  {
		    $pesan = "pagi";
		  }
		  else if(gmdate("H", time()+60*60*7)<16)
		  {
		    $pesan = "siang";
		  }
		  else if(gmdate("H", time()+60*60*7)<19)
		  {
		    $pesan = "sore";
		  }
		  if(gmdate("H", time()+60*60*7)>18)
		  {
		    $pesan = "malam";
		  }
		  return $pesan;
	}
}
