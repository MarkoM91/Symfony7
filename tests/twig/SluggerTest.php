<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Twig\AppExtension;

class SluggerTest extends TestCase
{

      /**
       * @dataProvider getSlugs
       */
    public function testSomething(string $string, string $slug)
    {
        $slugger = new AppExtension;
        $this->assertSame($slug, $slugger->slugify($string));
    }

    public function getSlugs()
    {

      yield  ['Lorem Ipsum', 'lorem-ipsum'];
      yield [' Lorem Ipsum', 'lorem-ipsum'];
      yield [' lOrEm  iPsUm  ', 'lorem-ipsum'];
      yield ['!Lorem Ipsum!', 'lorem-ipsum'];
      yield ['lorem-ipsum', 'lorem-ipsum'];
      yield ['Children\'s books', 'childrens-books'];
      yield ['Five star movies', 'five-star-movies'];
      yield ['Adults 60+', 'adults-60'];

    }
}
