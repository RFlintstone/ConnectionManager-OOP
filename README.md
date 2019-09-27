# ConnectionManager-OOP-

```
	//Calls the dependency for connectionmanager. (Needs PHP >=7.0)
	require 'Database.php';
	
	//Sets credentials for the next connect function.
	$pdo = new Database('localhost','test1','root','');
	
	//Tells code to connect with the last credentials that are set.
	$conn = $pdo->connect();
	
	//Sets query for the last connection that is set.
	$pdo->query( 'INSERT INTO users (firstname, lastname, age) VALUES ("Lorem", "Ipsum", 35)');
	
	//Sets credentials for the next connect function.
	$pdo = new Database('localhost','test2','root','');
	
	//Tells code to connect with the last credentials that are set.
	$conn = $pdo->connect();
	
	//Sets query for the last connection that is set.
	$pdo->query( 'INSERT INTO users (firstname, lastname, age) VALUES ("Lorem2", "Ipsum2", 35)');
	
	//Sets debugmode on or of. On is true and off is false (optional).
	$pdo->dbdebug(true);
```
