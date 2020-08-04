$('#table_spinner').hide()
drawProjects()
$('[name="table_search"]').keyup(drawProjects)

function drawProjects() {
    $('#table_spinner').show()
    var criteria = {
        search: $('[name="table_search"]').val(),
        requested_page: $(`ul.pagination li a.active`).text()
    }
    $.get(`${site_url}Project/dashboard`, criteria, function (result) {
        result = JSON.parse(result)
        var tbody = '';
        for (project of result.data) {
            tbody += `
            <tr>
                <td>
                    ${project.number}
                </td>
                <td>
                    <a href="${site_url}Project/read/${project.uuid}" style="color: inherit">
                    ${project.nama}
                    </a>
                </td>
                <td class="col-sm-8">
                    <div class="progress">
                        <div class="progress-bar bg-info" role="progressbar" style="width:17%">
                            <a href="">&nbsp;</a>
                        </div>
                        <div class="progress-bar bg-warning" role="progressbar" style="width:17%">
                            <a href="">&nbsp;</a>
                        </div>
                        <div class="progress-bar bg-default" role="progressbar" style="width:17%">
                            <a href="">&nbsp;</a>
                        </div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width:17%">
                            <a href="">&nbsp;</a>
                        </div>
                        <div class="progress-bar bg-teal" role="progressbar" style="width:17%">
                            <a href="">&nbsp;</a>
                        </div>
                        <div class="progress-bar bg-danger" role="progressbar" style="width:17%">
                            <a href="">&nbsp;</a>
                        </div>
                    </div>
                </td>
            </tr>
        `
        }

        var pagenumbers = ''
        for (var page = 1; page <= result.total_page; page++) {
            pagenumbers += `<li class="page-item"><a class="page-link text-danger">${page}</a></li>`
        }

        $(`.table.project tbody`).html(tbody)
        $(`ul.pagination`).html(pagenumbers)
        $(`ul.pagination li a:contains(${result.current_page})`).addClass('active')
        $(`ul.pagination li a`).click(function () {
            $(`ul.pagination li a`).removeClass('active')
            $(this).addClass('active')
            drawProjects()
        })
        $('#table_spinner').hide()
    })
}