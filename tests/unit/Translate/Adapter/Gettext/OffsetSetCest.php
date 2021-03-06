<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Phalcon\Tests\Unit\Translate\Adapter\Gettext;

use Phalcon\Tests\Fixtures\Traits\TranslateGettextTrait;
use Phalcon\Translate\Adapter\Gettext;
use Phalcon\Translate\Exception;
use Phalcon\Translate\InterpolatorFactory;
use UnitTester;

/**
 * Class OffsetSetCest
 *
 * @package Phalcon\Tests\Unit\Translate\Adapter\Gettext
 */
class OffsetSetCest
{
    use TranslateGettextTrait;

    /**
     * Tests Phalcon\Translate\Adapter\Gettext :: offsetSet()
     *
     * @param UnitTester $I
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-09-09
     */
    public function translateAdapterGettextOffsetSet(UnitTester $I)
    {
        $I->wantToTest('Translate\Adapter\Gettext - offsetSet()');

        $I->expectThrowable(
            new Exception('Translate is an immutable ArrayAccess object'),
            function () {
                $language = $this->getGettextConfig();

                $translator = new Gettext(new InterpolatorFactory(), $language);
                $translator->offsetSet('team', 'Team');
            }
        );
    }
}
