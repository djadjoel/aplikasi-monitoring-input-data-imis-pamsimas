<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      Versi <b><?php echo $aw->versi ?></b>
    </div>
    <?php
    $end = microtime(true);
    $creationtime = ($end - $start);
    printf("Page created in <b>%.6f</b> seconds", $creationtime);
    ?>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>