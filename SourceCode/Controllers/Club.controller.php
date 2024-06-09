<?php
include_once("conf.php");
include_once("models/Club.class.php");
include_once("views/Club.view.php");

class ClubController {
  private $clubs;

  function __construct(){
    $this->clubs = new Club(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->clubs->open();
    $this->clubs->getClub();
    
    $data = array(
      'clubs' => array(),
    );
    while($row = $this->clubs->getResult()){
      array_push($data['clubs'], $row);
    }

    $this->clubs->close();

    $view = new ClubView();
    $view->render($data);
  }

  function form_add(){
    $view = new ClubView();
    $view->form_add();
  }

  function form_edit($id){
    $view = new ClubView();
    $this->clubs->open();
    $data = $this->clubs->selectById($id);
    $this->clubs->close();
    $view->form_edit($data);

  }

  function add($data){
    $this->clubs->open();
    $this->clubs->add($data);
    $this->clubs->close();
    
    header("location:club.php");
  }

  function edit($id, $data){
    $this->clubs->open();
    $this->clubs->update($id, $data);
    $this->clubs->close();

    header("location:club.php");
  }

  function delete($id){
    $this->clubs->open();
    $this->clubs->delete($id);
    $this->clubs->close();

    header("location:club.php");
  }

}