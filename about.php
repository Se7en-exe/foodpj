<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>关于我们</title>

   <link rel="stylesheet" href="css/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <!-- <link rel="stylesheet" href="css/all.min.css"> -->

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <!-- header section starts  -->
   <?php include 'components/user_header.php'; ?>
   <!-- header section ends -->

   <div class="heading" style="background: url('images/abg3.gif'); background-repeat: no-repeat;
   background-position: center;">
      <h3>关于我们</h3>
      <p><a href="home.php">首页</a> <span> / 关于</span></p>
   </div>

   <!-- about section starts  -->

   <section class="about">

      <div class="row">

         <div class="image">
            <img src="images/about-img.svg" alt="">
         </div>

         <div class="content">
            <h3>为何选择我们?</h3>
            <p>1.精心准备的外送菜单：我们精心设计了丰富多样的外送菜单，包括美味的主食、开胃菜、甜点和饮料，以满足您不同的口味需求。<br>

               2.高品质食材和健康饮食：我们注重使用新鲜、优质的食材，并提倡健康饮食理念，确保每一道菜品都是新鲜、美味且营养均衡的。<br>

               3.快捷可靠的外送服务：我们致力于提供高效、快捷的外送服务，您可以在家或办公室轻松享用到热腾腾的美食，无需外出。<br>

               4.专业的包装和配送：我们的外送菜品都经过精心包装，保证食品新鲜度和安全送达。我们的配送团队经过专业培训，确保订单及时送达。<br>

               5.专属优惠和奖励计划：我们定期推出独家优惠和奖励计划，让您享受实惠的外送美食，同时积累会员福利。</p>
            <a href="menu.php" class="btn">菜单</a>
         </div>

      </div>

   </section>

   <!-- about section ends -->

   <!-- steps section starts  -->

   <section class="steps">

      <h1 class="title">简简单单轻轻松松</h1>

      <div class="box-container">

         <div class="box">
            <img src="images/step-1.png" alt="">
            <h3>选择并下单</h3>
            <p>挑爽货，秒下单！</p>
         </div>

         <div class="box">
            <img src="images/step-2.png" alt="">
            <h3>配送员配送</h3>
            <p>快递小哥送货上门啦！</p>
         </div>

         <div class="box">
            <img src="images/step-3.png" alt="">
            <h3>享受美食</h3>
            <p>尽情品味美味佳肴!</p>
         </div>

      </div>

   </section>

   <!-- steps section ends -->

   <!-- reviews section starts  -->

   <section class="reviews">

      <h1 class="title">顾客评论</h1>

      <div class="swiper reviews-slider">

         <div class="swiper-wrapper">

            <div class="swiper-slide slide">
               <img src="images/pic-1.png" alt="">
               <p>这家饭店真是太棒了！菜色口味绝佳，服务态度亲切周到。用心布置的环境让人倍感舒适惬意，简直就是享受美食的绝佳去处。强烈推荐给所有喜欢美食的朋友们，一定不会让你失望的！</p>
               <div class="stars">
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
               </div>
               <h3>john deo</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-2.png" alt="">
               <p>这家饭店真是太棒了！菜色口味绝佳，服务态度亲切周到。用心布置的环境让人倍感舒适惬意，简直就是享受美食的绝佳去处。强烈推荐给所有喜欢美食的朋友们，一定不会让你失望的1！</p>
               <div class="stars">
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
               </div>
               <h3>john deo</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-3.png" alt="">
               <p>这家饭店真是太棒了！菜色口味绝佳，服务态度亲切周到。用心布置的环境让人倍感舒适惬意，简直就是享受美食的绝佳去处。强烈推荐给所有喜欢美食的朋友们，一定不会让你失望的！</p>
               <div class="stars">
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
               </div>
               <h3>john deo</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-4.png" alt="">
               <p>这家饭店真是太棒了！菜色口味绝佳，服务态度亲切周到。用心布置的环境让人倍感舒适惬意，简直就是享受美食的绝佳去处。强烈推荐给所有喜欢美食的朋友们，一定不会让你失望的！</p>
               <div class="stars">
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
               </div>
               <h3>john deo</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-5.png" alt="">
               <p>这家饭店真是太棒了！菜色口味绝佳，服务态度亲切周到。用心布置的环境让人倍感舒适惬意，简直就是享受美食的绝佳去处。强烈推荐给所有喜欢美食的朋友们，一定不会让你失望的！</p>
               <div class="stars">
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
               </div>
               <h3>john deo</h3>
            </div>

            <div class="swiper-slide slide">
               <img src="images/pic-6.png" alt="">
               <p>这家饭店真是太棒了！菜色口味绝佳，服务态度亲切周到。用心布置的环境让人倍感舒适惬意，简直就是享受美食的绝佳去处。强烈推荐给所有喜欢美食的朋友们，一定不会让你失望的！</p>
               <div class="stars">
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
                  <i class="fas ">★</i>
               </div>
               <h3>john deo</h3>
            </div>

         </div>

         <div class="swiper-pagination"></div>

      </div>

   </section>


   <!-- reviews section ends -->



















   <!-- footer section starts  -->
   <?php include 'components/footer.php'; ?>
   <!-- footer section ends -->=






   <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

   <!-- custom js file link  -->
   <script src="js/JQuery3.7.1.js"></script>
   <script src="js/script.js"></script>

   <script>
      var swiper = new Swiper(".reviews-slider", {
         loop: true,
         grabCursor: true,
         spaceBetween: 20,
         pagination: {
            el: ".swiper-pagination",
            clickable: true,
         },
         breakpoints: {
            0: {
               slidesPerView: 1,
            },
            700: {
               slidesPerView: 2,
            },
            1024: {
               slidesPerView: 3,
            },
         },
      });
   </script>

</body>

</html>