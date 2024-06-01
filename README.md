#S3 Image Upload & Delete
<?php

require 'vendor/autoload.php';
require 'S3ImageAction.php';

// Define constants if not already defined in a configuration file
define('AWS_REGION', 'your-region'); // e.g., 'us-east-1'
define('ACCESS_ID', 'your-access-id');
define('SECRET_ID', 'your-secret-id');
define('BUCKET_NAME', 'your-bucket-name');
define('PUBLIC_IMAGE_UPLOAD_SAVE_URLPATH', '/path/to/your/upload/directory/');

// Upload an image
$uploadImageName = 'example.jpg';
$uploadSuccess = S3ImageAction::s3ImageUpload($uploadImageName);
if ($uploadSuccess) {
    echo 'Image uploaded successfully.' . PHP_EOL;
} else {
    echo 'Image upload failed.' . PHP_EOL;
}

// Delete an image
$deleteImageName = 'example.jpg';
$deleteSuccess = S3ImageAction::s3ImageDelete($deleteImageName);
if ($deleteSuccess) {
    echo 'Image deleted successfully.' . PHP_EOL;
} else {
    echo 'Image deletion failed.' . PHP_EOL;
}
?>
