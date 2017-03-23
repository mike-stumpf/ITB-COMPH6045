<?php

namespace Services;

class Util {
    public static function getGlobalVariables(){
        return [
            'viewsDirectory' => getenv('VIEW_DIRECTORY'),
            'imagesDirectory' => '/public/images/'
        ];
    }

    public static function getMetaTitle($pageName){
        return getenv('META_TITLE_PREFIX').' '.ucwords(str_replace('-',' ',$pageName));
    }

    public static function getPageTitle($pageName){
        return ucwords(str_replace('-',' ',$pageName));
    }

    public static function createResponse($status, $message = ''){
        if (empty($message)){
            switch($status){
                case 200: 
                    $message = 'Accepted';
                    break;
                case 201:
                    $message = 'Created';
                    break;
                case 400:
                    $message = 'Bad Request';
                    break;
                case 401:
                    $message = 'Unauthorized';
                    break;
                case 404:
                    $message = 'Not Found';
                    break;
                case 500:
                    $message = 'Internal Error';
                    break;
            }
        }
        return array(
            'status'=>$status,
            'message'=>$message
        );
    }
}