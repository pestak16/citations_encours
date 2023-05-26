<?php namespace Core\Database;
use PDO;


class DbTools
{
    static public function getFields($table)
    {
        $columns = [];

        $sql = 'SHOW COLUMNS FROM ' . $table;

        $db = DbFactory::getDb(DbFactory::MY_SQL);
        $q = $db->query($sql);
       
        $all = $q->fetchAll(PDO::FETCH_ASSOC);
        foreach ($all as $value) {
            if ($value['Field'] != 'id') {
                $columns[] = $value['Field'];
            }
        }
        return $columns;
    }
}


