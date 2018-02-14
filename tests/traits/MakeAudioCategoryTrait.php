<?php

use Faker\Factory as Faker;
use App\Models\AudioCategory;
use App\Repositories\AudioCategoryRepository;

trait MakeAudioCategoryTrait
{
    /**
     * Create fake instance of AudioCategory and save it in database
     *
     * @param array $audioCategoryFields
     * @return AudioCategory
     */
    public function makeAudioCategory($audioCategoryFields = [])
    {
        /** @var AudioCategoryRepository $audioCategoryRepo */
        $audioCategoryRepo = App::make(AudioCategoryRepository::class);
        $theme = $this->fakeAudioCategoryData($audioCategoryFields);
        return $audioCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of AudioCategory
     *
     * @param array $audioCategoryFields
     * @return AudioCategory
     */
    public function fakeAudioCategory($audioCategoryFields = [])
    {
        return new AudioCategory($this->fakeAudioCategoryData($audioCategoryFields));
    }

    /**
     * Get fake data of AudioCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAudioCategoryData($audioCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'desc' => $fake->word,
            'thumbnail' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $audioCategoryFields);
    }
}
