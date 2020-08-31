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
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Add',
                className: 'btn btn-success',
                action: function ( e, dt, node, config ) {
                    $('#createContactModal .modal-title').text('Create Contact');
                    $('#createContactModal #first_name').val("");
                    $('#createContactModal #last_name').val("");
                    $('#createContactModal #email').val("");
                    $('#createContactModal #phone').val("");
                    $("#createContactModal #phone").mask("+ (999) 999 999 9999");
                    $('#createContactModal #phone_text').text("");
                    $('#createContactModal #photo').val(null);
                    $('#createContactModal').modal('show');
                }
            }
        ],
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
                $('#editContactModal .modal-title').text('Edit Contact');
                $('#editContactModal #id').val(data.id);
                $('#editContactModal #action').val("edit");
                $('#editContactModal #first_name').val(data.first_name);
                $('#editContactModal #last_name').val(data.last_name);
                $('#editContactModal #email').val(data.email);
                $('#editContactModal #phone').val(data.phone);
                $("#editContactModal #phone").mask("+ (999) 999 999 9999");
                $('#editContactModal #phone_text').text(data.phone_text);
                $('#editContactModal #photo').val(null);
                $('#editContactModal').modal('show');
            }
        })
    });



    $('#editContactModalForm').submit(function (e) {
        e.preventDefault();
        form = new FormData(this);
        form.append('id',$("#editContactModalForm #id").val());
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
                    $('#editContactModal').modal('hide');
                }
            }
        })
    });

    $('#createContactModalForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "contact-create",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (data) {
                if(data.errors) {
                    alert(JSON.stringify(data.errors));
                }

                if(data.result) {
                    $('#example').DataTable().ajax.reload();
                    $('#createContactModal').modal('hide');
                }
            }
        })
    });
});