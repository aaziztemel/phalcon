<?php

declare(strict_types=1);

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

namespace Phalcon\Tests\Fixtures;

use JsonSerializable;

class JsonFixture implements JsonSerializable
{
    private array $data = [];

    public function __construct()
    {
        $this->data["one"] = "two";
    }

    public function jsonSerialize()
    {
        return $this->data;
    }
}
