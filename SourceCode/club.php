<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Club.controller.php");

$clubRoutes = new ClubController();

if (isset($_POST['add'])) {
    //memanggil add
    $clubRoutes->add($_POST);
} else if (!empty($_GET['form_add'])) {
    //memanggil add
    $clubRoutes->form_add();
} else if (!empty($_GET['id_form_edit'])) {
    //memanggil add
    $id = $_GET['id_form_edit'];
    $clubRoutes->form_edit($id);
} else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $clubRoutes->delete($id);
} else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $clubRoutes->edit($id, $_POST);
} else{
    $clubRoutes->index();
}

