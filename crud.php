<?php
$servername="localhost";
$username="root";
$password="";
$database="crud";
error_reporting(E_ERROR | E_PARSE);

if($_SERVER['REQUEST_METHOD'] =='POST'){
  $title=$_POST['title'];
  $description=$_POST['description'];  
  
 $conn=mysqli_connect($servername,$username,$password,$database);
$sql="INSERT INTO `notes` (`slno`, `notes`, `description`, `date`) VALUES (NULL, '$title', '$description', current_timestamp())";
$data=mysqli_query($conn,$sql);

///for displaying data
$select="SELECT * FROM `notes`";
$view=mysqli_query($conn,$select);
$num= mysqli_num_rows($view);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css" >
<meta charset="UTF-8">,
<title>Document</title>

</head>
<body>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editmodal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="http://localhost/prep/crud.php?#" method="post">
  <div class="mb-4">
    <label for="exampleInputEmail1" class="form-label">Add title</label>
    <input type="text" class="form-control" name="titleedit" id="titleedit" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">add your title here</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <input type="textarea" class="form-control" name="descriptionedit" id="descriptionedit">
  </div>
  
  <button type="submit" class="btn btn-primary">add note</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    </div>
    <div class="container">
    <form action="http://localhost/prep/crud.php?#" method="post">
  <div class="mb-4">
    <label for="exampleInputEmail1" class="form-label">Add title</label>
    <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">add your title here</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Description</label>
    <input type="textarea" class="form-control" name="description" id="exampleInputPassword1">
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
                    <th scope="col">Date </th>
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
                            <td>" . $row['date'] .'<button type="button"  class="btn btn-secondary edit">edit</button>'.'<a class="delete" href="">delete</a>'."</td>
                        </tr>";
                        $no++;
                    }
                } else {
                    echo "<tr><td colspan='4'>No notes found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
edits=document.getElementsByClassName('edit');
Array.from(edits).forEach((element)=>{
  element.addEventListener("click",(e)=>{
    console.log("edit",);
    tr=e.target.parentNode.parentNode;
    title=tr.getElementsByTagName("td")[0].innerText;
    description=tr.getElementsByTagName("td")[1].innerText;
    console.log(title,description);
    titleedit.value=title;
    descriptionedit.value=description;
    $('#editmodal').modal('toggle');

  })

})
</script>
</body>
</html>


