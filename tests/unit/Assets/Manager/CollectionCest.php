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

namespace Phalcon\Tests\Unit\Assets\Manager;

use Countable;
use IteratorAggregate;
use Phalcon\Assets\Collection;
use Phalcon\Assets\Manager;
use Phalcon\Html\Escaper;
use Phalcon\Html\TagFactory;
use UnitTester;

class CollectionCest
{
    /**
     * Tests Phalcon\Assets\Manager :: collection()
     *
     * @author Phalcon Team <team@phalcon.io>
     * @since  2020-03-19
     */
    public function assetsManagerCollection(UnitTester $I)
    {
        $I->wantToTest('Assets\Manager - collection()');

        $manager = new Manager(new TagFactory(new Escaper()));

        $collection = $manager->collection('hangout1');
        $I->assertInstanceOf(Collection::class, $collection);
        $I->assertInstanceOf(Countable::class, $collection);
        $I->assertInstanceOf(IteratorAggregate::class, $collection);

        $collection = $manager->collection('hangout2');
        $I->assertInstanceOf(Collection::class, $collection);
        $I->assertInstanceOf(Countable::class, $collection);
        $I->assertInstanceOf(IteratorAggregate::class, $collection);

        $collections = $manager->getCollections();

        $I->assertCount(2, $collections);
        foreach ($collections as $collection) {
            $I->assertInstanceOf(Collection::class, $collection);
            $I->assertInstanceOf(Countable::class, $collection);
            $I->assertInstanceOf(IteratorAggregate::class, $collection);
        }
    }
}
