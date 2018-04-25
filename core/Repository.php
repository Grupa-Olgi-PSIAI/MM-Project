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

    /**
     * @param int $limit
     * @param int|null $offset
     * @return array
     */
    public function findAllLimited(int $limit, int $offset = null)
    {
        $sql = "SELECT * FROM $this->table LIMIT $limit";
        if ($offset != null) {
            $sql .= ",$offset";
        }

        $statement = $this->db->query($sql);
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
     * e.g. ['id=?', 'name LIKE ?'], note '?' sign in place for value
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
     * e.g. ['id=?', 'name LIKE ?'], note '?' sign in place for value
     * @param array $values array of values to conditions
     * @param int $limit
     * @param int|null $offset
     * @return array
     */
    public function findOr(array $conditions, array $values)
    {
        $sql = "SELECT * FROM $this->table";

        if ($conditions) {
            $sql .= ' WHERE ' . implode(' OR ', $conditions);
        }

        $statement = $this->db->prepare($sql);
        $statement->execute($values);
        return $statement->fetchAll(PDO::FETCH_CLASS, $this->class);
    }

    /**
     * @param array $conditions array of strings with conditions to WHERE statement
     * e.g. ['id=?', 'name LIKE ?'], note '?' sign in place for value
     * @param array $values array of values to conditions
     * @param int $limit
     * @param int|null $offset
     * @return array
     * jest to find, ale z OR zamiast AND
     */
    public function findLimited(array $conditions, array $values, int $limit, int $offset = null)
    {
        $sql = "SELECT * FROM $this->table";

        if ($conditions) {
            $sql .= ' WHERE ' . implode(' AND ', $conditions);
        }

        $sql .= " LIMIT $limit";
        if ($offset != null) {
            $sql .= ",$offset";
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

    public function add(Model $model)
    {
        $params = $model->getFields();
        $columns = "";
        $placeholders = "";
        foreach ($params as $key => $value) {
            $columns .= "$key, ";
            $placeholders .= ":$key, ";
        }
        $columns = rtrim($columns, ", ");
        $placeholders = rtrim($placeholders, ", ");

        $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
        $statement = $this->db->prepare($sql);
        $statement->execute($params);
    }

    public function update($id, Model $model)
    {
        $model->setId($id);
        $params = $model->getFields();
        $columns = "";
        foreach ($params as $key => $value) {
            $columns .= "$key=:$key, ";
        }
        $columns = rtrim($columns, ", ");

        $sql = "UPDATE $this->table SET $columns WHERE id=$id";
        $statement = $this->db->prepare($sql);
        $statement->execute($params);
    }

    public function query($sql)
    {
        return $this->db->query($sql);
    }
}
