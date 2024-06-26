<?php
include './application/model/BaseDAO.php';
include './application/model/BrandInfo.php';
include './application/model/X3DInfo.php';
include './application/model/Card.php';

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

    public function __construct() {
        $this->tables = [
            BrandInfo::class,
            X3DInfo::class,
            Card::class,
            Image::class,
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
            if ($brand->id == 0) continue;
            $result[$i] = $brand;
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
        return $result;
    }

    public function getBrandCard($brand_id) {
        $condition = [
            'brand_id' => $brand_id,
        ];
        $cards = $this->queryDAO(Card::class, $condition);
        $result = [];
        $i = 0;
        foreach ($cards as $card) {
            $result[$i] = $card;
            $i++;
        }
        return $result;
    }

    public function getBrandModel($brand_id) {
        $condition = [
            'brand_id' => $brand_id,
        ];
        $model = $this->queryDAO(X3DInfo::class, $condition)[0];
        return $model;
    }

    public function modelContentData($brand_id) {
        $result = [];
        // Brand Infos
        $brands = $this->listBrands();
        $result['brands'] = $brands;

        // Brand Card
        $cards = $this->getBrandCard($brand_id);
        $result['cards'] = [];
        $i = 0;
        foreach ($cards as $card) {
            if ($card->page_no != 1) continue;
            $result['cards'][$i] = $card;
            $i++;
        }

        // Model Infos
        $model = $this->getBrandModel($brand_id);
        $result['model'] = $model;

        return $result;
    }

    public function homeContentData() {
        $result = [];
        // Main Text
        $main_text = $this->getMainCard();
        $result['main_text'] = $main_text;

        // Cards
        // TODO: Could be improve by join selection
        $cards = [];
        $brands = $this->listBrands();
        $i = 0;
        foreach($brands as $brand) {
            $brandCards = $this->getBrandCard($brand->id);
            foreach ($brandCards as $card) {
                if ($card->page_no != 0) continue;
                $cards[$i] = $card;
                $i++;
            }
        }
        $result['cards'] = $cards;

        return $result;
    }

    private function tableCreationSQL($tableName) {
        $result = 'CREATE TABLE '.$tableName;
        $tableClass = $tableName;
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
        foreach($this->tables as $table) {
            if (!$this->tableExists($table)) {
                $this->createTable($table);
            }
        }
    }
}
?>