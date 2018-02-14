<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AudioCategoryApiTest extends TestCase
{
    use MakeAudioCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateAudioCategory()
    {
        $audioCategory = $this->fakeAudioCategoryData();
        $this->json('POST', '/api/v1/audioCategories', $audioCategory);

        $this->assertApiResponse($audioCategory);
    }

    /**
     * @test
     */
    public function testReadAudioCategory()
    {
        $audioCategory = $this->makeAudioCategory();
        $this->json('GET', '/api/v1/audioCategories/'.$audioCategory->id);

        $this->assertApiResponse($audioCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateAudioCategory()
    {
        $audioCategory = $this->makeAudioCategory();
        $editedAudioCategory = $this->fakeAudioCategoryData();

        $this->json('PUT', '/api/v1/audioCategories/'.$audioCategory->id, $editedAudioCategory);

        $this->assertApiResponse($editedAudioCategory);
    }

    /**
     * @test
     */
    public function testDeleteAudioCategory()
    {
        $audioCategory = $this->makeAudioCategory();
        $this->json('DELETE', '/api/v1/audioCategories/'.$audioCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/audioCategories/'.$audioCategory->id);

        $this->assertResponseStatus(404);
    }
}
