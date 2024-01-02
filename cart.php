<?php

include 'components/connect.php';

// 开启session
session_start();

// 判断用户是否登录
if(isset($_SESSION['user_id'])){

   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
   echo '<script>alert("请先登录！");</script>';
   header('location:home.php');
   exit;
};

// 判断是否点击删除按钮
if(isset($_POST['delete'])){
   $cart_id = $_POST['cart_id'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$cart_id]);
   $message[] = '已删除!';
}

// 判断是否点击清空购物车按钮
if(isset($_POST['delete_all'])){
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $delete_cart_item->execute([$user_id]);
   // header('location:cart.php');
   $message[] = '已删除全部!';
}

// 判断是否点击更新购物车数量按钮
if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = '成功改变数量';
}

// 计算购物车总价格
$grand_total = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>购物车</title>

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
   <h3>购物车</h3>
   <p><a href="home.php">首页</a> <span> / 购物车</span></p>
</div>

<!-- shopping cart section starts  -->

<section class="products">

   <h1 class="title">你的购物车</h1>

   <div class="box-container">

      <?php
         $grand_total = 0;
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
         $select_cart->execute([$user_id]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-times" name="delete" onclick="return confirm('delete this item?');"></button>
         <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
         <div class="name"><?= $fetch_cart['name']; ?></div>
         <div class="flex">
            <div class="price"><span>¥</span><?= $fetch_cart['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['quantity']; ?>" maxlength="2">
            <button type="submit" class="fas fa-edit" name="update_qty"></button>
         </div>
         <div class="sub-total"> 总计 : <span>¥<?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span> </div>
      </form>
      <?php
               $grand_total += $sub_total;
            }
         }else{
            echo '<p class="empty">空的购物车</p>';
         }
      ?>

   </div>

   <div class="cart-total">
      <p>购物车总计 : <span>¥<?= $grand_total; ?></span></p>
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>"  style="font-weight: bold;" >去结账</a>
   </div>

   <div class="more-btn">
      <form action="" method="post">
         <button type="submit" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" name="delete_all" onclick="return confirm('delete all from cart?');"  style="font-weight: bold;">删除全部</button>
      </form>
      <a href="menu.php" class="btn"  style="font-weight: bold;">继续购物</a>
   </div>

</section>

<!-- shopping cart section ends -->










<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->








<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>