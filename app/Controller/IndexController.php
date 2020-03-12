<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

class IndexController extends AbstractController
{
    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    public function test()
    {
        $ch = curl_init();
        $url = 'http://127.0.0.1:9504';

        $pra2 = '{
                  "jsonrpc": "2.0",
                  "method": "calculator/add",
                  "params": [1, 2],
                  "id": "1"
                }';

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => 1,
        ];
        curl_setopt_array($ch, $options);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $pra2);

        $data = curl_exec($ch);
        curl_close($ch);

        return json_decode($data, true);
    }
}
