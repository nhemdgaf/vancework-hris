$(document).ready(function () {
    $('#dtr_table').DataTable({
        "scrollX": true
    });

    $('#dtr_table_compare_csv').DataTable({
        "order": []
    });

    $('#dtr_table_compare_db').DataTable({
        "order": []
    });

    if ($("#dtr_table_compare_csv tr").has("td.bg-danger").length > 0) {
        $("#goPayroll").attr('disabled', true);
    }
});
