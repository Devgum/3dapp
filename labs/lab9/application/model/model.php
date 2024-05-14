<?php
include './application/model/BaseDAO.php';
include './application/model/BrandInfo.php';
include './application/model/X3DInfo.php';
include './application/model/Card.php';
include './application/model/Image.php';

class Model {
    private $dbhandle;
    private $dsn = 'sqlite:./db/database.db';
    private $tableName = 'Model_3D';
    private $user = 'user';
    private $pass = 'password';
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    private $brandTableName = "brand";
    private $x3dTableName = "x3d";
    private $textTableName = "card";
    private $imageTableName = "image";

    public function __construct() {
        $this->tables = [
            $this->brandTableName => BrandInfo::class,
            $this->x3dTableName => X3DInfo::class,
            $this->textTableName => Card::class,
            $this->imageTableName => Image::class,
        ];
    }

    public function connect_database() {
        try{
            if ($this->dbhandle == null) {
                $this->dbhandle = new PDO($this->dsn, $this->user, $this->pass, $this->options);
            }
        } catch (PDOException $e) {
            echo "connect_databse Failed.<br>";
            echo "Database Error: <br>". $e->getMessage().'<br>';
        }
    }

    public function tableExists($tableName) {
        $sql = "SELECT COUNT(*) FROM sqlite_master WHERE type='table' AND name=:tableName";
        try {
            $this->connect_database();
            $stmt = $this->dbhandle->prepare($sql);
            $stmt->execute([':tableName' => $this->tableName]);
            $tableExists = $stmt->fetchColumn() > 0;
            return $tableExists;
        } catch (PDOException $e){
            echo "tableExists Failed. $tableName <br>";
            echo "Database error: <br>" . $e->getMessage().'<br>';
        } finally {
            $this->dbhandle = null;
        }
    }

    public function tableExistsWithHandle($tableName, $dbhandle) {
        $sql = "SELECT COUNT(*) FROM sqlite_master WHERE type='table' AND name=:tableName";
        try {
            $stmt = $dbhandle->prepare($sql);
            $stmt->execute([':tableName' => $tableName]);
            $tableExists = $stmt->fetchColumn() > 0;
            return $tableExists;
        } catch (PDOException $e){
            echo "tableExistsWithHandle Failed. $tableName <br>";
            echo "Database error: <br>" . $e->getMessage().'<br>';
        }
    }

    private function queryDAO($DAOClass ,$condition = null) {
        if (! is_subclass_of($DAOClass, BaseDAO::class)) {
            echo "queryDAO Failed. <br>";
            throw new Exception("$DAOClass is not a subclass of BaseDAO.");
        }
        $sql = $DAOClass::generateSelectSQL($condition);
        $result = [];
        try {
            $this->connect_database();
            $stmt = $this->dbhandle->prepare($sql);
            $stmt->execute($condition);
            $i = 0;
            while ($object = $stmt->fetchObject($DAOClass)) {
                $result[$i] = $object;
                $i++;
            }
        } catch (PDOException $e) {
            echo "queryDAO Failed. <br>";
            echo "Database Error: <br>". $e->getMessage().'<br>';
        } finally {
            $this->dbhandle = null;
        }
        return $result;
    }

    public function listBrands() {
        $brands = $this->queryDAO(BrandInfo::class);
        $result = [];
        $i = 0;
        foreach ($brands as $brand) {
            if ($brand->id == 0) contnue;
            $result[$i] = get_object_vars($brand);
            $i++;
        }
        return $result;
    }

    // Main Text
    public function getMainCard() {
        $condition = [
            'brand_id' => 0,
        ];
        $sql = Card::generateSelectSQL($condition);
        $result = null;
        try {
            $this->connect_database();
            $stmt = $this->dbhandle->prepare($sql);
            $stmt->execute($condition);
            $result = $stmt->fetchObject('Card');
        } catch (PDOException $e) {
            echo "getMainCard Failed. <br>";
            echo "Database Error: <br>". $e->getMessage().'<br>';
        } finally {
            $this->dbhandle = null;
        }
        return get_object_vars($result);
    }

    public function getBrandCard($brand_id) {
        $condition = [
            'brand_id' => $brand_id,
        ];
        $cards = $this->queryDAO(BrandInfo::class, $condition);
        $result = [];
        $i = 0;
        foreach ($cards as $card) {
            $result[$i] = get_object_vars($card);
            $i++;
        }
        return $result;
    }

    public function getBrandModel($brand_id) {
        
    }

    public function homeContentData() {

    }

    private function tableCreationSQL($tableName) {
        $result = 'CREATE TABLE '.$tableName;
        $tableClass = $this->tables[$tableName];
        $i = 0;
        $column_list = [];
        foreach ($tableClass::$columns as $name => $type) {
            $column = "$name $type";
            if ($i == $tableClass::$primary_key) {
                $column = $column." PRIMARY KEY";
            }
            $column_list[$i] = $column;
            $i++;
        }
        $result = $result.'('.implode(',', $column_list).')';
        return $result;
    }

    public function createTable($tableName) {
        $sql = $this->tableCreationSQL($tableName);
        try {
            $this->connect_database();
            if ($this->tableExistsWithHandle($tableName, $this->dbhandle)) return;
            $this->dbhandle->exec($sql);
        } catch (PDOException $e) {
            echo "createTable Failed. $tableName <br>";
            echo "Database Error: <br>". $e->getMessage().'<br>';
        } finally {
            $this->dbhandle = null;
        }
    }

    public function initTables() {
        foreach($this->tables as $table => $class) {
            if (!$this->tableExists($table)) {
                $this->createTable($table);
            }
        }
    }
}
?>