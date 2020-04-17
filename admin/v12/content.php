<!-- main konten -->
<div class="app-main__inner">
  <?php
  if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
    header('location:../index.php');
  }else{
    include "../../fungsi/library.php";
    include "../../fungsi/fungsi_indotgl.php";
    include "../../fungsi/fungsi_combobox.php";
    include "../../fungsi/class_paging.php";
    include "../../fungsi/fungsi_rupiah.php";
    $module	= $_GET['module'];
    if($_GET['module'] == $module){
      $qry1	= $db->prepare("SELECT level_admin, level_user, link, path, icon, nama_mainmodul, aktif_mainmodul, modul_tambahan, subheading FROM mainmodul WHERE link='$module' AND aktif_mainmodul='Y'");
      $qry1->execute();
      $ada1 = $qry1->get_result();
      $t		= $ada1->fetch_object();
      $qry	= $db->prepare("SELECT id_modul, l_admin, l_user, link, path, modul_tambahan, nama_modul, subheading FROM modul WHERE link='$module'");
      $qry->execute();
      $ada  = $qry->get_result();
      $u		= $ada->fetch_object();
      if($ada1->num_rows > 0){
        echo'
        <div class="content-wrapper">
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6"><h1>'.$t->nama_mainmodul.'</h1></div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">'.$t->nama_mainmodul.'</li>
                  </ol>
                </div>
              </div>
            </div>
          </section>
          <section class="content">
            <div class="row">
              <div class="col-12">';
        if($_SESSION['leveluser']=='superadmin'){
          if($t->modul_tambahan=='N'){
            include "modul/mod_".$t->path."/".$t->path.".php";
          }else{
            include "modul_tambahan/".$aw->alamat_website."/mod_".$t->path."/".$t->link.".php";
          }
        }elseif($_SESSION['leveluser']=='admin' AND $t->level_admin=='Y'){
          if($t->modul_tambahan=='N'){
            include "modul/mod_".$t->path."/".$t->path.".php";
          }else{
            include "modul_tambahan/".$aw->alamat_website."/mod_".$t->path."/".$t->link.".php";
          }
        }elseif($_SESSION['leveluser']=='user' AND $t->level_user=='Y'){
          if($t->modul_tambahan=='N'){
            include "modul/mod_".$t->path."/".$t->path.".php";
          }else{
            include "modul_tambahan/".$aw->alamat_website."/mod_".$t->path."/".$t->link.".php";
          }
        }else{
          echo'<section>
              <div class="alert alert-danger alert-dismissible">
                <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
                Anda tidak memiliki akses ke menu ini. Silahkan hubungi Administrator melalui menu pesan.
              </div>
            </section>';
        }
      }elseif($ada->num_rows > 0){
        $id_modul = $u->id_modul;
        $qry2	= $db->prepare("SELECT a.id_modul, a.id_mainmodul, b.id_mainmodul, b.icon, b.nama_mainmodul, b.link FROM modul a, mainmodul b WHERE a.id_mainmodul = b.id_mainmodul AND a.id_modul='$id_modul'");
        $qry2->execute();
        $ada2 = $qry2->get_result();
        $t2		= $ada2->fetch_object();
        echo'
        <div class="content-wrapper">
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6"><h1>'.$t2->nama_mainmodul.'</h1></div>
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="#">'.$t2->nama_mainmodul.'</a></li>
                    <li class="breadcrumb-item active">'.$u->nama_modul.'</li>
                  </ol>
                </div>
              </div>
            </div>
          </section>
          <section class="content">
            <div class="row">
              <div class="col-12">';
        if($_SESSION['leveluser']=='superadmin'){
          if($u->modul_tambahan=='N'){
            include "modul/mod_".$u->path."/".$u->link.".php";
          }else{
            include "modul_tambahan/".$aw->alamat_website."/mod_".$u->path."/".$u->link.".php";
          }
        }elseif($_SESSION['leveluser']=='admin' AND $u->l_admin=='Y'){
          if($u->modul_tambahan=='N'){
            include "modul/mod_".$u->path."/".$u->link.".php";
          }else{
            include "modul_tambahan/".$aw->alamat_website."/mod_".$u->path."/".$u->link.".php";
          }
        }elseif($_SESSION['leveluser']=='user' AND $u->l_user=='Y'){
          if($u->modul_tambahan=='N'){
            include "modul/mod_".$u->path."/".$u->link.".php";
          }else{
            include "modul_tambahan/".$aw->alamat_website."/mod_".$u->path."/".$u->link.".php";
          }
        }else{
          echo'
          <section>
            <div class="alert alert-danger alert-dismissible">
              <h4><i class="icon fa fa-ban"></i> Perhatian!</h4>
              Anda tidak memiliki akses ke menu ini.
            </div>
          </section>';
        }
      }else{
        echo'
        <section>
          <div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-tools"></i> Maaf!</h4>
            Modul ini belum tersedia.<br>Jika Anda berminat silahkan hubungi caramel dot com WA 085920070881.
          </div>
        </section>';
      }
    }
    $qry->close();
    $qry1->close();
  }
  ?>
        </div>
      </div>
    </div>
  </section>
</div>