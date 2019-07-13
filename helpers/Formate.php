<?php

	/**
	 * Formate 
	 */
	class Formate
	{
	   public function DateFormate($date){
	   		return date('F j, Y, g:i a', strtotime($date));
	   }

	   public function textShorten($text, $limit = 600){
	   		$text = $text." ";
	   		$text = substr($text, 0, $limit);
	   		$text = $text."....";
	   		return $text;
	   }

	   public function validation($data){
	   		$data = trim($data);
	   		$data = stripcslashes($data);
	   		$data = htmlentities($data);
	   		return $data;
	   }
	}



 ?>