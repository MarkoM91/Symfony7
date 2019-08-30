<?php


namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FrontControllerSecurityTest extends WebTestCase
{
        /**
     * @dataProvider getSecureUrls //name 
     */
    public function testSecureUrls(string $url)
    {
        $client = static::createClient();
        $client->request('GET', $url);

        $this->assertContains( '/login', $client->getResponse()->getTargetUrl() ); // I want this string login to be equal to url address bar in the address bar in our web browser;
        // if I am not logged in the application and try to  enter admin page I am redirected to the login page;
    }

    public function getSecureUrls()
    {
        yield ['/admin/videos'];
        yield ['/admin'];
        yield ['/admin/su/categories'];
        yield ['/admin/su/delete-category/1'];
    }

    public function testVideoForMembersOnly()
    {
        $client = static::createClient();
        $client->request('GET', '/video-list/category/movies,4');

        $this->assertContains( 'Video for <b>MEMBERS</b> only.', $client->getResponse()->getContent() );

    }
}
