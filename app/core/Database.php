<?php

trait Database
{
    private function connect()
    {
        try {
            $dsn = DB_DRIVER_NAME . ":dbname=" . DB_NAME . ";host=" . DB_HOST;
            $con = new PDO($dsn, DB_USERNAME, DB_PASS);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function query($query, $data = [])
    {
        $con = $this->connect();
        $stmt = $con->prepare($query);

        $check = $stmt->execute($data);
        if($check)
        {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result))
            {
                return $result;
            }
        }

        return false;
    }

    public function get_row($query, $data = [])
    {
        $con = $this->connect();
        $stmt = $con->prepare($query);

        $check = $stmt->execute($data);
        if($check)
        {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result))
            {
                return $result[0];
            }
        }

        return false;
    }
}