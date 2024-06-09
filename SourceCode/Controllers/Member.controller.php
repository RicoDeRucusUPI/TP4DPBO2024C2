<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/Club.class.php");
include_once("views/Member.view.php");

class MemberController {
  private $members;
  private $clubs;

  function __construct(){
    $this->members = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->clubs = new Club(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->members->selectWithJoinClubs();
    
    $data = array(
      'members' => array(),
    );
    while($row = $this->members->getResult()){
      array_push($data['members'], $row);
    }

    $this->members->close();

    $view = new MemberView();
    $view->render($data);
  }

  function form_add(){
    $view = new MemberView();
    $this->clubs->open();
    $this->clubs->getClub();
    $data = array(
      'clubs' => array(),
    );

    while($row = $this->clubs->getResult()){
      array_push($data['clubs'], $row);
    }
    $this->clubs->close();

    $view->form_add($data);
  }

  function form_edit($id){
    $view = new MemberView();
    $this->members->open();
    $this->clubs->open();
    $this->clubs->getClub();
    $data = array(
      'clubs' => array(),
      'members' => $this->members->selectById($id)
    );
    while($row = $this->clubs->getResult()){
      array_push($data['clubs'], $row);
    }

    $this->clubs->close();
    $this->members->close();
    $view->form_edit($data);

  }

  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function edit($id, $data){
    $this->members->open();
    $this->members->update($id, $data);
    $this->members->close();

    header("location:index.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();

    header("location:index.php");
  }

}