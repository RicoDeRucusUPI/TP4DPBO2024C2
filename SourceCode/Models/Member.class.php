<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tname'];
        $email = $data['temail'];
        $phone = $data['tphone'];
        $clubs = $data['tclubs'];

        $query = "insert into members values ('', '$name', '$email', '$phone', '$clubs')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id_members = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function selectById($id){
        $query = "select * from members where id_members=$id";
        $result = $this->execute($query);
        return $result->fetch_assoc();
    }

    function selectWithJoinClubs(){
        $query = "SELECT members.*, clubs.name AS club_name FROM members INNER JOIN clubs ON members.id_clubs=clubs.id_clubs";
        return $this->execute($query);
    }

    function update($id, $data)
    {
        $name = $data['tname'];
        $email = $data['temail'];
        $phone = $data['tphone'];
        $query = "update members set name='$name', email='$email', phone='$phone' where id_members='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}


?>