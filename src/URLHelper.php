<?php
namespace App;

    class URLHelper {

     
        public static function withParam(string $param, $value): string{

            return  http_build_query(array_merge($_GET, [$param => $value]));
    }

    public static function withParams(array $data, array $params):string 
    {
        return http_build_query(array_merge($data, $params));
    }

} 