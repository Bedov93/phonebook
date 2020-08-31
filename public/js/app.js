function fileValidate(file) {
    var ext = file.split(".");
    ext = ext[ext.length-1].toLowerCase();
    var arrayExtensions = ["jpg" ,"png"];

    if (arrayExtensions.lastIndexOf(ext) == -1) {
        alert("Wrong extension type, mast be jpg or png");
        $("#photo").val("");
    }
}
$(document).ready(function () {

    var table = $('#example').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "/contacts",
        columns: [
            {data: 'id', searchable: false},
            {data: 'photo', searchable: false, orderable: false},
            {data: 'first_name'},
            {data: 'last_name'},
            {data: 'email'},
            {data: 'phone'},
            {data: null, orderable: false}
        ],
        columnDefs: [
            {
                targets: 1,
                render: function (data, type, full, meta) {
                    if (data)
                        return '<img src="' + data + '" width="80px" height="80px">'
                    else
                        return '<img src="images/no.png" width="80px" height="80px">'
                }
            },
            {
                targets: -1,
                render: function (data, type, full, meta) {
                    return '' +
                        '<a href="#" data-id="' + full.id + '" class="edit" style="color: #FFC107">' +
                        '<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>' +
                        '</a>' +
                        '<a href="#" data-id="' + full.id + '" class="delete"  style="color:#F44336">' +
                        '<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>' +
                        '</a>';
                }
            }
        ],
        order: [[0, 'DESC']]
    });

    $(document).on('click', '.delete', function () {
        var id = $(this).data("id");
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                url: "contacts-delete",
                method: "POST",
                dataType: "json",
                data: {id: id},
                success: function (data) {
                    if (data.result) {
                        table.ajax.reload();
                    }
                }
            });
        } else {
            return false;
        }
    });

    $(document).on('click', '.edit', function () {
        var id = $(this).data("id");

        $("#phone").unmask();

        $.ajax({
            url: "contact",
            method: "POST",
            data: {id: id},
            dataType: "json",
            success: function (data) {
                $('.modal-title').text('Edit Contact');
                $('#id').val(data.id);
                $('#action').val("edit");
                $('#first_name').val(data.first_name);
                $('#last_name').val(data.last_name);
                $('#email').val(data.email);
                $('#phone').val(data.phone);
                $("#phone").mask("+ (999) 999 999 9999");
                $('#phone_text').text(data.phone_text);
                $('#photo').val(null);
                $('#editEmployeeModal').modal('show');
            }
        })
    });



    $('#editEmployeeModalForm').submit(function (e) {
        e.preventDefault();
        form = new FormData(this);
        form.append('id',$("#id").val());
        $.ajax({
            url: "contact-update",
            method: "POST",
            data: form,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (data) {
                if(data.errors) {
                    alert(JSON.stringify(data.errors));
                }

                if(data.result) {
                    $('#example').DataTable().ajax.reload(null, false);
                    $('#editEmployeeModal').modal('hide');
                }
            }
        })
    });
});