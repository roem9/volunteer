$(".btnTambah").on("click", function(e){

    e.preventDefault();
    let eror = required("#formAddWaqif");
    
    if( eror == 1){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'lengkapi isi form terlebih dahulu'
        })
    } else {
        Swal.fire({
            icon: 'question',
            text: 'Yakin akan menambahkan waqif baru?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: url_base+"waqif/add_waqif",
                    data: new FormData(document.getElementById("formAddWaqif")),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(result){ 
                        if(result == 1){
                            loadData();
        
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                text: 'Berhasil menambahkan data waqif baru',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'terjadi kesalahan, silahkan mulai ulang halaman'
                            })
                        }
                    }
                });
            }
        })
    }
})

$(document).on("click",".detailWaqif", function(){
    let id_waqif = $(this).data("id");

    let data = {id_waqif: id_waqif};
    detail_waqif(data)
})

function detail_waqif(data){
    let form = "#detailWaqif";
    let result = ajax(url_base+"waqif/get_waqif", "POST", data);

    $.each(result, function(key, value){
        $(form+" [name='"+key+"']").val(value)
    })

    $("#img-detail").attr("src", url_base+`/assets/bukti_transfer/`+result.bukti_transfer)
}

$(".btnEdit").on("click", function(e){

    e.preventDefault();
    let eror = required("#formEditWaqif");
    
    if( eror == 1){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'lengkapi isi form terlebih dahulu'
        })
    } else {
        Swal.fire({
            icon: 'question',
            text: 'Yakin akan mengubah data waqif?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    type: 'POST',
                    url: url_base+"waqif/edit_waqif",
                    data: new FormData(document.getElementById("formEditWaqif")),
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(result){ 
                        if(result == 1){
                            loadData();

                            id_waqif = $("[name='id_waqif']").val();
                            data = {id_waqif: id_waqif}
                            detail_waqif(data);
        
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                text: 'Berhasil mengubah data waqif',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'terjadi kesalahan, silahkan mulai ulang halaman'
                            })
                        }
                    }
                });
            }
        })
    }
})

// menyimpan hasil edit data
// $("#detailWaqif .btnEdit").click(function(){
//     let form = "#detailWaqif";
            
//     let formData = {};
//     $(form+" .form").each(function(){
//         formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()})
//     })

//     let eror = required(form);
    
//     if( eror == 1){
//         Swal.fire({
//             icon: 'error',
//             title: 'Oops...',
//             text: 'lengkapi isi form terlebih dahulu'
//         })
//     } else {
//         Swal.fire({
//             icon: 'question',
//             text: 'Yakin akan mengubah data waqif?',
//             showCloseButton: true,
//             showCancelButton: true,
//             confirmButtonText: 'Ya',
//             cancelButtonText: 'Tidak'
//         }).then(function (result) {
//             if (result.value) {
//                 let result = ajax(url_base+"waqif/edit_waqif", "POST", formData);

//                 if(result == 1){
//                     loadData();

//                     Swal.fire({
//                         position: 'center',
//                         icon: 'success',
//                         text: 'Berhasil mengubah data waqif',
//                         showConfirmButton: false,
//                         timer: 1500
//                     })
//                 } else {
//                     Swal.fire({
//                         icon: 'error',
//                         title: 'Oops...',
//                         text: 'terjadi kesalahan, silahkan mulai ulang halaman'
//                     })
//                 }
//             }
//         })
//     }
// })
