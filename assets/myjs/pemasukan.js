// add data 
$(document).on("click", "#addPemasukan .btnTambah", function(){
    data = {form:"#addPemasukan", confirm:"Yakin akan menambahkan pemasukan?", url:"transaksi/add_pemasukan", success:"Berhasil menambahkan data pemasukan"};
    
    inputData(data);
})

$(document).on("click", ".editPemasukan", function(){
    let form = "#editPemasukan";

    let id_pemasukan = $(this).data("id");
    let data = {id_pemasukan: id_pemasukan};
    let result = ajax(url_base+"transaksi/get_pemasukan", "POST", data)
    
    $.each(result, function(key, value){
        $(form+" [name='"+key+"']").val(value);
    })
})

// edit data 
$(document).on("click", "#editPemasukan .btnEdit", function(){
    data = {form:"#editPemasukan", confirm:"Yakin akan mengubah data pemasukan?", url:"transaksi/edit_pemasukan", success:"Berhasil mengubah data pemasukan"};
    
    inputData(data);
})