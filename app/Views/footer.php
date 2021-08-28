<!-- Footer -->
<?php
$Date = date("d-m-Y");
$Year2 = date("Y");

?>
<footer class="footer pt-0">
  <div class="row align-items-center justify-content-lg-between">
    <div class="col-lg-12 d-flex justify-content-center">
      <div class="copyright text-center  text-lg-left  text-muted">
        &copy; <?php echo "$Year2"; ?> <a href="https://www.jlpintado.com" class="font-weight-bold ml-1" target="_blank">Jose Pintado</a>
      </div>
    </div>
    <!-- <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div> -->
  </div>
</footer>
</div>
</div>

<script src="<?php echo base_url(); ?>/public/assets/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>/public/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>/public/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="<?php echo base_url(); ?>/public/assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>/public/assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="<?php echo base_url(); ?>/public/assets/js/argon.js?v=1.2.0"></script>
<script>
  $('#modal-confirma').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
  });
</script>
<script src="<?php echo base_url(); ?>/public/assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>/public/assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>/public/assets/js/dataTables.js"></script>
</body>

</html>