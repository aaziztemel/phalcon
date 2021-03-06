<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Unit\Security\JWT\Validator;

use Phalcon\Security\JWT\Exceptions\ValidatorException;
use Phalcon\Security\JWT\Validator;
use Phalcon\Tests\Fixtures\Traits\JWTTrait;
use UnitTester;

/**
 * Class ValidateIssuedAtCest
 *
 * @package Phalcon\Tests\Unit\Security\JWT\Validator
 */
class ValidateIssuedAtCest
{
    use JWTTrait;

    /**
     * Unit Tests Phalcon\Security\JWT\Validator :: validateIssuedAt()
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function httpJWTValidatorValidateIssuedAt(UnitTester $I)
    {
        $I->wantToTest('Http\JWT\Validator - validateIssuedAt()');

        $token = $this->newToken();
        $I->expectThrowable(
            new ValidatorException(
                "Validation: the token cannot be used yet (future)"
            ),
            function () use ($token, $I) {
                $timestamp = strtotime(("-1 day"));
                $validator = new Validator($token);
                $I->assertInstanceOf(Validator::class, $validator);
                $validator->validateIssuedAt($timestamp);
            }
        );
    }
}
