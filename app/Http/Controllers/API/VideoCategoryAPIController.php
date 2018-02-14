<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVideoCategoryAPIRequest;
use App\Http\Requests\API\UpdateVideoCategoryAPIRequest;
use App\Models\VideoCategory;
use App\Repositories\VideoCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class VideoCategoryController
 * @package App\Http\Controllers\API
 */

class VideoCategoryAPIController extends Controller
{
    /** @var  VideoCategoryRepository */
    private $videoCategoryRepository;

    public function __construct(VideoCategoryRepository $videoCategoryRepo)
    {
        $this->videoCategoryRepository = $videoCategoryRepo;
    }

    /**
     * Display a listing of the VideoCategory.
     * GET|HEAD /videoCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->videoCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->videoCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $videoCategories = $this->videoCategoryRepository->all();

        return response($videoCategories->toArray());
    }

    /**
     * Store a newly created VideoCategory in storage.
     * POST /videoCategories
     *
     * @param CreateVideoCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVideoCategoryAPIRequest $request)
    {
        $input = $request->all();

        $videoCategories = $this->videoCategoryRepository->create($input);

        return $this->sendResponse($videoCategories->toArray(), 'Video Category saved successfully');
    }

    /**
     * Display the specified VideoCategory.
     * GET|HEAD /videoCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var VideoCategory $videoCategory */
        $videoCategory = $this->videoCategoryRepository->findWithoutFail($id);

        if (empty($videoCategory)) {
            return $this->sendError('Video Category not found');
        }

        return $this->sendResponse($videoCategory->toArray(), 'Video Category retrieved successfully');
    }

    /**
     * Update the specified VideoCategory in storage.
     * PUT/PATCH /videoCategories/{id}
     *
     * @param  int $id
     * @param UpdateVideoCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideoCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var VideoCategory $videoCategory */
        $videoCategory = $this->videoCategoryRepository->findWithoutFail($id);

        if (empty($videoCategory)) {
            return $this->sendError('Video Category not found');
        }

        $videoCategory = $this->videoCategoryRepository->update($input, $id);

        return $this->sendResponse($videoCategory->toArray(), 'VideoCategory updated successfully');
    }

    /**
     * Remove the specified VideoCategory from storage.
     * DELETE /videoCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var VideoCategory $videoCategory */
        $videoCategory = $this->videoCategoryRepository->findWithoutFail($id);

        if (empty($videoCategory)) {
            return $this->sendError('Video Category not found');
        }

        $videoCategory->delete();

        return $this->sendResponse($id, 'Video Category deleted successfully');
    }
}
