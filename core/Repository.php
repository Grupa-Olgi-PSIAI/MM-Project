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

    /**
     * Find all objects
     * @return array of class type given in constructor
     */
    public function findAll(): array
    {
        $statement = $this->db->query("SELECT * FROM $this->table");
        return $statement->fetchAll(PDO::FETCH_CLASS, $this->class);
    }

    /**
     * @param int $limit
     * @param int|null $offset
     * @return array of class type given in constructor
     */
    public function findAllLimited(int $limit, int $offset = null): array
    {
        $sql = "SELECT * FROM $this->table LIMIT $limit";
        if ($offset != null) {
            $sql .= ",$offset";
        }

        $statement = $this->db->query($sql);
        return $statement->fetchAll(PDO::FETCH_CLASS, $this->class);
    }

    /**
     * @param int $id of object
     * @return mixed object of class given in constructor
     */
    public function findById(int $id)
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
    public function find(array $conditions, array $values): array
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
    public function findLimited(array $conditions, array $values, int $limit, int $offset = null): array
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
     * @return object of class given in constructor
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
     * @param int $id
     * @return bool TRUE on success or FALSE on failure
     */
    public function delete(int $id): bool
    {
        $statement = $this->db->prepare("DELETE FROM $this->table WHERE id = :id");
        return $statement->execute(["id" => $id]);
    }

    /**
     * Adds object to database
     * @param Model $model object to add to database
     */
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

    /**
     * Updates object in database
     * @param int $id of object
     * @param Model $model
     */
    public function update(int $id, Model $model)
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

    /**
     * @param string $sql query
     * @param array $params array of parameters to query
     * @return array of objects of class given in constructor
     */
    public function query(string $sql, array $params): array
    {
        $statement = $this->db->prepare($sql);
        $statement->execute($params);

        return $statement->fetchAll();
    }

    /**
     * @param string $sql query
     * @param array $params array of parameters to query
     * @return array
     */
    public function queryToClass(string $sql, array $params): array
    {
        $statement = $this->db->prepare($sql);
        $statement->execute($params);

        return $statement->fetchAll(PDO::FETCH_CLASS, $this->class);
    }
}
