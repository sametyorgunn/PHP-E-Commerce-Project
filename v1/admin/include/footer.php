    <footer class="footer"> © 2022 İşte E-Ticaret </footer>
      
    </div>
    
    <script src="assets/jquery.js"></script>
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/waves.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <script src="dist/js/pages/jasny-bootstrap.js"></script>
    <script src="assets/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="dist/js/dashboard1.js"></script>
    <script src="assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="assets/node_modules/tinymce/tinymce.min.js"></script>
    <script src="assets/node_modules/dropzone-master/dist/dropzone.js"></script>
    <script src="assets/node_modules/switchery/dist/switchery.min.js"></script>
    <script src="assets/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/node_modules/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/node_modules/sparkline/jquery.sparkline.min.js"></script>

    
    <script>
    $(document).ready(function() {

    if ($("#mymce").length > 0) {
    tinymce.init({
    selector: "textarea#mymce",
    theme: "modern",
    height: 300,
    plugins: [
    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "save table contextmenu directionality emoticons template paste textcolor"],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", }); } });
    </script>
    <!-- end - This is for export functionality only -->
    
    <script>
    $(document).ready(function() {
    // Basic
    $('.dropify').dropify();

    // Translated
    $('.dropify-fr').dropify({
    messages: {
    default: 'Glissez-déposez un fichier ici ou cliquez',
    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
    remove: 'Supprimer',
    error: 'Désolé, le fichier trop volumineux' } });

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element) {
    return confirm("Do you really want to delete \"" + element.file.name + "\" ?"); });

    drEvent.on('dropify.afterClear', function(event, element) {
    alert('File deleted'); });

    drEvent.on('dropify.errors', function(event, element) {
    console.log('Has Errors'); });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e) {
    e.preventDefault();
    if (drDestroy.isDropified()) {
    drDestroy.destroy();
    } else {
    drDestroy.init(); } }) });
    </script>

    <script>
    $(function () {
    $('#myTable').DataTable();
    var table = $('#example').DataTable({
    "columnDefs": [{
    "visible": false,
    "targets": 2 }],
    "order": [
    [2, 'asc'] ],
    "displayLength": 25,
    "drawCallback": function (settings) {
    var api = this.api();
    var rows = api.rows({
    page: 'current'
    }).nodes();
    var last = null;
    api.column(2, {
    page: 'current'
    }).data().each(function (group, i) {
    if (last !== group) {
    $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
    last = group; } }); } });
    
    // Order by the grouping
    $('#example tbody').on('click', 'tr.group', function () {
    var currentOrder = table.order()[0];
    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
    table.order([2, 'desc']).draw();
    } else {
    table.order([2, 'asc']).draw(); } });
    
    // responsive table
    $('#config-table').DataTable({
    responsive: true });
    
    $('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [ ] }); });
    </script>



    </body>
    </html>