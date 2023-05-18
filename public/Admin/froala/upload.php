<?php

// Allowed extentions.
$allowedExts = ['gif', 'jpeg', 'jpg', 'png', 'JPG', 'PNG', 'JPEG', 'GIF'];

// Get filename.
$temp = explode('.', $_FILES['file']['name']);

// Get extension.
$extension = end($temp);

// An image check is being done in the editor but it is best to
// check that again on the server side.
// Do not use $_FILES["file"]["type"] as it can be easily forged.
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES['file']['tmp_name']);

if ((($mime == 'image/gif')
|| ($mime == 'image/jpeg')
|| ($mime == 'image/jpg')
|| ($mime == 'image/pjpeg')
|| ($mime == 'image/x-png')
|| ($mime == 'image/JPG')
|| ($mime == 'image/PNG')
|| ($mime == 'image/JPEG')
|| ($mime == 'image/GIF')
|| ($mime == 'image/png'))
&& in_array($extension, $allowedExts)) {
    // Generate new random name.
    $rand = rand(10, 100);
    $name = time().$rand.'.'.$extension;

    // Save file in the uploads folder.
    move_uploaded_file($_FILES['file']['tmp_name'], public_path('images').'/img/'.$name);

    // Generate response.
    $response = new StdClass;
    $response->link = $url = public_path('images').'/img/'.$name;
    echo stripslashes(json_encode($response));
}
