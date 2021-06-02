<?php require_once 'inc/header.php'; 

    $conn = mysqli_connect("localhost","root","","product_management2");
    if(!$conn){
        die("econnection Error : ". mysqli_connect_error());
    }

    $sql = "SELECT * FROM categories ";
    $result = mysqli_query($conn,$sql);
?>     

    <div class="jumbotron p-2 m-4">
        <h3 class=""> 
            <a class="btn btn-success btn-lg" href="#" role="button">Add New Category </a>
        </h3>
    </div>
    <h1 class=" p-3 border display-4">  All Categories  </h1>

    <div class="container">
        <div class="row">
            <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                <?php while($row = mysqli_fetch_array($result)):  ?>
                    <tr>
                        <th scope="row"><?php echo $i; $i++;  ?></th>
                        <td> <?= $row['name']; ?> </td>
                        <td>
                            <a href="#" class="btn btn-info">Edit <i class="bi bi-pencil-square"></i></a>
                            <a href="handelers/delete.php?id=<?= $row['id']; ?>" class="btn btn-danger">Delete <i class="bi bi-x-square-fill"></i></a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                   
                </tbody>
                </table>

               
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

<?php require_once 'inc/footer.php'; ?>     




