<?php
//index.php

?>
<!DOCTYPE html>
<html>

<head>
    <title>Comment System using PHP and Ajax</title>
    <script src="js/jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/sty.css">
</head>

<body>
    <div class="heading" style="background: url('images/abg3.gif'); background-repeat: no-repeat;
    background-position: center;">
    <h3>评论</h3>
    <p><a href="menu.php">返回</a> <span> / 评论</span></p>
</div>
<div class="container">
    <form method="POST" id="comment_form">
        <div class="form-group">
            <input type="text" name="comment_name" id="comment_name" class="form-control box" placeholder="输入名称" />
        </div>
        <div class="form-group">
            <textarea name="comment_content" id="comment_content" class="form-control box" placeholder="输入评论" rows="5"></textarea>
        </div>
        <div class="form-group" style="text-align: center;">
            <input type="hidden" name="comment_id" id="comment_id" value="0" />
            <input type="submit" name="submit" id="submit" class="btn btn-info" value="发布" />
        </div>
    </form>
    <span id="comment_message"></span>
    <br />
    <div id="display_comment"></div>
</div>
</body>

</html>
<!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const backButton = document.querySelector(".heading a[href='home.php']");
        backButton.addEventListener("click", function(event) {
            event.preventDefault(); // 防止链接的默认行为
            history.go(-1); // 返回上一个页面
        });
    });
</script> -->
<script>
    $(document).ready(function() {

        $('#comment_form').on('submit', function(event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "add_comment.php",
                method: "POST",
                data: form_data,
                dataType: "JSON",
                success: function(data) {
                    if (data.error != '') {
                        $('#comment_form')[0].reset();
                        $('#comment_message').html(data.error);
                        $('#comment_id').val('0');
                        load_comment();
                    }
                }
            })
        });

        load_comment();

        function load_comment() {
            $.ajax({
                url: "fetch_comment.php",
                method: "POST",
                success: function(data) {
                    $('#display_comment').html(data);
                }
            })
        }

        $(document).on('click', '.reply', function() {
            var comment_id = $(this).attr("id");
            $('#comment_id').val(comment_id);
            $('#comment_name').focus();
        });

    });
</script>