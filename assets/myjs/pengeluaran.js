// add data 
$(document).on("click", "#addPengeluaran .btnTambah", function(){
    data = {form:"#addPengeluaran", confirm:"Yakin akan menambahkan pengeluaran?", url:"transaksi/add_pengeluaran", success:"Berhasil menambahkan data pengeluaran"};
    
    inputData(data);
})

$(document).on("click", ".editPengeluaran", function(){
    let form = "#editPengeluaran";

    let id_pengeluaran = $(this).data("id");
    let data = {id_pengeluaran: id_pengeluaran};
    let result = ajax(url_base+"transaksi/get_pengeluaran", "POST", data)
    
    $.each(result, function(key, value){
        $(form+" [name='"+key+"']").val(value);
    })
})

// edit data 
$(document).on("click", "#editPengeluaran .btnEdit", function(){
    data = {form:"#editPengeluaran", confirm:"Yakin akan mengubah data pengeluaran?", url:"transaksi/edit_pengeluaran", success:"Berhasil mengubah data pengeluaran"};
    
    inputData(data);
})