<?php

// Allowed extentions.
$allowedExts = ['txt', 'flv', 'zip', 'rar', 'mp3', 'pdf', 'psd', 'doc', 'xls', 'ppt', 'pptx', 'docx', 'xlsx'];

// Get filename.*/
$temp = explode('.', $_FILES['file']['name']);

// Get extension.
$extension = end($temp);

// An image check is being done in the editor but it is best to
// check that again on the server side.
// Do not use $_FILES["file"]["type"] as it can be easily forged.
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mime = finfo_file($finfo, $_FILES['file']['tmp_name']);

if ((($mime == 'text/plain')
|| ($mime == 'video/x-flv')
|| ($mime == 'application/zip')
|| ($mime == 'application/x-rar-compressed')
|| ($mime == 'audio/mpeg')
|| ($mime == 'image/vnd.adobe.photoshop')
|| ($mime == 'application/msword')
|| ($mime == 'application/vnd.ms-excel')
|| ($mime == 'application/vnd.ms-powerpoint')
|| ($mime == 'application/vnd.ms-excel')
|| ($mime == 'application/vnd.openxmlformats-officedocument.presentationml.presentation')
|| ($mime == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
|| ($mime == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
|| ($mime == 'application/pdf'))
&& in_array($extension, $allowedExts)) {
    // Generate new random name.
    $rand = rand(10, 100);
    $name = time().$rand.'.'.$extension;

    // Save file in the uploads folder.
    move_uploaded_file($_FILES['file']['tmp_name'], '../../ups/files/'.$name);

    // Generate response.
    $response = new StdClass;
    $response->link = $url = 'http://alnaseem.ps/ups/files/'.$name;
    echo stripslashes(json_encode($response));
} else {
    echo 'not allowed';
}
