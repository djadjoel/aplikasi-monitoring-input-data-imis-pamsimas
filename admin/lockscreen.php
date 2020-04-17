<?php //error_reporting(0); ?>
<?php include "../fungsi/koneksi.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>.: LOGIN :.</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="author" content="www.bantenwebsitemurah.com - Ilyas Hp. 085920070881 Email: djadjoel@gmail.com">
        <link rel="stylesheet" href="<?php echo PLUGIN ?>/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo DIST ?>/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="shortcut icon" href="<?php echo TEMPLATES ?>/<?php echo $aw->alamat_website?>/uploads/ico/<?php echo $aw->favicon?>" type="image/vnd.microsoft.icon">
    </head>
    <body class="hold-transition lockscreen bg-lock" style="color: aliceblue;">
    	<?php
  		include "statik_variable.php";
  		session_start();
  		if(isset($_COOKIE['cookielogin'])){
  			if(($_COOKIE['cookielogin']['user']==$statik_user)&&($_COOKIE['cookielogin']['pass']==$statik_password)){
  				print_r($_COOKIE);
  				$_SESSION['logged']=1;
  				header('location:media.php?module=home');
  			}
  		}
      ?>
        <div class="lockscreen-wrapper">
            <div class="text-center">
                <div id="time" style="font-size: 50px; margin-bottom: 30px;"></div>
                Terima kasih Atas kunjungan Anda<br><br>
                <a href="index.php" class="btn btn-warning"><i class="fa fa-key"></i> LOGIN KEMBALI</a>
                <a href="../" class="btn btn-info"><i class="fa fa-eye"></i> LIHAT WEBSITE</a>
                <div class="lockscreen-footer text-center">
                    <!--<br>Butuh Jasa Desain? Kunjungi <b><a href="http://bantenwebsitemurah.com" class="text-black">www.bantenwebsitemurah.com</a></b>-->
					<br>&copy; <?php $waktu= date("Y"); echo"$waktu "?>All rights reserved
                </div>
            </div>
        </div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript">
            $(function() {
                startTime();
                $(".center").center();
                $(window).resize(function() {
                    $(".center").center();
                });
            });

            /*  */
            function startTime()
            {
                var today = new Date();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();

                // add a zero in front of numbers<10
                m = checkTime(m);
                s = checkTime(s);

                //Check for PM and AM
                var day_or_night = (h > 11) ? "PM" : "AM";

                //Convert to 12 hours system
                if (h > 12)
                    h -= 12;

                //Add time to the headline and update every 500 milliseconds
                $('#time').html(h + ":" + m + ":" + s + " " + day_or_night);
                setTimeout(function() {
                    startTime()
                }, 500);
            }

            function checkTime(i)
            {
                if (i < 10)
                {
                    i = "0" + i;
                }
                return i;
            }


            /* CENTER ELEMENTS IN THE SCREEN */
            jQuery.fn.center = function() {
                this.css("position", "absolute");
                this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
                        $(window).scrollTop()) - 30 + "px");
                this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
                        $(window).scrollLeft()) + "px");
                return this;
            }
        </script>
    </body>
</html>
