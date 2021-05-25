// get data for edit
$(document).on("click", ".editTransaksiPenyewaan", function(){
    let form = "#editTransaksiPenyewaan";

    let id_transaksi = $(this).data("id");
    let data = {id_transaksi: id_transaksi};
    let result = ajax(url_base+"transaksi/get_penyewaan", "POST", data)
    
    $.each(result, function(key, value){
        $(form+" [name='"+key+"']").val(value);
    })
})

// add data 
$(document).on("click", "#addTransaksiPenyewaan .btnTambah", function(){
    data = {form:"#addTransaksiPenyewaan", confirm:"Yakin akan menambahkan data transaksi?", url:"transaksi/add_penyewaan", success:"Berhasil menambahkan data transaksi"};
    
    inputData(data);
})

$(document).on("click", "#editTransaksiPenyewaan .btnEdit", function(){
    data = {form:"#editTransaksiPenyewaan", confirm:"Yakin akan mengubah data transaksi?", url:"transaksi/edit_penyewaan", success:"Berhasil mengubah data transaksi"};
    
    inputData(data);
})

$("[name='pelanggan']").change(function(){
    let data = $(this).val();

    data = data.split("|");

    $("[name='nominal']").val(formatRupiah(data[1], "Rp."));
    $("[name='id_sewa']").val(data[0]);
})