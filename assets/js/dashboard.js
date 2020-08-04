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
                        <div class="progress-bar border-info" role="progressbar" style="width:17%">
                            ${project.hse_link ? '<a href="' +project.hse_link+  '">&nbsp;</a>' : ''}
                        </div>
                        <div class="progress-bar border-warning" role="progressbar" style="width:17%">
                            ${project.pja_link ? '<a href="' +project.pja_link+  '">&nbsp;</a>' : ''}
                        </div>
                        <div class="progress-bar border-default" role="progressbar" style="width:17%">
                            ${project.lapbul_link ? '<a href="' +project.lapbul_link+  '">&nbsp;</a>' : ''}
                        </div>
                        <div class="progress-bar border-secondary" role="progressbar" style="width:17%">
                            ${project.wip_link ? '<a href="' +project.wip_link+  '">&nbsp;</a>' : ''}
                        </div>
                        <div class="progress-bar border-teal" role="progressbar" style="width:17%">
                            ${project.kpi_link ? '<a href="' +project.kpi_link+  '">&nbsp;</a>' : ''}
                        </div>
                        <div class="progress-bar border-danger" role="progressbar" style="width:17%">
                            ${project.fe_link ? '<a href="' +project.fe_link+  '">&nbsp;</a>' : ''}
                        </div>
                    </div>
                </td>
            </tr>
        `
        }

        $(`.table.project tbody`).html(tbody)

        var pagenumbers = ''
        for (var page = 1; page <= result.total_page; page++) {
            pagenumbers += `<li class="page-item"><a class="page-link text-danger">${page}</a></li>`
        }
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