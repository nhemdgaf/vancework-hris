$(document).ready(function () {
    // $('#employees_table tfoot th').each(function () {
    //     var title = $(this).text();
    //     $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    // });

    var table = $('#employees_table').DataTable({
        searchPanes: {
            viewTotal: false,
        },
        // dom: 'Pfrtip',
        // responsive: true,
        // columnDefs: [{
        //         searchPanes: {
        //             show: true,
        //         },
        //         targets: [0],
        //     },
        //     {
        //         searchPanes: {
        //             show: true,
        //         },
        //         targets: [1],
        //     }
        // ]
    });

    //  $('#employees_table').DataTable().searchPanes.rebuildPane();

    // table.columns().every(function () {
    //     var that = this;

    //     $('input', this.footer()).on('keyup change', function () {
    //         if (that.search() !== this.value) {
    //             that
    //                 .search(this.value)
    //                 .draw();
    //         }
    //     });
    // });

    $('.filter-select').change(function(){
        table.column( $(this).data('column') )
            .search( $(this).val() )
            .draw();
    });

    $('#employees_table').on('click', 'tbody tr', function () {
        window.location.href = $(this).data('href');
    });

});
