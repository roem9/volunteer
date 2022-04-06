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
    ajax: {"url": url_base+"waqif/load_waqif", "type": "POST"},
    columns: [
        {"data": "tgl_waqaf", render:function(data){
            return tgl_indo(data)
        }},
        {"data": "nama_waqif"},
        {"data": "no_wa"},
        {"data": "nominal", render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' )},
        {"data": "nama_volunteer"},
        {"data": "sertifikat"},
        {"data": "menu", render : function (data) {
            if(jQuery.browser.mobile == true) return data
            else return "<center>"+data+"</center>"
        }},
    ],
    order: [[0, 'desc']],
    rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        $('td:eq(0)', row).html();
    },
    "columnDefs": [
    { "searchable": false, "targets": "" },  // Disable search on first and last columns
    { "targets": [5, 6], "orderable": false},
    ],
    "rowReorder": {
        "selector": 'td:nth-child(0)'
    },
    "responsive": true,
});