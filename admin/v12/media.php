<?php
session_start();
$start = microtime(true);
//error_reporting(0);
include "../../fungsi/koneksi.php";
include "../timeout.php";
if($_SESSION['login']==1){
	if(!cek_login()){
		$_SESSION['login'] = 0;
	}
}
if($_SESSION['login']==0){
	header('location:../logout.php');
}else{
	if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser']) AND $_SESSION['login']==0){
		header('location:../index.php');
	}else{
?>
<!DOCTYPE html>
<html>
	<?php include "head.php" ?>
	<body class="hold-transition sidebar-mini">
		<div class="wrapper">
			<?php
			include "header.php";
			//include "warna.php";
			include "sidebar.php";
			include "content.php";
			include "footer.php";
			?>
		</div>
		<?php include "buttom.php"; ?>
   </body>
</html>
<?php
}
}
?>