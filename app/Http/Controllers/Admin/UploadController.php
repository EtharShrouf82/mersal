<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function rand()
    {
        return rand(0, 20);
    }

    public function uploadslider(Request $request)
    {
        $handle = new \Verot\Upload\Upload($_FILES['file']);
        if ($handle->uploaded) {
            $handle->process(public_path('images').'/slider/');
            if ($handle->processed) {
                return $handle->file_dst_name;
            } else {
                echo 'error : '.$handle->error;
            }
        }
    }

    public function uploadClient(Request $request)
    {
        $handle = new \Verot\Upload\Upload($_FILES['file']);
        if ($handle->uploaded) {
            $handle->process(public_path('images').'/clients/');
            if ($handle->processed) {
                return $handle->file_dst_name;
            } else {
                echo 'error : '.$handle->error;
            }
        }
    }

    public function uploadJob(Request $request)
    {
        $handle = new \Verot\Upload\Upload($_FILES['file']);
        if ($handle->uploaded) {
            $handle->process(public_path('images').'/jobs/');
            if ($handle->processed) {
                return $handle->file_dst_name;
            } else {
                echo 'error : '.$handle->error;
            }
        }
    }

    public function uploadService(Request $request)
    {
        $handle = new \Verot\Upload\Upload($_FILES['file']);
        if ($handle->uploaded) {
            $handle->process(public_path('images').'/services/');
            if ($handle->processed) {
                return $handle->file_dst_name;
            } else {
                echo 'error : '.$handle->error;
            }
        }
    }

    public function admin(Request $request)
    {
        $handle = new \Verot\Upload\Upload($_FILES['file']);
        if ($handle->uploaded) {
            $handle->image_resize = true;
            $handle->image_x = 60;
            $handle->image_ratio_y = 60;
            $handle->process(public_path('images').'/admin/');
            if ($handle->processed) {
                return $handle->file_dst_name;
            } else {
                echo 'error : '.$handle->error;
            }
        }
    }

    public function uploadProduct(Request $request)
    {
        $handle = new \Verot\Upload\Upload($_FILES['file']);
        if ($handle->uploaded) {
            $handle->image_resize = true;
            $handle->image_x = 646;
            $handle->image_ratio_y = 250;
            $handle->process(public_path('images').'/products/');
            if ($handle->processed) {
                return $handle->file_dst_name;
            } else {
                echo 'error : '.$handle->error;
            }
        }
    }

    public function uploadScreens(Request $request)
    {
        $files = [];
        foreach ($_FILES['file'] as $k => $l) {
            foreach ($l as $i => $v) {
                if (! array_key_exists($i, $files)) {
                    $files[$i] = [];
                }
                $files[$i][$k] = $v;
            }
        }

        $uploadedFiles = [];

        foreach ($files as $file) {
            $handle = new \Verot\Upload\Upload($file);
            if ($handle->uploaded) {
                $handle->file_new_name_body = 'multi';
                $handle->process(public_path('images').'/screens/');
                if ($handle->processed) {
                    array_push($uploadedFiles, $handle->file_dst_name);
                } else {
                    return 'error : '.$handle->error;
                }

            } else {
                return 'Error: Error Here Cn Do Any Things'.$handle->error;
            }
            unset($handle);
        }

        return $uploadedFiles;
    }
    public function uploadProducts(Request $request)
    {
        $files = [];
        foreach ($_FILES['file'] as $k => $l) {
            foreach ($l as $i => $v) {
                if (! array_key_exists($i, $files)) {
                    $files[$i] = [];
                }
                $files[$i][$k] = $v;
            }
        }

        $uploadedFiles = [];

        foreach ($files as $file) {
            $handle = new \Verot\Upload\Upload($file);
            if ($handle->uploaded) {
                $handle->file_new_name_body = 'multi';
                $handle->process(public_path('images').'/products/');
                if ($handle->processed) {
                    array_push($uploadedFiles, $handle->file_dst_name);
                } else {
                    return 'error : '.$handle->error;
                }

            } else {
                return 'Error: Error Here Cn Do Any Things'.$handle->error;
            }
            unset($handle);
        }

        return $uploadedFiles;
    }

    public function upload(Request $request)
    {
        $files = [];
        foreach ($_FILES['file'] as $k => $l) {
            foreach ($l as $i => $v) {
                if (! array_key_exists($i, $files)) {
                    $files[$i] = [];
                }
                $files[$i][$k] = $v;
            }
        }

        $uploadedFiles = [];

        foreach ($files as $file) {
            $handle = new \Verot\Upload\Upload($file);
            if ($handle->uploaded) {
                $handle->file_new_name_body = 'multi';
                $handle->process(public_path('images').'/products/');
                if ($handle->processed) {
                    array_push($uploadedFiles, $handle->file_dst_name);
                } else {
                    return 'error : '.$handle->error;
                }

            } else {
                return 'Error: Error Here Cn Do Any Things'.$handle->error;
            }
            unset($handle);
        }

        return $uploadedFiles;
    }

    public function uploadimg()
    {
        try {
            // File Route.
            $fileRoute = public_path('images').'/img/';

            $fieldname = 'file';

            // Get filename.
            $filename = explode('.', $_FILES[$fieldname]['name']);

            // Validate uploaded files.
            // Do not use $_FILES["file"]["type"] as it can be easily forged.
            $finfo = finfo_open(FILEINFO_MIME_TYPE);

            // Get temp file name.
            $tmpName = $_FILES[$fieldname]['tmp_name'];

            // Get mime type.
            $mimeType = finfo_file($finfo, $tmpName);

            // Get extension. You must include fileinfo PHP extension.
            $extension = end($filename);

            // Allowed extensions.
            $allowedExts = ['gif', 'jpeg', 'jpg', 'png', 'svg', 'blob'];

            // Allowed mime types.
            $allowedMimeTypes = ['image/gif', 'image/jpeg', 'image/pjpeg', 'image/x-png', 'image/png', 'image/svg+xml'];

            // Validate image.
            if (! in_array(strtolower($mimeType), $allowedMimeTypes) || ! in_array(strtolower($extension), $allowedExts)) {
                throw new \Exception('File does not meet the validation.');
            }

            // Generate new random name.
            $name = sha1(microtime()).'.'.$extension;
            $fullNamePath = $fileRoute.$name;

            // Check server protocol and load resources accordingly.
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                $protocol = 'https://';
            } else {
                $protocol = 'http://';
            }

            // Save file in the uploads folder.
            move_uploaded_file($tmpName, $fullNamePath);

            // Generate response.
            $response = new \StdClass;
            $response->link = '/images/img/'.$name;

            // Send response.
            echo stripslashes(json_encode($response));

        } catch (Exception $e) {
            // Send error response.
            echo $e->getMessage();
            http_response_code(404);
        }
    }

    public function uploadfile()
    {
        try {
            $fileRoute = public_path('files').'/';
            $fieldname = 'file';
            $filename = explode('.', $_FILES[$fieldname]['name']);
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $tmpName = $_FILES[$fieldname]['tmp_name'];
            $mimeType = finfo_file($finfo, $tmpName);
            $extension = end($filename);
            $allowedExts = ['txt', 'pdf', 'doc', 'docx', 'json', 'html'];
            $allowedMimeTypes = ['text/plain', 'application/msword', 'application/x-pdf', 'application/pdf', 'application/json', 'text/html'];
            if (! in_array(strtolower($mimeType), $allowedMimeTypes) || ! in_array(strtolower($extension), $allowedExts)) {
                throw new \Exception('File does not meet the validation.');
            }
            $name = sha1(microtime()).'.'.$extension;
            $fullNamePath = $fileRoute.$name;
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                $protocol = 'https://';
            } else {
                $protocol = 'http://';
            }
            move_uploaded_file($tmpName, $fullNamePath);
            $response = new \StdClass;
            $response->link = '/files/'.$name;
            echo stripslashes(json_encode($response));
        } catch (Exception $e) {
            echo $e->getMessage();
            http_response_code(404);
        }

    }
}
