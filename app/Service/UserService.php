<?php
/**
 * User: lufei
 * Date: 2020/6/27
 * Email: lufei@swoole.com
 */

namespace App\Service;

use App\Model\User;

class UserService
{
    public function getInfoById(int $id): array
    {
        $user = User::query()->find($id);

        return $user->toArray();
    }
}