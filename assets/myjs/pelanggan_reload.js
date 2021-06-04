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
    ajax: {"url": url_base+"pelanggan/load", "type": "POST"},
    columns: [
        {"data": "no_ktp", render: function ( data, type, row ) {
            if(data != ""){
                return data;
            } else {
                if(jQuery.browser.mobile == true) return "-"
                else return "<center>-</center>"
            }
        }},
        {"data": "nama_pelanggan"},
        {"data": "tagihan", render: function(data) {
            if(data != null){
                return formatRupiah(data, "Rp")

            } else {
                return 'Rp. 0'
            }
        }},
        {"data": "no_hp"},
        {"data": "langganan", render : function (data) {
            if(jQuery.browser.mobile == true) return data
            else return "<center>"+data+"</center>"
        }},
        {"data": "view"},
    ],
    "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        if (aData.tagihan != null) {
            $('td', nRow).addClass('bg-red-lt');
        }
    },
    order: [[1, 'asc']],
    rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        $('td:eq(0)', row).html();
    },
    "columnDefs": [
    { "searchable": false, "targets": "" },  // Disable search on first and last columns
    { "targets": [5], "orderable": false},
    ],
    "rowReorder": {
        "selector": 'td:nth-child(0)'
    },
    "responsive": true,
});