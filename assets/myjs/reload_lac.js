var page = "";
        
// Detect pagination click
$('#pagination').on('click','a',function(e){
    e.preventDefault(); 
    var pageno = $(this).attr('data-ci-pagination-page');
    page = pageno;
    $("#skeleton").show()
    loadMobile(pageno);

});

// Load pagination
function loadMobile(pagno){
    // console.log(table)
    let search = $("input[name='search']").val();
    let data = {search:search};
    // let result = ajax(url_base+"marketing/loadLacMobile/"+pagno, "POST", data);
    let result = ajax(url_base+"example/loadLacMobile/"+pagno, "POST", data);
    
    if(result.total_rows != 0) {
        
        if(result.total_rows_perpage != 0){
            
            $('#pagination').html(result.pagination);
            createTable(result.result,result.row);

        } else {
            page = pagno - 1;
            let result = ajax(url_base+"example/loadLacMobile/"+page, "POST", "");

            $('#pagination').html(result.pagination);
            createTable(result.result,result.row);
        }

    } else {
        html = `
        <div class="d-flex flex-column justify-content-center">
            <div class="empty">
                <div class="empty-img"><img src="`+url_base+`assets/static/illustrations/undraw_printing_invoices_5r4r.svg" height="128"  alt="">
                </div>
                <p class="empty-title">Data kosong</p>
            </div>
        </div>`;
        
        $('#pagination').html("");
        $("#dataAjax").html(html);
    }
    
    $("#skeleton").hide()
}

// Create table list
function createTable(data,sno){

    sno = Number(sno);

    html = "";

    for(index in data){
        html += `
        <div class="col-md-4">
            <div class="card">
                <ul class="nav nav-tabs" data-bs-toggle="tabs">
                <li class="nav-item">
                    <a href="#tabs-data-`+index+`" class="nav-link active" data-bs-toggle="tab">
                        `+icon("", 'user')+`
                    </a>
                </li>
                <li class="nav-item ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            `+icon("", 'settings')+`
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item detailLac" href="#detailLac" data-bs-toggle="modal" data-id="`+data[index].id_lac+`">Detail</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="`+url_base+`lac/pdf/`+data[index].id+`" target="_blank">Pdf</a>
                        </div>
                    </li>
                </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-data-`+index+`">
                            <div>
                                <p>
                                    <svg width="24" height="24" class="me-2">
                                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user" />
                                    </svg> 
                                    `+data[index].nama_lac+`
                                </p>
                                <p>
                                    <svg width="24" height="24" class="me-2">
                                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-info-circle" />
                                    </svg> 
                                    `+data[index].status+`
                                </p>
                                <p>
                                    <svg width="24" height="24" class="me-2">
                                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user-check" />
                                    </svg> 
                                    <span class="me-3">`+data[index].marketing_aktif+`</span>
                                    
                                    <svg width="24" height="24" class="me-2">
                                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user-off" />
                                    </svg> 
                                    <span class="me-3">`+data[index].marketing_nonaktif+`</span>

                                    <svg width="24" height="24" class="me-2">
                                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-users" />
                                    </svg> 
                                    <span class="me-3">`+data[index].marketing+`</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
    }

    $("#dataAjax").html(html);

};

if(jQuery.browser.mobile == true){
    loadMobile(0);
    $("#paging").show()
    $("#dataPc").hide()
} else {
    $("#searchBar").hide()
    $("#dataPc").show()
    var datatable = $('#dataTable').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": url_base+"example/loadLac",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [0, 6, 7], //first column / numbering column
                "orderable": false, //set not orderable
            },
        ],

        "columns": [
            null,
            null,
            { className: "td-truncate" },
            null,
            null,
            null,
            null,
            null,
        ]
    });
}