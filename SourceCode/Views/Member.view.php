<?php

  class MemberView {
    public function render($data){
      $no = 1;
      $dataMembers = null;
      $dataAuthor = null;
      $dataMembers = "
      <table class='table'>
        <thead>
          <tr>
            <th>No</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE</th>
            <th>NAME CLUB</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>";

      foreach($data['members'] as $val){
        list($id, $name, $email, $phone, $join_date, $club_name) = $val;
        $dataMembers .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $email . "</td>
                <td>" . $phone . "</td>
                ";
        
        if ($join_date != null) {
            $dataMembers .= "
                <td>".$club_name."</td>
                <td>
                  <a href='index.php?id_form_edit=" . $id .  "' class='btn btn-warning' '>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td>";
        }
        else {
            $dataMembers .= "
                <td>No Have Clubs</td>
                <td>
                  <a href='index.php?id_form_edit=" . $id .  "' class='btn btn-warning' '>Edit</a>
                  <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td>";
        }
        $dataMembers .= "</tr>";
      }
      $dataMembers .= "</tbody>
      </table>";

      

      $tpl = new Template("templates/index.html");

      // $tpl->replace("OPTION", $dataAuthor);
      $tpl->replace("DATA_TITLE", "Members");
      $tpl->replace("DATA_TABEL", $dataMembers);
      $tpl->write(); 
    }


    public function form_add($data){
      $tpl = new Template("templates/layout.html");
      $dataClubs = "";

      foreach($data['clubs'] as $val){
        list($id, $nama) = $val;
        $dataClubs .= "<option value='".$id."'>".$nama."</option>";
      }

      $html = " <form method='post'>
 
       <br><br><div class='card'>
       
       <div class='card-header bg-primary'>
       <h1 class='text-white text-center'>  Create New Member </h1>
       </div><br>

       <label> NAME: </label>
       <input type='text' name='tname' required class='form-control'> <br>

       <label> EMAIL: </label>
       <input type='text' name='temail' required class='form-control'> <br>

       <label> PHONE: </label>
       <input type='text' name='tphone' required class='form-control'> <br>
  
       <label> CLUB: </label>
       <select name='tclubs' required class='form-control'>
         <option selected >Open this select menu</option>
         ".$dataClubs."
       </select> <br>

       <button class='btn btn-success' type='submit' name='add'> Submit </button><br>
       <a class='btn btn-info' type='submit' name='cancel' href='index.php'> Cancel </a><br>

       </div>
       </form>";

      $tpl->replace("DATA_CONTENT", $html);
      $tpl->write(); 
    }


    public function form_edit($data){
      $tpl = new Template("templates/layout.html");
      $dataClubs = "";

      foreach($data['clubs'] as $val){
        list($id, $nama) = $val;
        $dataClubs .= "<option value='".$id."'>".$nama."</option>";
      }

      $html = " <form method='post' action='index.php?id_edit=".$data['members']['id_members']."'>
 
       <br><br><div class='card'>
       
       <div class='card-header bg-primary'>
       <h1 class='text-white text-center'>  Update Member </h1>
       </div><br>

       <label> NAME: </label>
       <input type='text' name='tname' required class='form-control' value='".$data['members']['name']."'><br>

       <label> EMAIL: </label>
       <input type='text' name='temail' required class='form-control' value='".$data['members']['email']."'> <br>

       <label> PHONE: </label>
       <input type='text' name='tphone' required class='form-control' value='".$data['members']['phone']."'> <br>

       <label> CLUB: </label>
       <select name='tclubs' required class='form-control'>
         <option selected >Open this select menu</option>
         ".$dataClubs."
       </select> <br>

       <button class='btn btn-success' type='submit'> Submit </button><br>
       <a class='btn btn-info' type='submit' name='cancel' href='index.php'> Cancel </a><br>

       </div>
       </form>";

      $tpl->replace("DATA_CONTENT", $html);
      $tpl->write(); 
    }
  }
?>