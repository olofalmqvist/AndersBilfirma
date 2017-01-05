<?php
function protect_page() {
    if (logged_in() === false) {
        echo '<script type="text/javascript">window.location = "protected.php"</script>';
        exit();
    }
}

function array_sanitize(&$item) {
    $item = mysql_real_escape_string($item);
}

function sanitize($data) {
    return mysql_real_escape_string($data);
}

function output_errors($errors) {
    if($errors) {
        return 'Error:<br>' . implode('<br>', $errors);
    }
}
?>