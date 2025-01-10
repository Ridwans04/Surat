<script>
    // FUNGSI MENAMPILKAN DATA
    const tableInsSucc = (data) => {
        var html_row = "";
        var menu = "";
        $.each(data, function(key, val) {

            menu =
                `
                    <button onclick="show_modal_ins('${val.id}')"
                    type="button" class="btn btn-icon btn-info text-start">
                    <i data-feather="edit"></i>
                     Edit</button>
                `
            var ins = [];
            val.has_many_userins.forEach(userIns => {
                if (userRole.has_one_masterins && userRole.has_one_masterins.institusi) {
                    ins.push(
                        `<span class="btn btn-outline-success">${userIns.has_one_masterins.nama_institusi.replaceAll("_", " ")}</span>`
                    );
                }
            });
            html_row += `<tr>
                            <td>${val.username}</td>
                            <td>${ins.join(" ")}</td>
                            <td>${menu}</td>
                        </tr>`;
        });
        var html_content = `
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Institusi</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody>
                ${html_row}
            </tbody>`;
        if ($.fn.DataTable.isDataTable("#user_ins")) {
            $("#user_ins").DataTable().destroy();
        }
        $("#user_ins").unblock().html(html_content).DataTable({
            searching: false,
            ordering: false,
            drawCallback: function() {
                $(`#user_ins [data-feather]`).each(function() {
                    var icon = $(this).data('feather');
                    $(this).empty().append(feather.icons[icon].toSvg({
                        width: 14,
                        height: 14
                    }));
                });
            }
        });
    }
    const tableInsErr = (data) => {
        var html_content = `
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>`;
        $("#user_ins").html(html_content);
        $("#user_ins").unblock();
        setTable("#user_ins");
    }
    const get_user_ins = () => {
        success_msg = "Data berhasil ditampilkan";
        warning_msg = "Data gagal ditampilkan";
        error_msg = "Data gagal ditampilkan";
        var url = `{{ route('user_ins.index') }}`;
        var method = "GET";
        var data = {};
        var table = "#user_ins";
        var funcSuccess = tableInsSucc;
        var funcError = tableInsErr;
        ajaxtable(url, data, method, table, funcSuccess, funcError);
    }
    get_user_ins();

    FUNGSI MENAMPILKAN DATA YANG AKAN DIEDIT
    const show_modal_detail = (id) => {
        success_msg = "Data berhasil ditampilkan";
        warning_msg = "Data gagal ditampilkan";
        error_msg = "Data gagal ditampilkan";
        var url = `{{ route('user_role.show', ':id') }}`;
        url = url.replace(':id', id);
        var method = "GET";
        var data = {}
        var table = "table";
        var funcSuccess = setDataUpdate;
        var funcError = function() {};
        ajaxtable(url, {}, "GET", "", funcSuccess, funcError);
    }

    FUNGSI SELECT2
    function setSelect2(select, placeholder) {
        $(select).select2({
            dropdownParent: $('#modal_detail'),
            placeholder: placeholder,
        });
    }

    // FUNGSI MENAMPILKAN MODAL EDIT DATA
    // const setDataUpdate = (data, table) => {
    //     $(table).unblock();
    //     $('#id_role').val(data.user_role.id);
    //     var userRoles = [];
    //     var userRolesData = data.user_role.has_many_userrole;
    //     userRoles = userRolesData.map(userRole => userRole.has_one_masterrole.role);
    //     var html_row = "",
    //         num = 0;
    //     $.each(data.role, function(key, val) {
    //         var role = val.role.replaceAll("_", " ");
    //         // console.log(role);
    //         html_row +=
    //             `<option value="${val.id}" ${userRoles.includes(val.role) ? "selected" : ""}>${role}</option>`;
    //         num++;
    //     });
    //     $("select#upd_role").html(html_row);
    //     $("select#upd_role", "Pilih Role");
    //     $('#modal_user_role').modal('show');
    // }

    // FUNGSI UPDATE DATA AKUN
    // const update_userrole = (obj) => {
    //     const form = new FormData(obj);
    //     success_msg = "Data berhasil ditampilkan";
    //     warning_msg = "Data gagal ditampilkan";
    //     error_msg = "Data gagal ditampilkan";
    //     var url = `{{ route('user_role.update', ':id') }}`;
    //     url = url.replace(':id', form.get('id_role'));
    //     var funcSuccess = get_user_role;
    //     var funcError = function() {};
    //     ajaxtable(url, form, "POST", "", funcSuccess, funcError);
    // }
</script>
