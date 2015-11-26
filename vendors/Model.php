<?php
	namespace Vendors;
	use Vendors\DB;
	/**
	* Clase para manipular la base de datos, 
	*/
	class Model
	{
		private $query;

		public function select($select="*")
		{
			$this->query = "SELECT {$select} FROM {$this->table}";
			return $this;
		}

		public function delete($column, $value)
		{
			$this->query 	= "DELETE FROM {$this->table} WHERE {$column} = {$value}";
			$result 		= DB::query($this->query);
			return $result;
		}

		public function update($column, $value)
		{
			$this->query 	= "UPDATE `{$this->table}` SET";
			$vars = get_object_vars($this);
			unset($vars['table']);
			unset($vars['query']);

			$cont = 0;
			foreach ($vars as $key => $var) {
				$cont++;
				$this->query .= " `{$key}` = '{$var}'";
				if( $cont != count($vars) )
					$this->query .= ",";
			}

			$this->query .= " WHERE `{$column}` = '{$value}'";
			$result = DB::query($this->query);
			return $result;
		}

		public function where()
		{
			if( func_num_args() == 2 )
			{
				$this->query .= " WHERE " . func_get_arg(0) . " = " . func_get_arg(1);
			}
			elseif( func_num_args() == 3 )
			{
				$this->query .= " WHERE " . func_get_arg(0) . " " . func_get_arg(1) ." " . func_get_arg(2);
			}
			else
			{
				die("ERROR; Numero de argumentos invalidos");
			}
			return $this;
		}

		public function all()
		{
			$this->query 	 = sprintf("SELECT * FROM %s", $this->table );
			
			$r = DB::query($this->query);
			if( $r )
			{
				$results	 = array();
				while ( $object = mysql_fetch_object($r) ) {
					$results[] = $object;
				}
				return $results;
			} 
			else 
			{
				return False;
			}
		}

		public function insert($data)
		{
			$this->query = "INSERT INTO `{$this->table}`";
			$fields 	= " (";
			$v 			= " VALUES (";
			$c 			= 1;
			foreach ($data as $key => $value) {
				$fields .= " `" . $key . "` " ; //(`id`, `username`, `password`) 
				$v 		.= " '" . mysql_escape_string($value) . "' ";  //([value-1],[value-2],[value-3])
				if( $c != sizeof($data) )
				{
					$fields .= ",";
					$v 		.= ",";
				} else {
					$fields .= ")";
					$v 		.= ")";
				}
				$c++;
			}
			$this->query .= $fields . $v;
			$result = DB::query($this->query);
			$this->id = mysql_insert_id();
			return $result;
		}

		public function get()
		{
			$result = DB::query( $this->query );
			if( mysql_num_rows($result) > 1 )
			{
				while ( $object =  mysql_fetch_object($result)) {
					$r[] = $object;
				}
				return $r;
			}
			else
				return mysql_fetch_object($result);
		}


	}

?>