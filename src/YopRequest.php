<?php
/**
 * Created by PhpStorm.
 * User: shuliuzhenhua
 * Date: 2019/1/5
 * Time: 3:45 PM
 */

namespace Shuliuzhenhua\Yop;

require_once __DIR__ . '/../vendor/autoload.php';

use Shuliuzhenhua\Yop\core\YopRequest as Request;

/**
 * 请求类
 * Class YopRequest
 * @package Shuliuzhenhua\Yop
 */
class YopRequest extends Request
{
    /**
     * 初始化
     * YopRequest constructor.
     * @param $appKey
     * @param $secretKey
     */
    public function __construct($appKey, $secretKey)
    {
        parent::__construct($appKey, $secretKey);

        $this->setEncrypt(false);
        $this->setSignRet(true);
        $this->setSignAlg('sha256');
    }

    /**
     * 通过数组方式设置参数
     * @param array $array
     */
    public function setParam(array $array)
    {
        foreach ($array as $key => $value) {
            $this->addParam($key, $value);
        }
    }
}