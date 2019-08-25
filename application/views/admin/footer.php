<?php
$ceks = $this->session->userdata('un_admin');
$menu = strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
?>
<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2019 &copy; <?php echo $judul ?>.</div>
</div>

<!--end-Footer-part-->
  <script src="assets/admin/js/jquery.min.js"></script>
  <script src="assets/admin/js/jquery.ui.custom.js"></script>
  <script src="assets/admin/js/bootstrap.min.js"></script>
  <script src="assets/admin/js/jquery.uniform.js"></script>
  <script src="assets/admin/js/select2.min.js"></script>
  <script src="assets/admin/js/jquery.dataTables.min.js"></script>
  <script src="assets/admin/js/matrix.js"></script>
  <script src="assets/admin/js/matrix.tables.js"></script>
  <!-- <script src="assets/admin/js/wysihtml5-0.3.0.js"></script>
  <script src="assets/admin/js/bootstrap-wysihtml5.js"></script> -->
  <script src="https://cdn.tiny.cloud/1/4mo39ri6dgnfnyfqwhr6nhicdjgg3nckwd3ruoyr8sa3d5z7/tinymce/5/tinymce.min.js"></script>
  <!-- <script>
  	$('.textarea_editor').wysihtml5();
  </script> -->
  <!-- <script>
  tinymce.init({
    selector: '.textarea_editor',  // change this value according to your html
    plugins: "code image fullscreen media",
    image_uploadtab: true
  });

  </script> -->
  <script type="text/javascript">
    tinymce.init({
        selector: ".textarea_editor",
        plugins: [
             "advlist autolink lists link image charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars code fullscreen",
             "insertdatetime nonbreaking save table contextmenu directionality",
             "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image responsivefilemanager",
        images_upload_url: '<?php echo base_url() ?>admin/tinymce_upload',
        images_upload_base_path: '<?php echo base_url() ?>',
        images_upload_credentials: true
   });
</script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();
          }
          // else, send page to designated URL
          else {
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}

</script>
</body>
</html>
