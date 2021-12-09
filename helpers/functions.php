<?php 
		function urlGetVars($dataGet)
		{
		    
		    $vars   =array();
		    $values =array();
		    for ($i = 0; $i < count($dataGet) ; $i++) {
		        if($i%2!=0)
		        {
		          array_push($vars,$dataGet[$i]);  
		        }else{
		          array_push($values,$dataGet[$i]);  
		        }
		    }
		    
		    for ($i = 0; $i < count($values) ; $i++) {
				if($vars[$i] !="")
				{
		            for ($j = 0; $j < count($vars); $j++) {
		    			$varGet[$values[$i]]=$vars[$i];
		    		}
		    	}
		    }
		  

		    return $varGet;
		}
		function getExplode($request=array())
		{
			
			$explode = explode($request['char'],$request['String']);
			if(isset($request['posicion']))
			{
				$response = $explode[$request['posicion']];
			} else{
				$response = $explode;
			}
			return $response;
		}
		function deleteLastString($request=array())
		{
			
			$lastword    = substr($request['String'], -1);

			$searchWord  = strpos($lastword, "/");

			if($searchWord !== FALSE)
			{
			 	$myString = substr($request['String'], 0, -1);
			}else{
				$myString = $request['String'];
			}
			return $myString;
		}
 ?>