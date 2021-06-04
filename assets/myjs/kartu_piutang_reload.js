// id pelanggan
var url = window.location.href;
var id_pelanggan = url.substring(url.indexOf("kartupiutang/") + 13);

console.log(id_pelanggan);

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
    ajax: {"url": url_base+"pelanggan/loadKartuPiutang/"+id_pelanggan, "type": "POST"},
    columns: [
        {"data": "tgl_transaksi"},
        {"data": "nama_pelanggan"},
        {"data": "jualan"},
        {"data": "keterangan"},
        {"data": "nominal",
        render: $.fn.dataTable.render.number( '.', '.', 0, 'Rp' ) },
        {"data": "view"},
    ],
    order: [[0, 'desc']],
    rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        $('td:eq(0)', row).html();
    },
    // give color in specific row condition 
    "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        if (aData.status == "Belum Lunas") {
            $('td', nRow).addClass('bg-red-lt');
        }
    },
    "columnDefs": [
    { "searchable": false, "targets": [""] },  // Disable search on first and last columns
    { "targets": [5], "orderable": false},
    ],
    "rowReorder": {
        "selector": 'td:nth-child(0)'
    },
    "responsive": true,
});