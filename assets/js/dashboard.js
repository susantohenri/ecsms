$('#table_spinner').hide()
drawProjects()
$('[name="table_search"]').keyup(drawProjects)

function drawProjects() {
    $('#table_spinner').show()
    var criteria = {
        search: $('[name="table_search"]').val()
    }
    $.get(`${site_url}Project/dashboard`, criteria, function (projects) {
        var tbody = '';
        for (project of JSON.parse(projects)) {
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
        $(`.table.project tbody`).html(tbody)
        $('#table_spinner').hide()
    })
}