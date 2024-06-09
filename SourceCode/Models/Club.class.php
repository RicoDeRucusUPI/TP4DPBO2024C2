<?php

class Club extends DB
{
    function getClub()
    {
        $query = "SELECT * FROM clubs";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tname'];
        $location = $data['tlocation'];
        $date_create = date('Y-m-d');

        $query = "insert into clubs values ('', '$name', '$location', '$date_create')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM clubs WHERE id_clubs = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function selectById($id){
        $query = "select * from clubs where id_clubs=$id";
        $result = $this->execute($query);
        return $result->fetch_assoc();
    }

    function update($id, $data)
    {
        $name = $data['tname'];
        $location = $data['tlocation'];
        $date_create = date('Y-m-d');
        $query = "update clubs set name='$name', location='$location', date_create='$date_create' where id_clubs='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}


?>