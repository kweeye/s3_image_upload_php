<?php 

class S3ImageAction(){

    public static function s3ImageUpload($image_name)
    {
        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => AWS_REGION,
            'credentials' => [
                'key'    => ACCESS_ID,
                'secret' => SECRET_ID,
            ],
        ]);
        
        try {    
            $result = $s3->putObject([
                'Bucket' => BUCKET_NAME,
                'Key'    => $image_name,
                'SourceFile' => PUBLIC_IMAGE_UPLOAD_SAVE_URLPATH.$image_name,
                'ACL'    => 'public-read',
            ]);
    
            if ($result) {
                return true;
            } else {
                return false;
            }
        }  catch (S3Exception $e) {
            return false;
        }
    }

    public static function s3ImageDelete($image_name)
    {
        $s3 = new S3Client([
            'version' => 'latest',
            'region'  => AWS_REGION,
            'credentials' => [
                'key'    => ACCESS_ID,
                'secret' => SECRET_ID,
            ],
        ]);
        
        try {    
            $result = $s3->deleteObject([
                'Bucket' => BUCKET_NAME,
                'Key'    => $image_name,
            ]);
    
            if ($result) {
                return true;
            } else {
                return false;
            }
        }  catch (S3Exception $e) {
            return false;
        }
    }
}
