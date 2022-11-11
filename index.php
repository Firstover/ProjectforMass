<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mass</title>

    <script src="jquery.js"></script>
    <script>
        $(document).ready(function()
                        {
            $("#fetchval").on('change',function()
                            {
                var keyword = $(this).val();
                $.ajax(
                {
                    url:'fetch.php',
                    type:'POST',
                    data:'request='+keyword,
                    success:function(data)
                    {
                        $("#table-container").html(data);
                    },
                });
            });
        });
        
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

    <body>
    <br>
    <h1 style="padding-left:3%;">Project Mass</h1><br><div class="row">
    <div class="col" style="margin-left:2%;">
      <input type="text" class="form-control" placeholder="Search" id="myInput" onkeyup="myFunction()">
    </div>
    <div class="col" style="">
    <a href="newproduct.php" class="btn btn-primary">Add New Product</a>
    </div>
    <div class="col">
    <div style="margin-right:7%;margin-left:50%;">
    <select class="form-control" id="fetchval" name="fetchby" >
        <option value="" disabled="" selected="">Select Type</option>
        <option value="smartphone">Smartphone</option>
        <option value="furniture">Furniture</option>
        <option value="laptop">Laptop</option>
    </select>
    </div>
    </div>
    </div>
  </div>
    <div id="table-container">
    <?php
    $conn = mysqli_connect('localhost','root','','storage');
    $query="select * from product";
    $output=mysqli_query($conn,$query);
    echo '<div style="padding:1%;">';
    echo '<table class="table table-hover" id="myTable">';
        echo '<tr>
        <thead>
        <th scope="col">Product ID</th>
        <th scope="col">Name</th>
        <th scope="col">Information</th>
        <th scope="col">Price</th>
        <th scope="col">Amount</th>
        <th scope="col">Action</th>
        <thead>
        </tr>';
    while($fetch = mysqli_fetch_assoc($output))
    {
        echo '<tbody>';
        echo '<tr>';
        echo '<th scope="row">'.$fetch['product_id'].'</td>';
        echo '<td>'.$fetch['name'].'</td>';
        echo '<td>'.$fetch['information'].'</td>';
        echo '<td>'.$fetch['price'].'</td>';
        echo '<td>'.$fetch['amount'].'</td>';
        echo '<td>
        <a class="btn btn-primary" href="edit.php?product_id='.$fetch['product_id'].'" style="color:white;">Edit</a>
        <a class="btn btn-danger" href="delete.php?product_id='.$fetch['product_id'].'" style="color:white;">Delete</a>
        </td>';
        echo '</tr>';
        echo '</tbody>';
        
    };
    echo '</table>';
    echo '</div>';
    ?>

    </div>


    <script src="js/bootstrap.min.js"></script>
    <script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
  </body>
</html>