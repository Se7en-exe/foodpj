<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="css/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- <link rel="stylesheet" href="css/all.min.css"> -->

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body style="background: url('images/abg6.gif'); background-repeat: no-repeat;background-position: top;  ">

   <?php include 'components/user_header.php'; ?>



   <section class="hero">


      <div class="swiper hero-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <div class="content">
                  <span>点单！</span>
                  <h3 style="color: #eee;">披萨</h3>
                  <a href="menu.php" class="btn">查看菜单</a>
               </div>
               <div class="image">
                  <img src="images/home-img-1.png" alt="">
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="content">
                  <span>点单！</span>
                  <h3 style="color: #eee;">汉堡</h3>
                  <a href="menu.php" class="btn">查看菜单</a>
               </div>
               <div class="image">
                  <img src="images/home-img-2.png" alt="">
               </div>
            </div>

            <div class="swiper-slide slide">
               <div class="content">
                  <span>点单！</span>
                  <h3 style="color: #eee;">烧鸡</h3>
                  <a href="menu.php" class="btn">查看菜单</a>
               </div>
               <div class="image">
                  <img src="images/home-img-3.png" alt="">
               </div>
            </div>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>

   <section class="category">

      <h1 class="title" style="color:#eee">菜品分类</h1>

      <div class="box-container" >

         <a href="category.php?category=快餐" class="box" style="border-color: #fff;" >
            <img src="images/cat1.png" alt="">
            <h3 style="color: #fff;">快餐</h3>
         </a>

         <a href="category.php?category=主食" class="box" style="border-color: #fff;">
            <img src="images/cat2.png" alt="">
            <h3 style="color: #fff;">主食</h3>
         </a>

         <a href="category.php?category=饮品" class="box" style="border-color: #fff;">
            <img src="images/cat3.png" alt="">
            <h3 style="color: #fff;">饮品</h3>
         </a>

         <a href="category.php?category=点心" class="box" style="border-color: #fff;">
            <img src="images/cat4.png" alt="">
            <h3 style="color: #fff;">点心</h3>
         </a>

      </div>

   </section>




   <section class="products">

      <h1 class="title">最新单品</h1>

      <div class="box-container">

         <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
         $select_products->execute();
         if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <form action="" method="post" class="box">
                  <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
                  <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
                  <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
                  <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
                  <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
                  <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
                  <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
                  <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
                  <div class="name"><?= $fetch_products['name']; ?></div>
                  <div class="flex">
                     <div class="price"><span>¥</span><?= $fetch_products['price']; ?></div>
                     <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
                  </div>
               </form>
         <?php
            }
         } else {
            echo '<p class="empty">还未添加菜品!</p>';
         }
         ?>

      </div>

      <div class="more-btn">
         <a href="menu.php" class="btn">查看全部</a>
      </div>

   </section>


















   <?php include 'components/footer.php'; ?>


   <script src="./js/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

   <script>
      var swiper = new Swiper(".hero-slider", {
         loop: true,
         grabCursor: true,
         effect: "flip",
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
      });
   </script>

   <script>
      function checkLogin() {
         <?php
         if (isset($_SESSION['user_id'])) {
            echo "var user_id = " . $_SESSION['user_id'] . ";";
         } else {
            echo "var user_id = '';";
            echo 'alert("请先登录！");';
            echo 'window.location.href = "home.php";';
         }
         ?>
      }
   </script>









   <script src="js/JQuery3.7.1.js"></script>
</body>

</html>