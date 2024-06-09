<?php

  class ClubView {
    public function render($data){
      $no = 1;
      $dataClubs = null;
      $dataAuthor = null;
      $dataClubs = "
      <table class='table'>
        <thead>
          <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>LOCATION</th>
            <th>DATE CREATE</th>
            <th>ACTIONS</th>
          </tr>
        </thead>
        <tbody>";

      foreach($data['clubs'] as $val){
        list($id, $name, $location, $date_create) = $val;
        $dataClubs .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $name . "</td>
                <td>" . $location . "</td>
                <td>" . $date_create . "</td>
                <td>
                  <a href='club.php?id_form_edit=" . $id .  "' class='btn btn-warning' '>Edit</a>
                  <a href='club.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td></tr>";
      }

      $dataClubs .= "</tbody>
      </table>";

      $tpl = new Template("templates/index.html");

      $tpl->replace("DATA_TITLE", "Clubs");
      $tpl->replace("DATA_TABEL", $dataClubs);
      $tpl->write(); 
    }


    public function form_add(){
      $tpl = new Template("templates/layout.html");

      $html = " <form method='post'>
 
       <br><br><div class='card'>
       
       <div class='card-header bg-primary'>
       <h1 class='text-white text-center'>  Create New Club </h1>
       </div><br>

       <label> NAME: </label>
       <input type='text' required name='tname' class='form-control'> <br>

       <label> LOCATION: </label>
       <input type='text' required name='tlocation' class='form-control'> <br>

       <button class='btn btn-success' type='submit' name='add'> Submit </button><br>
       <a class='btn btn-info' type='submit' name='cancel' href='club.php'> Cancel </a><br>

       </div>
       </form>";

      $tpl->replace("DATA_CONTENT", $html);
      $tpl->write(); 
    }


    public function form_edit($data){
      $tpl = new Template("templates/layout.html");
      $html = " <form method='post' action='club.php?id_edit=".$data['id_clubs']."'>
 
       <br><br><div class='card'>
       
       <div class='card-header bg-primary'>
       <h1 class='text-white text-center'>  Update Club </h1>
       </div><br>

       <label> NAME: </label>
       <input type='text' required name='tname' class='form-control' value='".$data['name']."'><br>

       <label> LOCATION: </label>
       <input type='text' required name='tlocation' class='form-control' value='".$data['location']."'> <br>


       <button class='btn btn-success' type='submit'> Submit </button><br>
       <a class='btn btn-info' type='submit' name='cancel' href='club.php'> Cancel </a><br>

       </div>
       </form>";

      $tpl->replace("DATA_CONTENT", $html);
      $tpl->write(); 
    }
  }
?>