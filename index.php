<?php
  include 'inc/constant.php';
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
    require 'proses/panggil.php';
    if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }

    if (isset($_GET['page'])) {
      $page = $_GET['page'];
    }else {
      $page = '';
    }
    if (isset($_GET['op'])) {
      $op = $_GET['op'];
    }else {
      $op = '';
    }
    if ($page == "") {
      if ($op == "") {
        $page = MODULE_PATH . 'dashboard/dashboard';
      }else {
        $page = $op;
      }
    } else {
      if (preg_match('/_/i', $page)) {
        $modname = explode('_',$page);
        $page = MODULE_PATH . $modname[0]. '/' . $page;
      }else {
        $page = MODULE_PATH . $page. '/' . $page;
      }
    }
?>
<?php include 'layout/header.php'; ?>
  <!-- Navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'layout/nav.php';?>
  <?php
        if (!file_exists($page.'.php')) {
          echo "Module Tidak ditemukan";
        } else {
          include $page.'.php';
        }
         ?>
  <?php include 'layout/footer.php' ?>