<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "crud";
error_reporting(E_ERROR | E_PARSE);

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['title']) && isset($_POST['description'])) {
        // Insert new note
        $title = $_POST['title'];
        $description = $_POST['description'];

        $sql = "INSERT INTO `notes` (`notes`, `description`, `date`) VALUES (?, ?, current_timestamp())";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $title, $description);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } elseif (isset($_POST['titleedit']) && isset($_POST['descriptionedit']) && isset($_POST['slno'])) {
        // Update existing note
        $titleedit = $_POST['titleedit'];
        $descriptionedit = $_POST['descriptionedit'];
        $slno = $_POST['slno'];

        $sql = "UPDATE `notes` SET `notes` = ?, `description` = ? WHERE `slno` = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssi", $titleedit, $descriptionedit, $slno);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

// Fetch all notes for display
$select = "SELECT * FROM `notes`";
$view = mysqli_query($conn, $select);
$num = mysqli_num_rows($view);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
</head>
<body>
    <!-- Edit Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Record</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="http://localhost/prep/crud.php" method="post">
                        <input type="hidden" name="slno" id="slno">
                        <div class="mb-4">
                            <label for="titleedit" class="form-label">Edit title</label>
                            <input type="text" class="form-control" name="titleedit" id="titleedit">
                        </div>
                        <div class="mb-3">
                            <label for="descriptionedit" class="form-label">Edit Description</label>
                            <input type="text" class="form-control" name="descriptionedit" id="descriptionedit">
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Notes</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        <form action="http://localhost/prep/crud.php" method="post">
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label">Add title</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sl No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($num > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($view)) {
                        echo "<tr>
                            <th scope='row'>$no</th>
                            <td>" . $row['notes'] . "</td>
                            <td>" . $row['description'] . "</td>
                            <td>" . $row['date'] . "</td>
                            <td>
                                <button type='button' class='btn btn-secondary edit' data-id='" . $row['slno'] . "' data-title='" . $row['notes'] . "' data-description='" . $row['description'] . "'>Edit</button>
                                <a class='btn btn-danger delete' href='?delete=" . $row['slno'] . "'>Delete</a>
                            </td>
                        </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='5'>No notes found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

            $('.edit').on('click', function() {
                var slno = $(this).data('id');
                var title = $(this).data('title');
                var description = $(this).data('description');

                $('#slno').val(slno);
                $('#titleedit').val(title);
                $('#descriptionedit').val(description);
                $('#editmodal').modal('show');
            });
        });
    </script>
</body>
</html>