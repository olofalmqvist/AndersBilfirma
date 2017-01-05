<?php
function set_comments($user_id, $text) {  
    $email = mysql_result(mysql_query("SELECT email FROM users WHERE user_id = '$user_id'"), 0);
    $date = date("G:i d/m/Y");
    sanitize($comment); sanitize(user_id); sanitize(date);    
    mysql_query("INSERT INTO posts (user_id, email, text, date) VALUES ('$user_id', '$email', '$text', '$date')") or die(mysql_error());
}

function get_comments() {
    $result = mysql_query("SELECT * FROM posts ORDER BY comment_id DESC");
    while ($row = mysql_fetch_assoc($result)) {
        echo '<div class="comment_box">
              <p class="comment_name">' . $row['email'] . '</p>
              <p class="comment_time">' . $row['date'] . '</p>
              <p class="comment_text">' . $row['text'] . '</p>
              </div>';
}   }

?>