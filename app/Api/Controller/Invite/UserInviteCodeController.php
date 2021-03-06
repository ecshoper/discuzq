<?php

/**
 * Copyright (C) 2020 Tencent Cloud.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace App\Api\Controller\Invite;

use App\Exceptions\NoUserException;
use Discuz\Auth\AssertPermissionTrait;
use Discuz\Http\DiscuzResponseFactory;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;

class UserInviteCodeController implements RequestHandlerInterface
{
    use AssertPermissionTrait;

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     * @throws NoUserException
     * @throws \Discuz\Auth\Exception\NotAuthenticatedException
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $actor = $request->getAttribute('actor');
        $this->assertRegistered($actor);

        if (!$actor) {
            throw new NoUserException();
        }

        $data = [
            'data' => [
                'type' => 'invite',
                'code' => $actor->id
            ],
        ];

        return DiscuzResponseFactory::JsonApiResponse($data);
    }
}
