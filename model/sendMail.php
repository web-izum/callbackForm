<?php
function sendMail( array $fields, string $admin_email, string $project_name, string $form_subject) {

    foreach ($fields as $key => $value) :
        $message .= "
        <tr>
          <td style='padding: 10px; border: #e2dddd 1px solid;'><b>$key</b></td>
          <td style='padding: 10px; border: #e2dddd 1px solid;'>$value</td>
        </tr>
        ";
    endforeach;
    $message = "<table style='width: 100%;'>$message</table>";

    function adopt($text)
    {
        return '=?UTF-8?B?' . Base64_encode($text) . '?=';
    }

    $headers = "MIME-Version: 1.0" . PHP_EOL .
        "Content-Type: text/html; charset=utf-8" . PHP_EOL .
        'From: ' . adopt($project_name) . ' <' . $fields['email'] . '>' . PHP_EOL .
        'Reply-To: ' . $fields['email'] . '' . PHP_EOL;

    mail($admin_email, adopt($form_subject), $message, $headers);
}