<!-- FontAwesome JS-->
<script defer src="assets/assets/plugins/fontawesome/js/all.min.js"></script>

<!-- Javascript -->
<script src="assets/assets/plugins/popper.min.js"></script>
<script src="assets/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Charts JS -->
<script src="assets/assets/plugins/chart.js/chart.min.js"></script>
<!-- <script src="assets/assets/js/index-charts.js"></script> -->

<!-- Page Specific JS -->
<script src="assets/assets/js/app.js"></script>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
$('#tableall').DataTable({
    language : {
        "decimal":        "",
        "emptyTable":     "ไม่มีข้อมูล",
        "info":           "แสดง _START_ - _END_ จาก _TOTAL_ รายการ",
        "infoEmpty":      "แสดง 0 - 0 จาก 0 รายการ",
        "infoFiltered":   "(filtered from _MAX_ total entries)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "แสดง _MENU_ รายการ",
        "loadingRecords": "Loading...",
        "processing":     "",
        "search":         "ค้นหา:",
        "zeroRecords":    "No matching records found",
        "paginate": {
            "first":      "First",
            "last":       "Last",
            "next":       "หน้าถัดไป",
            "previous":   "ก่อนหน้า"
        },
        "aria": {
            "sortAscending":  ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        }
    }
    });
});
</script>

<!-- Ckeditor JS -->
<script src="assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description',{
        height:'300px',
        filebrowserUploadMethod:'form',
        filebrowserUploadUrl:'upload.php'
    });
</script>

<!-- Preview Image -->
<script type="text/javascript">
        function triggerFile(){
            // console.log('test') 
            $("#image").trigger("click");
            return false;
        }
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function(){
        readURL(this);
    });
</script>