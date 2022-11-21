<?php
$host='127.0.0.1';
$db='ase230';
$user='root';
$pass='';
$port=3306;
$charset='utf8mb4';
$options=[
	\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION,
	\PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC,
	\PDO::ATTR_EMULATE_PREPARES=>false,
];

// Specify connection
$connection=new \PDO("mysql:host=$host;dbname=$db;charset=$charset;port=$port",$user,$pass, $options);


// Simple query
$result=$connection->query('SELECT * FROM categories');
echo '<table>';

while($category=$result->fetch()){
echo '<tr><td>'.$category['ID'].'</td><td>'.$category['name'].'</td><td>';
}

echo '</table>';
die();


// Prepared query
$query=$connection->prepare('SELECT * FROM users WHERE ID=?');
$query->execute([1]);
print_r($query->fetch());


/*\
DB::connect($host,$db,$user,$pass);
$result=DB::query('SELECT * FROM users');
print_r($result->fetch());


$result=DB::prepared_query('SELECT * FROM users',[]);
print_r($result->fetch());


$result=DB::insert('INSERT INTO users (firstname,lastname) VALUES(?,?)',['test','test']);
print_r($result);
class DB{
	static $connection=null;

	static function connect($host,$db,$user,$pass,$port='3306',$charset='utf8mb4'){
		if(isset(self::$connection)) return self::$connection;
		$options=[
			\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_ASSOC,
			\PDO::ATTR_EMULATE_PREPARES=>false,
		];
		try{
			self::$connection=new \PDO("mysql:host=$host;dbname=$db;charset=$charset;port=$port",$user,$pass, $options);
			return true;
		}catch(\PDOException $e){
			throw new \PDOException($e->getMessage(),(int)$e->getCode());
			return false;
		}
		return false;
	}

	static function query($query_string){
		return self::$connection->query($query_string);
	}

	static function prepared_query($query_string,$data=[]){
		$query=self::$connection->prepare($query_string);
		$query->execute($data);
		return $query;
	}

	static function insert($query_string,$data=[]){
		$query=self::$connection->prepare($query_string);
		$query->execute($data);
		return self::$connection->lastInsertId();
	}
}
*/

