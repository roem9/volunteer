var page = "";

// Load pagination for mobile
function loadMobile(pagno){
    loadDataMobile(pagno, "transaksi/loadMobileRekap/");
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
                            `+icon("", 'database')+`
                        </a>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-data-`+index+`">
                            <div>
                                <p>
                                    `+icon("me-2", "calendar")+`
                                    `+data[index].periode+`
                                </p>
                                <p class="text-success">
                                    `+icon("me-2", "coin")+`
                                    <span class="me-3">`+data[index].pemasukan+`</span>
                                </p>
                                <p class="text-danger">
                                    `+icon("me-2", "shopping-cart")+`
                                    <span class="me-3">`+data[index].pengeluaran+`</span>
                                </p>
                                <p>
                                    `+icon("me-2", "sum")+`
                                    <b>`+data[index].total+`</b>
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

    $(document).ready( function () {
        $('#dataTable').dataTable({
            ordering: false
        });
      });
}