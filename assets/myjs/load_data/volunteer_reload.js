var datatable = $('#dataTable').DataTable({ 
    initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
            .off('.DT')
            .on('input.DT', function() {
                api.search(this.value).draw();
        });
    },
    
    ordering: false,
    oLanguage: {
    sProcessing: "loading..."
    },
    processing: true,
    serverSide: true,
    ajax: {"url": url_base+"volunteer/load_volunteer", "type": "POST"},
    columns: [
        {"data": "nama_volunteer"},
        {"data": "domisili"},
    ],
    rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        $('td:eq(0)', row).html();
    },
    "columnDefs": [
    { "searchable": false, "targets": "" },  // Disable search on first and last columns
    ],
    "rowReorder": {
        "selector": 'td:nth-child(0)'
    },
    "responsive": true,
});