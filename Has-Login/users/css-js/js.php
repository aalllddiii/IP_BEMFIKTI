<script src="assets/template/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/template/vendors/chart.js/Chart.min.js"></script>
<script src="assets/template/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="assets/template/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="assets/template/js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/template/js/off-canvas.js"></script>
<script src="assets/template/js/hoverable-collapse.js"></script>
<script src="assets/template/js/template.js"></script>
<script src="assets/template/js/settings.js"></script>
<script src="assets/template/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="assets/template/js/dashboard.js"></script>
<script src="assets/template/js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->

<script>
    const timestamp = Date.now()
    const humanReadableDateTime = new Date(timestamp).toDateString()
    // var today = new Date();
    // var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
    document.getElementById("currentDate").textContent = humanReadableDateTime;
</script>