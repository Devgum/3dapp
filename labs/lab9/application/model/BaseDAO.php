<?php
class BaseDAO {
    public static $primary_key;
    public static $columns;
    public static $tableName;

    public static function generateSelectSQL($conditions = []) {
        $reflector = new ReflectionClass(get_called_class());
        $className = $reflector->getShortName();
        $tableName = strtolower($className);
        $properties = $reflector->getStaticProperties();

        if (isset($properties['columns'])) {
            $columns = array_keys($properties['columns']);
            $sql = "SELECT ".implode(", ", $columns)." FROM $tableName";
            if (!empty($conditions)) {
                $conditionStrings = [];
                foreach ($conditions as $key => $value) {
                    $conditionStrings[] = "$key = :$key";
                }
                $sql .= " WHERE ".implode(" AND ", $conditionStrings);
            }
            return $sql;
        } else {
            throw new Exception("No columns defined in $className");
        }
    }
}
?>