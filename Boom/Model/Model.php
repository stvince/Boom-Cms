<?php
namespace Boom\Model;

use Boom\Model\Orm\DbProvider;

class Model
{
    public $queryFields = "";
    public $queryFrom = "FROM ";
    public $queryWhere = "WHERE ";
    public $queryJoin = "JOIN ";
    public $queryOrder = "ORDER BY";
    public $queryLimit = "LIMIT ";
    public $name;
    public $table;

    public function __construct($data)
    {
        if ($data) {
            $this->forge($data);
        }

        if (is_null($this->db)) {
            $this->db = DbProvider::getDb();
        }

        $this->setTableName();
    }

    private function setTableName()
    {
        $classname = get_class($this);

        if (preg_match('@\\\\([\w]+)$@', $classname, $matches)) {
            if (!$this->name) {
                $this->name = $matches[1];
            }
            if (!$this->table) {
                $this->table = strtolower($matches[1]) . 's';
            }
        }
    }

    public function forge($data)
    {
        foreach ($data as $name => $value) {
            $this->$name = $value;
        }

        return $this;
    }

    public function get($conditions, $table)
    {
        $query = "SELECT ";

        if (!isset($conditions['fields'])) {
            $query .= "*";
        } else {
            $query .= $conditions['fields'];
        }

        if (is_null($table)) {
            $query .= " FROM " . $this->table;
        } else {
            $query .= " FROM " . $table;
        }

        // Si on doit faire un join
        if (isset($conditions['joins'])) {
            $joins = [];
            foreach ($conditions['joins'] as $j) {
                if (!isset($this->relations) || !isset($this->relations[$j])) {
                    echo "Le model " . $this->name . " n'a pas d'association avec la table $j ! Veuillez créer un tableau public \$relations dans votre model " . $this->name;
                } else {
                    $joins[] = " JOIN $j ON $j.id = {$this->table}." . $this->joins[$j];
                }
            }
            $query .= implode(" ", $joins);
        }

        // Si on a un Where
        if (isset($conditions['where'])) {
            if (!is_array($conditions['where'])) {
                $query .= " WHERE " . $conditions['where'];
            } else {
                $query .= " WHERE ";
                $cond = [];
                foreach ($conditions['where'] as $k => $v) {
                    if (!is_numeric($v)) {
                        $v = "'" . addslashes($v) . "'";
                    }
                    $cond[] = "$k=$v";
                }
                $query .= implode(' AND ', $cond);
            }
        }

        // Si on a un group by
        if (isset($conditions['groupBy'])) {
            $query .= " GROUP BY " . $conditions['groupBy'];
        }

        // Si on a un order
        if (isset($conditions['order'])) {
            $query .= " ORDER BY " . $conditions['order'];
        }

        // Si on a une limite
        if (isset($conditions['limit'])) {
            if (isset($conditions['offset'])) {
                $query .= " LIMIT " . $conditions['offset'] . "," . $conditions['limit'];
            } else {
                $query .= " LIMIT " . $conditions['limit'];
            }
        }

        $req = $this->db->query($query);
        $results = $req->fetchAll();

        if (isset($conditions['hasMany'])) {
            foreach ($conditions['hasMany'] as $hm => $v) {
                foreach ($results as $r) {
                    $fields = isset($v['fields']) ? $v['fields'] : '*';
                    $groupby = isset($v['groupBy']) ? ' GROUP BY ' . $v['groupBy'] : '';
                    $q = "SELECT $fields FROM $hm WHERE " . strtolower($this->name) . "_id = " . $r->id . $groupby;
                    $pdost = $this->db->query($q);
                    $r->$hm = $pdost->fetchAll();
                }
            }
        }

        return $results;
    }

    public function find($what, $conditions = null, $table = null)
    {
        if (is_null($table)) {
        	$table = $this->table;
        }

        if (is_int($what)) { // le cas ou on chrche un id
        	$conditions['where'][] = ['id' => $what];
        }

        if (is_string($what)) {
        	switch ($what) {
                case "first":
                    $conditions['limit'] = 1;
                    break;
                default:
                    break;
            }
        }

        return $this->get($conditions, $table);
    }

}