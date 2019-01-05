<?php
/**
 * Created by PhpStorm.
 * User: shuliuzhenhua
 * Date: 2019/1/5
 * Time: 4:57 PM
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Shuliuzhenhua\Yop\core\Util\AESEncrypter;
use Shuliuzhenhua\Yop\core\YopResponse;

class Response extends YopResponse
{
    public static function decrypt($response, $secretKey)
    {
        $response = json_decode($response['response']);

        $json =  AESEncrypter::decode($response->encryption, $secretKey);

        $response = json_decode($json);
        return $response;
    }
}



$response = Response::decrypt(['response' => '{"doSignature":"true","signatureAlg":"SHA1","encryption":"XBR8U0dEEJYCv91hyeBW5hz32p4rdEG09vSgxPzuF0JUuz7g2BZ5IZNoVd1ZeqSiYdwIGR5p2GW6Lkz0F+0M1pxMmaUl6+4BwZfpWYXGQBlE323NmeMKRE+64S1px6dZaX4BjakZ8165jMXUKAgrWL4CcjZbhOlfsQ+uN70XpSR9TkxlWeJR7uBOZeW1xchiaQI0PheBI2DJCAWlqohuHrNbRrGDkICvOEOVtJz9uMUzl8uD6eH8KWJt0PuC6zrXWoivs8BPubXGjRQYNAutK/Ngl4fZnQrY39ULeVAI3NzNbRgACT0+f0rKoZsEuFyRIjPd39l2ZGjKoeqUd9ebgl45dACCOusH/6R8v/6BpaGgo0/51yypyLMje7nehH749wTDx+fwvA5n3ufMdJ+VHkLjdiRLGT4wkFvuyefw10CfxtjMldHhUm6l77URr661BfVao+SXePEk5dy/fD3WVPc0T/OoZ3XIL/uFjvglKVzZqS00eoTEkdIzljK7f8WlnT1p+sTiDwPEn1/QJmXs9G8/1QWuOvWV9iIBdQhEdHBAATK1J92sXWcZr9z1Mooj","signature":"010d81b7e82c22b7897df470d1a1be6fdd29ab28","doEncryption":"true","customerIdentification":"BM12345678915446","encryptionAlg":"AES"}',
                               'customerIdentification' => 'BM12345678915446'], '4cdnCDy+1erKPcrQmLacZg==');

var_dump($response);