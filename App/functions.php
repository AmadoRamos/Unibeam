<?php
    use Vendors\Route;
	function asset($asset, $secured = False)
   	{
   		$server = $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'];
   		$dir    = str_replace("index.php", "", $_SERVER['SCRIPT_NAME']);
   		if( $secured)
   			$http = "https://";
   		else
   			$http = "http://";
   		return  $http . $server . $dir  .  $asset;
   	}

    function action($controller, $arguments = array(), $secured = False)
    {
        $routes = Route::get_routes();
        $a      = "";
        foreach ($routes as $key => $value) 
        {
            if( $controller == $value )
            {
                $k = explode("/", $key);
                //unset($path[0]);
                foreach ($k as $k_key => $k_value) {
                    if( $k_value == "" or $k_value == null )
                        unset($k[$k_key]);
                }
                $k = array_values($k);
                if( !Route::has_arguments($k) )
                {
                    if (empty($arguments)) 
                    {
                        $a = $key;
                    }
                }
                else 
                {
                    if (empty($arguments)) 
                    {
                        return "ERROR: la ruta necesita argumentos";
                    }
                    else
                    {
                        $a = $key;
                        foreach ($arguments as $a_key => $a_value) 
                        {
                            $a = str_replace("{".$a_key."}", $a_value, $a);
                        }
                    }
                }
            }
        }
        if( !$secured)
            $http = "http://";
        else
            $http = "https://";
        $server = $http . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . $_SERVER['SCRIPT_NAME'];
        return $server . $a;
    }

?>