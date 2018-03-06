<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class PhotosTest extends TestCase
{
    use DatabaseMigrations;

    private $photos;

    public function setUp()
    {
        parent::setUp();

        $this->photos = factory(\App\Photo::class, 10)->create();
    }

    public function testIndex()
    {
        $response = $this->json('GET', 'api/v1/photos');
        $response->assertResponseOk();
        $response->assertJson($this->photos);
    }
}
