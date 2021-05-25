var datatable = $('#dataTable').DataTable({ 
    initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
            .off('.DT')
            .on('input.DT', function() {
                api.search(this.value).draw();
        });
    },
    oLanguage: {
    sProcessing: "loading..."
    },
    processing: true,
    serverSide: true,
    ajax: {"url": url_base+"penyewaan/load", "type": "POST"},
    columns: [
        {"data": "status"},
        {"data": "nama_pelanggan"},
        {"data": "tipe"},
        {"data": "tarif",
        render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp' ) },
        {"data": "jualan"},
        {"data": "tgl_tagihan", 
            render: function ( data, type, row ) {
                if(data != 0){
                    return "Tanggal " + data;
                } else {
                    if(jQuery.browser.mobile == true) return "-"
                    else return "<center>-</center>"
                }
            }
        },
        {"data": "view"},
    ],
    order: [[1, 'asc']],
    rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        $('td:eq(0)', row).html();
    },
    "columnDefs": [
    { "searchable": false, "targets": [""] },  // Disable search on first and last columns
    { "targets": [6], "orderable": false},
    ],
    "rowReorder": {
        "selector": 'td:nth-child(0)'
    },
    "responsive": true,
});