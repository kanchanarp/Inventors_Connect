<?php
	class Mysqldb {

		private $connections = array();

		private $activeConnection = 0;

		private $queryCache = array();

		private $dataCache = array();

		private $queryCounter = 0;

		private $last;

		private $registry;

		public function __construct( Registry $registry )
		{
			$this->registry = $registry;
		}
		
		public function newConnection( $host, $user, $password, $database )
		{
			$this->connections[] = new mysqli( $host, $user, $password,$database );
			$connection_id = count( $this->connections )-1;
			if( mysqli_connect_errno() )
			{
				trigger_error('Error connecting to host. '.$this->connections[$connection_id]->error, E_USER_ERROR);
			}
			return $connection_id;
		}
		public function setActiveConnection( int $new )
		{
			$this->activeConnection = $new;
		}
		public function executeQuery( $queryStr )
		{
			if( !$result = $this->connections[$this->activeConnection]->query( $queryStr ) )
			{
				trigger_error('Error executing query: ' . $queryStr .' - '.$this->connections[$this->activeConnection]->error,E_USER_ERROR);
			}
			else
			{
				$this->last = $result;
			}
		}
		public function executeQuery( $queryStr )
		{
			if( !$result = $this->connections[$this->activeConnection]->query( $queryStr ) )
			{
				trigger_error('Error executing query: ' . $queryStr .' - '.$this->connections[$this->activeConnection]->error,E_USER_ERROR);
			}
			else
			{
				$this->last = $result;
			}
		}

		public function getRows()
		{
			return $this->last->fetch_array(MYSQLI_ASSOC);
		}

		public function deleteRecords( $table, $condition, $limit )
		{
			$limit = ( $limit == '' ) ? '' : ' LIMIT ' . $limit;
			$delete = "DELETE FROM {$table} WHERE {$condition} {$limit}";
			$this->executeQuery( $delete );
		}
		public function updateRecords( $table, $changes, $condition )
		{
			$update = "UPDATE " . $table . " SET ";
			foreach( $changes as $field => $value )
			{
				$update .= "`" . $field . "`='{$value}',";
			}
			// remove our trailing ,
			$update = substr($update, 0, -1);
			if( $condition != '' )
			{
				$update .= "WHERE " . $condition;
			}
			$this->executeQuery( $update );
			return true;
		}

		public function insertRecords( $table, $data )
		{
			// setup some variables for fields and values
			$fields = "";
			$values = "";
			// populate them
			
			foreach ($data as $f => $v)
			{
				$fields .= "`$f`,";
				$values .= ( is_numeric( $v ) && ( intval( $v ) == $v ) ) ?
				$v."," : "'$v',";
			}
			// remove our trailing ,
			$fields = substr($fields, 0, -1);
			// remove our trailing ,
			$values = substr($values, 0, -1);
			$insert = "INSERT INTO $table ({$fields}) VALUES({$values})";
			//echo $insert;
			$this->executeQuery( $insert );
			return true;
		}
		public function sanitizeData( $value )
		{
			// Stripslashes
			if ( get_magic_quotes_gpc() )
			{
				$value = stripslashes ( $value );
			}
			// Quote value
			if ( version_compare( phpversion(), "4.3.0" ) == "-1" )
			{
				$value = $this->connections[$this->activeConnection]->escape_string( $value );
			}
			else
			{
				$value = $this->connections[$this->activeConnection]->real_escape_string( $value );
			}
			return $value;
		}

		public function getRows()
		{
			return $this->last->fetch_array(MYSQLI_ASSOC);
		}
		public function numRows()
		{
			return $this->last->num_rows;
		}

		public function affectedRows()
		{
			return $this->last->affected_rows;
		}

		public function __deconstruct()
		{
			foreach( $this->connections as $connection )
			{
				$connection->close();
			}
		}
	}
?>