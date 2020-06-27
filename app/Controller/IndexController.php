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

use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Annotation\AutoController;
use App\Model\User;
use Hyperf\Cache\Annotation\Cacheable;
use App\Service\UserService;
use Hyperf\Di\Annotation\Inject;

/**
 * @AutoController()
 */
class IndexController extends AbstractController
{
    public function index(RequestInterface $request)
    {
        $user = $request->input('user', 'Hyperf');
        $method = $request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.",
        ];
    }

    /**
     * @Inject
     * @var UserService
     */
    private $userService;

    public function testInject()
    {
        $id = 1;
        return $this->userService->getInfoById($id);
    }

    public function testUser(RequestInterface $request)
    {
        $id = $request->input('id', 1);
        return $this->user((int)$id);
    }

    /**
     * @Cacheable(prefix="user", ttl=7200, listener="USER_CACHE")
     */
    public function user(int $id): array
    {
        $user = User::query()->find($id);

        return [
            'user' => $user->toArray(),
            'uuid' => uniqid(),
        ];
    }

}
