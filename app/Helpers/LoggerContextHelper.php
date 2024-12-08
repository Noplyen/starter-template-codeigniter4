<?php

namespace App\Helpers;

class LoggerContextHelper
{
    public static function contextualMessage(string $errorMessage,
                                             ?array $trace=null,
                                             ?array $data=null): array
    {
        return
            [
                'previous-message'=>$errorMessage,
                'detail-data'=>$data,
                'trace'=>self::simpleTrace($trace)
            ];
    }

    public static function simpleTrace($traceArray)
    {
        $file = $traceArray[0]["file"];
        $line = $traceArray[0]["line"];
        $function = $traceArray[0]["function"];

        $data =
            [
                "file-error"=>$file,
                "line"=>$line,
                "function"=>$function
            ];

        return $data;
    }
}