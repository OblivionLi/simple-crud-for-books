<?php

function url_for($string_path)
{
    if ($string_path[0] != '/') {
        $string_path = "/" . $string_path;
    }
    return WWW_ROOT . $string_path;
}

function u($string = "")
{
    return urlencode($string);
}

function raw_u($string = "")
{
    return rawurlencode($string);
}

function h($string = "")
{
    return htmlspecialchars($string);
}

function redirect_to($location)
{
    header("Location: " . $location);
}

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == "POST";
}

function is_get_request()
{
    return $_SERVER['REQUEST_METHOD'] == "GET";
}

function display_errors($errors = array())
{
    $output = '';

    if (!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

function display_session_message()
{
    global $session;
    $msg = $session->message();
    if (isset($msg) && $msg != '') {
        $session->clear_message();
        return '<div id="message" class="shadow-sm p-3 mb-5 bg-white rounded">' . h($msg) . '</div>';
    }
}