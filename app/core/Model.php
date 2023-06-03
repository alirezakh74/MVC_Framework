<?php

trait Model
{
    use Database;

    protected $limit = 10;
    protected $offset = 0;

    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";
        foreach($keys as $key)
        {
            $query .= $key . " = :" . $key . " && ";
        }
        foreach($keys_not as $key_not)
        {
            $query .= $key_not . " != :" . $key_not . " && ";
        }
        $query = trim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
    }

    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";
        foreach($keys as $key)
        {
            $query .= $key . " = :" . $key . " && ";
        }
        foreach($keys_not as $key_not)
        {
            $query .= $key_not . " != :" . $key_not . " && ";
        }
        $query = trim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);
        if($result)
        {
            return $result[0];
        }

        return false;
    }

    public function insert($data)
    {
        $keys = array_keys($data);

        $query = "INSERT INTO $this->table (".implode(",", $keys).") VALUES (:".implode(",:",$keys).")";

        $this->query($query, $data);
    }

    public function update($id_value, $data, $id_column_name = 'id')
    {
        $keys = array_keys($data);
        $query = "UPDATE $this->table SET ";

        foreach($keys as $key)
        {
            $query .= $key . " = :" . $key . ", ";
        }

        $query = trim($query, ", ");

        $query .= " WHERE $id_column_name = :$id_column_name";

        $data[$id_column_name] = $id_value;
        $this->query($query, $data);
        return false;
    }

    public function delete($id_value, $id_column_name = 'id')
    {
        $data[$id_column_name] = $id_value;
        $query = "DELETE FROM $this->table WHERE $id_column_name = :$id_column_name";

        $this->query($query, $data);
        return false;
    }
}