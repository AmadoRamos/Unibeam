<?php
	namespace Vendors;


	class View
	{
		public static function render($view, $argments = array())
		{

			$template =self::template_exist($view);
			if ( !$template ) {
				return "La plantilla no existe";	
			}
			else
			{
				extract($argments, EXTR_PREFIX_SAME, "wddx");
				ob_start();
		        include($template);
		        $content = ob_get_contents();
		        ob_end_clean();
				
		        return $content; 
			}
		}
		public static function template_exist($view)
		{
			$view = str_replace(".", "/", $view);
			$view = "App/Views/" . $view . '.php';
	        if (!file_exists($view)) 
	            return False;
	        else
	        	return $view;
		}
		
	}
?>