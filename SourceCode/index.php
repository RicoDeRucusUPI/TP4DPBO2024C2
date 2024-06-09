<?php
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$memberRoutes = new MemberController();

if (isset($_POST['add'])) {
    //memanggil add
    $memberRoutes->add($_POST);
} else if (!empty($_GET['form_add'])) {
    //memanggil add
    $memberRoutes->form_add();
} else if (!empty($_GET['id_form_edit'])) {
    //memanggil add
    $id = $_GET['id_form_edit'];
    $memberRoutes->form_edit($id);
} else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $memberRoutes->delete($id);
} else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $memberRoutes->edit($id, $_POST);
} else{
    $memberRoutes->index();
}

