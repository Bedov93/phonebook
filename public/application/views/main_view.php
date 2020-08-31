<html lang="en">

<head>

    <meta charset="utf-8">

    <title><?= $title ?></title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="/css/app.css?v=<?= time() ?>">
</head>

<body>
<nav class="navbar navbar-expand-xl navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav mr-auto">

    </ul>

    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <strong><?= $_SESSION['login']?></strong>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a href="/logout" class="dropdown-item">
                    Logout
                </a>
            </div>
        </li>
    </ul>
    </div>
</nav>
<div class="container-xl">
    <div class="table-wrapper">
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editEmployeeModalForm">
                <div class="modal-header">
                    <h4 class="modal-title">Add Contact</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <input type="hidden" id="action">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" required name="first_name" id="first_name">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" required name="last_name" id="last_name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" required name="phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label>Phone Text</label>
                        <div id="phone_text"></div>
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <input id="photo" type="file" class="form-control" name="photo" onchange="fileValidate(this.value);">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script src="js/app.js"></script>

</body>

</html>


