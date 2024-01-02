<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/sty.css">
<!-- 

<div class="heading" style="background: url('images/abg3.gif'); background-repeat: no-repeat;
    background-position: center;">
    <h3>评论</h3>
    <p><a href="home.php">返回</a> <span> / 评论</span></p>
</div>
<div class="container">
    <form method="POST" id="comment_form">
        <div class="form-group">
            <input type="text" name="comment_name" id="comment_name" class="form-control box" placeholder="Enter Name" />
        </div>
        <div class="form-group">
            <textarea name="comment_content" id="comment_content" class="form-control box" placeholder="Enter Comment" rows="5"></textarea>
        </div>
        <div class="form-group" style="text-align: center;">
            <input type="hidden" name="comment_id" id="comment_id" value="0" />
            <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
        </div>
    </form>
    <span id="comment_message"></span>
    <br />
    <div id="display_comment"></div>
</div> -->

<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=food_db', 'root', '');
$limit = 3; // 每页显示的评论数量
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// 获取当前页码

$offset = ($page - 1) * $limit;


// 查询总评论数量
$total_query = "SELECT COUNT(*) as total FROM tbl_comment WHERE parent_comment_id = '0'";
$total_statement = $connect->prepare($total_query);
$total_statement->execute();
$total_result = $total_statement->fetch(PDO::FETCH_ASSOC);
$total_pages = ceil($total_result['total'] / $limit);
// 输出调试信息

$query = "
SELECT * FROM tbl_comment 
WHERE parent_comment_id = '0' 
ORDER BY comment_id DESC
LIMIT $limit OFFSET $offset
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach ($result as $row) {
    $output .= '
    <div class="panel panel-default box">
    <div class="panel-heading">By <b>' . $row["comment_sender_name"] . '</b> on <i>' . $row["date"] . '</i></div>
    <div class="panel-body">' . $row["comment"] . '</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="' . $row["comment_id"] . '">回复</button></div>
    </div>
    ';
    $output .= get_reply_comment($connect, $row["comment_id"]);
}

echo $output;

// 显示分页链接
echo '<ul class="pagination">';
for ($i = 1; $i <= $total_pages; $i++) {
    $activeClass = ($i == $page) ? 'active' : '';
    echo "<li class='page-item $activeClass'><a class='page-link' href='fetch_comment.php?page=$i'>$i</a></li>";
}
echo "<li class='page-item'><a class='page-link' href='submit-comment.php'>评论</a></li>";
echo '</ul>';
function get_reply_comment($connect, $parent_id = 0, $marginleft = 0)
{
    $query = "
 SELECT * FROM tbl_comment WHERE parent_comment_id = '" . $parent_id . "'
    ";
    $output = '';
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $count = $statement->rowCount();
    if ($parent_id == 0) {
        $marginleft = 0;
    } else {
        $marginleft = $marginleft + 48;
    }
    if ($count > 0) {
        foreach ($result as $row) {
            $output .= '
    <div class="panel panel-default" style="margin-left:' . $marginleft . 'px">
    <div class="panel-heading">By <b>' . $row["comment_sender_name"] . '</b> on <i>' . $row["date"] . '</i></div>
    <div class="panel-body">' . $row["comment"] . '</div>
    <div class="panel-footer" align="right"><button type="button" class="btn btn-default reply" id="' . $row["comment_id"] . '">Reply</button></div>
    </div>
    ';
            $output .= get_reply_comment($connect, $row["comment_id"], $marginleft);
        }
    }
    return $output;
}



?>