<?php
class Model {
    // Property declaration, in this case we are declaring a variable or handeler that points to the database connection, this will become a PDO object
    public $dbhandle;
    private $dsn = 'sqlite:./db/database.db';
    private $tableName = 'Model_3D';

    // Method to create database connection using PHP Data Objects (PDO) as the interface to SQLite
    public function __construct()
    {
        $user = 'user';
        $pass = 'password';
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
            PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        ];
        // Then create a connection to a database with the PDO() function
        try {
            // Change connection string for different databases, currently using SQLite
            $this->dbhandle = new PDO($this->dsn, $user, $pass, $options);
            // $this->dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'Database connection created</br></br>';
        }
        catch (PDOException $e) {
            echo "Failed to connect to the database!<br>";
            // Generate an error message if the connection fails
            echo "Database error: " . $e->getMessage();
        }
    }

    // This is a simple fix to represent, what would in reality be, a table in the database containing the brand names. 
    // The database schema would then contain a foreign key for each drink entry linking back to the brand name
    // This structure allows us to read the list of brand names to populate a menu in a view
    public function dbGetBrand()
    {
        // Return the Brand Names
        $sql = "SELECT brand FROM {$this->tableName}";
        try {
            $stmt = $this->dbhandle->query($sql);
            $result = [];
            $i = 0;
            while ($data = $stmt->fetch()) {
                $result[$i] = $data['brand'];
                $i++;
            }
        } catch (PDOException $e){
            echo "Database error: " . $e->getMessage();
        } finally {
            $this->dbhandle = NULL;
        }
        return $result;
    }

    public function tableExists() {
        $sql = "SELECT COUNT(*) FROM sqlite_master WHERE type='table' AND name=:tableName";
        try {
            $stmt = $this->dbhandle->prepare($sql);
            $stmt->execute([':tableName' => $this->tableName]);
            $tableExists = $stmt->fetchColumn() > 0;
            return $tableExists;
        } catch (PDOException $e){
            echo "Database error: " . $e->getMessage();
        }
    }

    public function dbCreateTable()
    {
        if ($this->tableExists()) {
            return "Model_3D table aleady exists.";
        }
        try {
            $this->dbhandle->exec("CREATE TABLE Model_3D (Id INTEGER PRIMARY KEY, brand TEXT, x3dModelTitle TEXT, x3dCreationMethod TEXT, modelTitle TEXT, modelSubtitle TEXT, modelDescription TEXT)");
            return "Model_3D table is successfully created inside database.db file";
        }
        catch (PDOException $e){
            echo "Failed while creating database<br>";
            echo "Database error: " . $e->getMessage();
        } finally {
            $this->dbhandle = NULL;
        }
    }

    public function dbInsertData()
    {
        if (!$this->tableExists()) {
            return "Model_3D table does not exists.";
        }
        try{
            $this->dbhandle->exec(
            "INSERT INTO Model_3D (Id, brand, x3dModelTitle, x3dCreationMethod, modelTitle, modelSubtitle, modelDescription) 
                VALUES (1, 'Coke', 'X3D Coke Model', 'string_2', 'string_3','string_4','string_5'); " .
            "INSERT INTO Model_3D (Id, brand, x3dModelTitle, x3dCreationMethod, modelTitle, modelSubtitle, modelDescription) 
                VALUES (2, 'Sprite', 'X3D Sprite Model', 'string_2', 'string_3','string_4','string_5'); " .
            "INSERT INTO Model_3D (Id, brand, x3dModelTitle, x3dCreationMethod, modelTitle, modelSubtitle, modelDescription) 
                VALUES (3, 'Dr Pepper', 'X3D Dr Pepper Model', 'string_2', 'string_3','string_4','string_5'); ");
            return "X3D model data inserted successfully inside database.db";
        }
        catch(PDOException $e) {
            echo "Database error: " . $e->getMessage();
        } finally {
            $this->dbhandle = NULL;
        }
    }

    public function dbGetData(){
        try{
            // Prepare a statement to get all records from the Model_3D table
            $sql = 'SELECT * FROM Model_3D';
            // Use PDO query() to query the database with the prepared SQL statement
            $stmt = $this->dbhandle->query($sql);
            // Set up an array to return the results to the view
            $result = [];
            // Set up a variable to index each row of the array
            $i = 0;
            // Use PDO fetch() to retrieve the results from the database using a while loop
            // Use a while loop to loop through the rows    
            while ($data = $stmt->fetch()) {
                // Don't worry about this, it's just a simple test to check we can output a value from the database in a while loop
                // echo '</br>' . $data['x3dModelTitle'];
                // Write the database conetnts to the results array for sending back to the view
                // It seems result will be init implicitly. But I still like make it explicit
                $result[$i] = [];
                $result[$i]['x3dModelTitle'] = $data['x3dModelTitle'];
                $result[$i]['x3dCreationMethod'] = $data['x3dCreationMethod'];
                $result[$i]['modelTitle'] = $data['modelTitle'];
                $result[$i]['modelSubtitle'] = $data['modelSubtitle'];
                $result[$i]['modelDescription'] = $data['modelDescription'];
                //increment the row index
                $i++;
            }
        }
        catch (PDOException $e) {
            echo "Database error: " . $e->getMessage();
        } finally {
            $this->dbhandle = NULL;
        }
        // Send the response back to the view
        return $result;
    }
    
    //Method to simulate the model data
    public function model3D_info()
    {
        // Simulate the model's data
        return array(
            'model_1' => 'Coke Can 3D Image 1',
            'image3D_1' => 'coke/coke_1.png',

            'model_2' => 'Coke Can 3D Image 2',
            'image3D_2' => 'coke/coke_2.png',

            'model_3' => 'Sprite Bottle 3D Image 1',
            'image3D_3' => 'sprite/sprite_1.jpg',

            'model_4' => 'Sprite Bottle 3D Image 2',
            'image3D_4' => 'sprite/sprite_2.png',

            'model_5' => 'Dr Pepper Cup 3D Image 1',
            'image3D_5' => 'pepper/pepper_1.jpg',

            'model_6' => 'Dr Pepper Cup 3D Image 2',
            'image3D_6' => 'pepper/pepper_2.png'
        );
    }
}
?>