<?php
/**
 * Created by PhpStorm.
 * User: shuliuzhenhua
 * Date: 2019/1/5
 * Time: 4:25 PM
 */

namespace Shuliuzhenhua\Yop;

require_once __DIR__ . '/../vendor/autoload.php';

use Shuliuzhenhua\Yop\core\Util\AESEncrypter;
use Shuliuzhenhua\Yop\core\YopResponse as Response;

/**
 * 返回结果类
 * Class YopResponse
 * @package Shuliuzhenhua\Yop
 */
class YopResponse extends  Response
{
    /**
     * 解码
     * @param $response
     * @param $secretKey
     * @return mixed
     */
    public static function decrypt($response, $secretKey)
    {
        $response = json_decode($response['response']);

        $json =  AESEncrypter::decode($response->encryption, $secretKey);

        $response = json_decode($json);

        return $response;
    }
}