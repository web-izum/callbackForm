<?php
include_once('model/dbAdd.php');
include_once('model/sendMail.php');

$method = $_SERVER['REQUEST_METHOD'];
$fields =
[
    'name'          => '',
    'email'         => '',
    'country'       => '',
    'phone'         => '',
    'company'       => '',
    'site'          => '',
    'msg'           => ''
];

if($_SERVER['REQUEST_METHOD'] === 'POST') :

    $fields['name'] = trim($_POST['name']);
    $fields['email'] = trim($_POST['email']);
    $fields['country'] = trim($_POST['country']);
    $fields['phone'] = trim($_POST['phone']);
    $fields['site'] = trim($_POST['site']);
    $fields['msg'] = trim($_POST['msg']);



    if ($fields['name'] != '' && $fields['email'] && $fields['country'] != '' && $fields['phone'] !== '') :

        // add DB
        dbAdd($fields);

        // send email
        $project_name = trim($_POST["project_name"]);
        $form_subject = trim($_POST["form_subject"]);
        $admin_email = $fields['country'] == 'Другое' ? 'mahoney.dv@gmail.com' : 'igonin.anatolii@gmail.com';

        sendMail($fields, $admin_email,$project_name, $form_subject);
    endif;
endif;


