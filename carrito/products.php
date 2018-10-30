<?php 
    require("includes/connections.php"); 
?>

<?php 
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else{ 
              
            $sql_s ="SELECT * FROM products 
                     WHERE id_product={$id}"; 

            $results = mysqli_query($conexion, $sql_s);   

            if(mysqli_num_rows($results) != 0){ 
                $row_s=mysqli_fetch_assoc($results); 
                  
                $_SESSION['cart'][$row_s['id_product']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['price'] 
                    ); 
               
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 
  
?> 

<h1>Product List</h1> 
<table> 
    <tr> 
        <th>Name</th> 
        <th>Description</th> 
        <th>Price</th> 
        <th>Action</th> 
    </tr> 
    <?php 

    $sql="SELECT * FROM products ORDER BY name ASC"; 

    $results = mysqli_query($conexion, $sql);

    while ($row=mysqli_fetch_assoc($results)) { 

        ?> 
        <tr> 
            <td><?php echo $row['name'] ?></td> 
            <td><?php echo $row['description'] ?></td> 
            <td><?php echo $row['price'] ?>$</td> 
            <td><a href="index.php?page=products&action=add&id=<?php echo $row['id_product'] ?>">Add to cart</a></td> 
        </tr> 
        <?php 

    } 

    ?>
</table>