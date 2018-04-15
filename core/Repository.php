<?php


namespace core;


use PDO;

abstract class Repository
{
    protected $db;
    protected $table;
    protected $class;

    public function __construct($table, $class)
    {
        $this->table = $table;
        $this->class = $class;
        $this->db = Database::getInstance()->getDb();
    }

    public function findAll()
    {
        $statement = $this->db->query("SELECT * FROM $this->table");
        return $statement->fetchAll(PDO::FETCH_CLASS, $this->class);
    }

    public function findById($id)
    {
        $statement = $this->db->prepare("SELECT * FROM $this->table WHERE id = :id");
        $statement->execute(["id" => $id]);
        return $statement->fetchObject($this->class);
    }

    /**
     * @param array $conditions array of strings with conditions to WHERE statement
     * e.g. ['id=?', 'name LIKE ?']
     * @param array $values array of values to conditions
     * @return array
     */
    public function find(array $conditions, array $values)
    {
        $sql = "SELECT * FROM $this->table";

        if ($conditions) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }

        $statement = $this->db->prepare($sql);
        $statement->execute($values);
        return $statement->fetchAll(PDO::FETCH_CLASS, $this->class);
    }

    /**
     * @param array $conditions array of strings with conditions to WHERE statement
     * e.g. ['id=?', 'name LIKE ?']
     * @param array $values array of values to conditions
     * @return mixed
     */
    public function findOne(array $conditions, array $values)
    {
        $sql = "SELECT * FROM $this->table";

        if ($conditions) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }

        $statement = $this->db->prepare($sql);
        $statement->execute($values);
        return $statement->fetchObject($this->class);
    }

    /**
     * @param $id
     * @return bool TRUE on success or FALSE on failure
     */
    public function delete($id)
    {
        $statement = $this->db->prepare("DELETE FROM $this->table WHERE id = :id");
        return $statement->execute(["id" => $id]);
    }
}
