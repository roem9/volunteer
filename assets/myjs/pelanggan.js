// get data for edit

$(document).on("click", ".detailPelanggan", function(){
    let form = "#detailPelanggan";

    let id_pelanggan = $(this).data("id");
    let data = {id_pelanggan: id_pelanggan};
    let result = ajax(url_base+"pelanggan/get", "POST", data)
    
    $.each(result, function(key, value){
        $(form+" [name='"+key+"']").val(value);
    })
})

// add data 
$(document).on("click", "#addPelanggan .btnTambah", function(){
    data = {form:"#addPelanggan", confirm:"Yakin akan menambahkan data pelanggan?", url:"pelanggan/add", success:"Berhasil menambahkan data pelanggan"};
    
    inputData(data);
})

// edit data 
$(document).on("click", "#detailPelanggan .btnEdit", function(){
    data = {form:"#detailPelanggan", confirm:"Yakin akan mengubah data pelanggan?", url:"pelanggan/edit", success:"Berhasil mengubah data pelanggan"};
    
    inputData(data);
})

$(document).on("click", ".detailLangganan", function() {
    let form = "#detailLangganan";

    let id_pelanggan = $(this).data("id");
    let result = ajax(url_base+"pelanggan/get", "POST", {id_pelanggan:id_pelanggan});

    $(form+" .modal-title").html(result.nama_pelanggan);
    $(form+" [name='id_pelanggan']").val(id_pelanggan);

    listLangganan(id_pelanggan);
})

$(document).on("click", "#detailLangganan .btnTambah", function(){
    
    data = {form:"#detailLangganan", confirm:"Yakin akan menambahkan data langganan?", url:"pelanggan/add_langganan", success:"Berhasil menambahkan data langganan", function:"listLangganan"}
    
    
    Swal.fire({
        icon: 'question',
        text: data.confirm,
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = data.form;
            
            let formData = {};
            $(form+" .form").each(function(index){
                formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()})
            })

            let eror = required(form);
            
            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {                
                let result = ajax(url_base+data.url, "POST", formData);

                if(result == 1){
                    loadData();
                    listLangganan(formData.id_pelanggan);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: data.success,
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $(data.form+" form").trigger("reset");
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'terjadi kesalahan'
                    })
                }
            }
        }
    })
})

function listLangganan(id_pelanggan) {
    let form = "#detailLangganan";
    let result = ajax(url_base+"pelanggan/get_langganan", "POST", {id_pelanggan:id_pelanggan});

    html = ""

    $("#countList").html(result.length);

    if(result.length != 0){
        result.forEach(function(data){
            html += `
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row align-items-center">
                                <p>
                                    `+icon("me-3", "notes")+`
                                    `+data.tipe+`
                                </p>
                                <p>
                                    `+icon("me-3", "calendar")+`
                                    `+data.tgl_tagihan+`
                                </p>
                                <p>
                                    `+icon("me-3", "coin")+`
                                    `+formatRupiah(data.tarif, "Rp.", )+` / `+data.periode+`
                                </p>
                                <p>
                                    `+icon("me-3", "info-circle")+`
                                    `+data.status+`
                                </p>
                        </div>
                    </div>
                </div>`
        })
    } else {
        html += `<div class="empty">
            <p class="empty-title">List Kosong</p>
        </div>`
    }

    $(form+" #listLangganan").html(html);
}