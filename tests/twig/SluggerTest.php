<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Twig\AppExtension;

class SluggerTest extends TestCase
{
    public function testSomething(string $string, string $slug)
    {
        $slugger = new AppExtension;
        $this->assertSame($slug, $slugger->slugify($string));
    }
}
