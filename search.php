<?php
include "header.php";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $category = $_POST['category'];
  $searchTerm = $_POST['search'];

  // Output the search query
  echo "Search Query: $searchTerm";

  // Perform your search logic here
  // ...



  include 'db.php';


  $product_query = "SELECT * FROM products WHERE  product_keywords LIKE '%$searchTerm%'";
  $run_query = mysqli_query($con, $product_query);
  if (mysqli_num_rows($run_query) > 0) {

    while ($row = mysqli_fetch_array($run_query)) {
      $pro_id = $row['product_id'];
      $pro_cat = $row['product_cat'];
      $pro_brand = $row['product_brand'];
      $pro_title = $row['product_title'];
      $pro_price = $row['product_price'];
      $pro_image = $row['product_image'];

      $cat_name = $row["cat_title"];

      echo "

      <div class='card-group'>
				<div class='card'>
             <div class='product'>
  <a href='product.php?p=$pro_id'>
    <div class='product-img'>
      <img src='product_images/$pro_image' style='max-height: 170px;' alt=''>
      <div class='product-label'>
        <span class='sale'>-30%</span>
        <span class='new'>NEW</span>
      </div>
    </div>
  </a>
  <div class='product-body'>
    <p class='product-category'>$cat_name</p>
    <h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
    <h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
    <div class='product-rating'>
      <i class='fa fa-star'></i>
      <i class='fa fa-star'></i>
      <i class='fa fa-star'></i>
      <i class='fa fa-star'></i>
      <i class='fa fa-star'></i>
    </div>
    <div class='product-btns'>
      <button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
      <button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
      <button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
    </div>
  </div>
  <div class='add-to-cart'>
    <button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist' href='#'><i class='fa fa-shopping-cart'></i> add to cart</button>
  </div>
</div>
<div>
   </div>
                    
			";
    }
    ;

  }
}
include "footer.php";
?>