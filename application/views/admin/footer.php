<?php
$ceks = $this->session->userdata('admin_ordodev@2017');
$menu = strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
?>
<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2017 &copy; <?php echo $judul ?>.</div>
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
  <script src="assets/admin/js/wysihtml5-0.3.0.js"></script>
  <script src="assets/admin/js/bootstrap-wysihtml5.js"></script>
  <script>
  	$('.textarea_editor').wysihtml5();
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

<?php if($menu=='aplikasi' || $sub_menu=='edit_app'){ ?>
$(document).ready(function() {
   $(".add").click(function(){
       var html = $(".copy").html();
       $(".after-add").after(html);
   });
   $("body").on("click",".remove",function(){
       $(this).parents(".control-group").remove();
   });
 });
<?php } ?>
</script>
</body>
</html>
