<?php
function get_categories() {
    global $link;
    $sql = "SELECT * FROM `categories`";

    $result = mysqli_query($link, $sql);

    $categories = mysqli_fetch_all($result, true);

    return $categories;
};

function get_posts() {
    global $link;

    $sql = "SELECT * FROM `posts`";

    $result = mysqli_query($link, $sql);

    $posts = mysqli_fetch_all($result, true);

    return $posts;
}

function get_posts_limit($limit, $offset) {
    global $link;

    $sql = "SELECT * FROM `posts` LIMIT $limit OFFSET $offset";

    $result = mysqli_query($link, $sql);

    $posts = mysqli_fetch_all($result, true);

    return $posts;
}

function get_post_by_id($post_id) {
    global $link;

    $sql = "SELECT * FROM `posts` WHERE id = $post_id";

    $result = mysqli_query($link, $sql);

    $post = mysqli_fetch_assoc($result);

    return $post;
}

function generate_code($lenght = 8) {
    $code = '';
    $chars = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASADFGHJKLZXCVBNM1234567890';
    $num_chars = strlen($chars);
    
    for($i = 0; $i < $lenght; $i++) {
        $from = rand(0, $num_chars);
        $char = substr($chars, $from, 1);
        $code .= $char;
    }
    
    return $code;
}

function insert_subscriber($email) {
    global $link;
    
    $email = mysqli_real_escape_string($link, $email);

    $query = "SELECT * FROM `subscribers` WHERE `email` = '$email'";

    $result = mysqli_query($link, $query);

    if (!mysqli_num_rows($result)) {
        $code = generate_code();

        $insert_query = "INSERT INTO `subscribers` (`email`, `code`) VALUES ('$email', '$code')";

        $result = mysqli_query($link, $insert_query);
        
        if ($result) {
            return 'created';
        }
        else {
            return 'fail';
        }
    }
    else {
        return 'exist';
    }
}

function getPostsByCategory($category_id) {

    global $link;

   $category_id = mysqli_real_escape_string($link, $category_id);

   $sql = "SELECT * FROM `posts` WHERE `category_id` = '$category_id'";

   $result = mysqli_query($link, $sql);

   $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

   return $posts;

}

function signup($name, $email, $password) {
    if (!$name || !$email || !$password) {
        return 'Вы ввели не все данные';
    }

    global $link;

    $result = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email'");
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
        return 'Этот пользователь уже существует';
    }
    else {
        $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')";
        $result = mysqli_query($link, $sql);
        
        if ($result) {
            return 'Спасибо за регистрацию!';
        }
        else {
            return 'Ошибка базы данных';
        }
    }

}

function signin($email, $password) {
    global $link;

    $result = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $id = $user['id'];
        setcookie("id", $id, time() + 3600);
        header('Location: /');
        exit();
    }
    else {
        return "Неверный email/пароль";
    }
}

function posts_count() {
    global $link;

    $result = mysqli_query($link, "SELECT COUNT(*) AS 'count' FROM `posts`");
    $count = mysqli_fetch_assoc($result)['count'];

    return $count;
}

function get_users() {
    global $link;

    $result = mysqli_query($link, "SELECT * FROM `users`");
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $users; 
}

function get_user($id) {
    global $link;
    
    $result = mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '$id'");
    $user = mysqli_fetch_assoc($result);

    return $user;
}

function get_wall($id) {
    global $link;

    $sql = "SELECT `wall`.*, `users`.`name` 
        FROM `wall` 
        LEFT JOIN `users` 
        ON `users`.`id` = `wall`.`user_from`
        WHERE `wall`.`user_to` = '$id'
        ORDER BY `id` DESC";
    $result = mysqli_query($link, $sql);
    $wall = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $wall;
}

function wall_post($user_from, $user_to, $text) {
    global $link;

    $date = time();
    $result = mysqli_query($link, "INSERT INTO `wall` (`user_from`,`user_to`,`text`, `date`) VALUES ('$user_from', '$user_to', '$text', '$date') ");

    if ($result) {
        return 'Пост добавлен';
    }
    else {
        return 'Пост не был добавлен';
    }
}

function edit_user($id, $password, $country, $city, $birthday) {
    global $link;

    $pass = ($password ? "`password` = '$password'," : '');
    $result = mysqli_query($link, "UPDATE `users` SET $pass `country` = '$country', `city` = '$city', `birthday` = '$birthday'  WHERE `id` = '$id'");
    
    if ($result) {
        return 'Изменения сохранены';
    }
    else {
        return 'Ошибка базы данных';
    }
}