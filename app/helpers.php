<?php

    function checkArray($array)
	{
 		foreach ($array as $value)
 		{
 			if(is_array($value))
 			{
 				if(count($value))
 				{
 					if(!checkArray($value))
 					{
 						return false;
 					}
 				}
 			}
 			else
 			{
 				$value=trim($value);
 				if(!empty($value))
 				{
 					return false;
 				}
 			}
 			$i++;
 		}
 		return true;
 	}