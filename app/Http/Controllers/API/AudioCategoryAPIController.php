<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAudioCategoryAPIRequest;
use App\Http\Requests\API\UpdateAudioCategoryAPIRequest;
use App\Models\AudioCategory;
use App\Repositories\AudioCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AudioCategoryController
 * @package App\Http\Controllers\API
 */

class AudioCategoryAPIController extends Controller
{
    /** @var  AudioCategoryRepository */
    private $audioCategoryRepository;

    public function __construct(AudioCategoryRepository $audioCategoryRepo)
    {
        $this->audioCategoryRepository = $audioCategoryRepo;
    }

    /**
     * Display a listing of the AudioCategory.
     * GET|HEAD /audioCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->audioCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->audioCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $audioCategories = $this->audioCategoryRepository->all();

        return response($audioCategories->toArray());
    }

    /**
     * Store a newly created AudioCategory in storage.
     * POST /audioCategories
     *
     * @param CreateAudioCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAudioCategoryAPIRequest $request)
    {
        $input = $request->all();

        $audioCategories = $this->audioCategoryRepository->create($input);

        return $this->sendResponse($audioCategories->toArray(), 'Audio Category saved successfully');
    }

    /**
     * Display the specified AudioCategory.
     * GET|HEAD /audioCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var AudioCategory $audioCategory */
        $audioCategory = $this->audioCategoryRepository->findWithoutFail($id);

        if (empty($audioCategory)) {
            return $this->sendError('Audio Category not found');
        }

        return $this->sendResponse($audioCategory->toArray(), 'Audio Category retrieved successfully');
    }

    /**
     * Update the specified AudioCategory in storage.
     * PUT/PATCH /audioCategories/{id}
     *
     * @param  int $id
     * @param UpdateAudioCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAudioCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var AudioCategory $audioCategory */
        $audioCategory = $this->audioCategoryRepository->findWithoutFail($id);

        if (empty($audioCategory)) {
            return $this->sendError('Audio Category not found');
        }

        $audioCategory = $this->audioCategoryRepository->update($input, $id);

        return $this->sendResponse($audioCategory->toArray(), 'AudioCategory updated successfully');
    }

    /**
     * Remove the specified AudioCategory from storage.
     * DELETE /audioCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var AudioCategory $audioCategory */
        $audioCategory = $this->audioCategoryRepository->findWithoutFail($id);

        if (empty($audioCategory)) {
            return $this->sendError('Audio Category not found');
        }

        $audioCategory->delete();

        return $this->sendResponse($id, 'Audio Category deleted successfully');
    }
}
