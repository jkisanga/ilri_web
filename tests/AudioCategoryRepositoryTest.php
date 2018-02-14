<?php

use App\Models\AudioCategory;
use App\Repositories\AudioCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AudioCategoryRepositoryTest extends TestCase
{
    use MakeAudioCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var AudioCategoryRepository
     */
    protected $audioCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->audioCategoryRepo = App::make(AudioCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateAudioCategory()
    {
        $audioCategory = $this->fakeAudioCategoryData();
        $createdAudioCategory = $this->audioCategoryRepo->create($audioCategory);
        $createdAudioCategory = $createdAudioCategory->toArray();
        $this->assertArrayHasKey('id', $createdAudioCategory);
        $this->assertNotNull($createdAudioCategory['id'], 'Created AudioCategory must have id specified');
        $this->assertNotNull(AudioCategory::find($createdAudioCategory['id']), 'AudioCategory with given id must be in DB');
        $this->assertModelData($audioCategory, $createdAudioCategory);
    }

    /**
     * @test read
     */
    public function testReadAudioCategory()
    {
        $audioCategory = $this->makeAudioCategory();
        $dbAudioCategory = $this->audioCategoryRepo->find($audioCategory->id);
        $dbAudioCategory = $dbAudioCategory->toArray();
        $this->assertModelData($audioCategory->toArray(), $dbAudioCategory);
    }

    /**
     * @test update
     */
    public function testUpdateAudioCategory()
    {
        $audioCategory = $this->makeAudioCategory();
        $fakeAudioCategory = $this->fakeAudioCategoryData();
        $updatedAudioCategory = $this->audioCategoryRepo->update($fakeAudioCategory, $audioCategory->id);
        $this->assertModelData($fakeAudioCategory, $updatedAudioCategory->toArray());
        $dbAudioCategory = $this->audioCategoryRepo->find($audioCategory->id);
        $this->assertModelData($fakeAudioCategory, $dbAudioCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteAudioCategory()
    {
        $audioCategory = $this->makeAudioCategory();
        $resp = $this->audioCategoryRepo->delete($audioCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(AudioCategory::find($audioCategory->id), 'AudioCategory should not exist in DB');
    }
}
