<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
   header('location:home.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>订单</title>

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
      <h3>订单</h3>
      <p><a href="home.php">首页</a> <span> / 订单</span></p>
   </div>

   <section class="orders">

      <h1 class="title">你的订单</h1>

      <div class="box-container">

         <?php
         if ($user_id == '') {
            echo '<p class="empty">登录后查看订单</p>';
         } else {
            $select_orders = $conn->prepare("SELECT * FROM `orders` WHERE user_id = ?");
            $select_orders->execute([$user_id]);
            if ($select_orders->rowCount() > 0) {
               while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
         ?>
                  <div class="box">
                     <p>下单日期: <span><?= $fetch_orders['placed_on']; ?></span></p>
                     <p>名称: <span><?= $fetch_orders['name']; ?></span></p>
                     <p>邮箱: <span><?= $fetch_orders['email']; ?></span></p>
                     <p>电话号码: <span><?= $fetch_orders['number']; ?></span></p>
                     <p>地址: <span><?= $fetch_orders['address']; ?></span></p>
                     <p>支付方式: <span><?= $fetch_orders['method']; ?></span></p>
                     <p>下的订单: <span><?= $fetch_orders['total_products']; ?></span></p>
                     <p>总计: <span>$<?= $fetch_orders['total_price']; ?>/-</span></p>
                     <p> 订单状态: <span style="color:<?php if ($fetch_orders['payment_status'] == '待定') {
                                                                  echo 'red';
                                                               } else {
                                                                  echo 'green';
                                                               }; ?>"><?= $fetch_orders['payment_status']; ?></span> </p>
                  </div>
         <?php
               }
            } else {
               echo '<p class="empty">还没有被下单的订单!</p>';
            }
         }
         ?>

      </div>

   </section>










   <!-- footer section starts  -->
   <?php include 'components/footer.php'; ?>
   <!-- footer section ends -->






   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>