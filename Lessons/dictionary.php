<?php

//DATA TYPES / SSTRUCTURES -------------------------------------------------------------------------------------------------------------->

$variable = 'This is variable declaration'; //Declares a variable.

$basicArray = ['first item', 'second item']; // A basic array.

$associativeArray = [                        // An associative array.

    'first key' => 'first key value',
    'second key' => 'second key value'

]


class Task { // A class with a constructor

    protected $description;
    protected $completed = false;

    public function __construct($descParam) {

        $this->description = $descParam;

    }

}




//PHP FUNCTIONS ------------------------------------------------------------------------------------------------------------------------->


// Fundamental ----------------------------------------------------------------------------->

//basic For Each on array.
foreach ($basicArray as $val) {
    echo $val;
}

//Basic forEach on associative array with key and value.
foreach ($associativeArray as $key => $val) {
    echo "$key : $val";
}

unset($basicArray[0]); //Destroys an item. Works with arrays and other variables.



//Utility ---------------------------------------------------------------------------------->

require 'index.view.php'; //Pulls in content from another location. Throws fatal exception on error.

ucwords($variable); //Uppercases the first letter of every word.

$nameInUrl = $_GET['name']; //Gets name parameter from the URL.

$sanitizedNameInUrl = htmlspecialchars($nameInUrl); //Encodes the string pulled from URL so no syntactial characters will be in the string.

var_dump($variable); //Dump the data of a variable.

die(); //Kill the execution of the php script on this line.




//Inside HTML Syntax -------------------------------------------------------------------------------------------------------------------->

?>



<html>
    <body>

    <!-- Echo a PHP variable in the HTML -->
    <?= $sanitizedNameInUrl ?>

    <!-- Iterate through an associative array and output values in HTML ------------------>
    <?php foreach ($associativeArray as $key => $val) : ?>

        <li><strong><?= $key ?>: </strong><?= $val ?></li>

    <?php endforeach; ?>

    </body>
</html>



<?php 

//Database ------------------------------------------------------------------------------------------------------------------------------>


try { // Connect to a database

    $pdo = new PDO('mysql:host=127.0.0.1;dbname=mytodo', 'root', ''); // PHP Database Object ('database-type:host=IP;dbname=database-name', 'username', 'password')

} catch(PDOException $e) {
    
    die('Could not connect...');

} 

$statement = $pdo->prepare('select * from todos'); //prepare an SQL statement

$statement->execute();  //Execute an SQL statement

$results = $statement->fetchAll(); //retrieve all values from the query
$resultsAsObj = $statement->fetchAll(PDO::FETCH_OBJ); //Retrieve all values from the query as a standard object
$resultsAsCustomObj = $statement->fetchAll(PDO::FETCH_CLASS, 'Task'); //Retrieve all values from the query as a custom class

var_dump($resultsAsObj); 
?>