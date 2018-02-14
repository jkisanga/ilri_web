<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDataCategoryAPIRequest;
use App\Http\Requests\API\UpdateDataCategoryAPIRequest;
use App\Models\DataCategory;
use App\Repositories\DataCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DataCategoryController
 * @package App\Http\Controllers\API
 */

class DataCategoryAPIController extends Controller
{
    /** @var  DataCategoryRepository */
    private $dataCategoryRepository;

    public function __construct(DataCategoryRepository $dataCategoryRepo)
    {
        $this->dataCategoryRepository = $dataCategoryRepo;
    }

    /**
     * Display a listing of the DataCategory.
     * GET|HEAD /dataCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->dataCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $dataCategories = $this->dataCategoryRepository->all();

        return response($dataCategories->toArray());
    }

    /**
     * Store a newly created DataCategory in storage.
     * POST /dataCategories
     *
     * @param CreateDataCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDataCategoryAPIRequest $request)
    {
        $input = $request->all();

        $dataCategories = $this->dataCategoryRepository->create($input);

        return $this->sendResponse($dataCategories->toArray(), 'Data Category saved successfully');
    }

    /**
     * Display the specified DataCategory.
     * GET|HEAD /dataCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DataCategory $dataCategory */
        $dataCategory = $this->dataCategoryRepository->findWithoutFail($id);

        if (empty($dataCategory)) {
            return $this->sendError('Data Category not found');
        }

        return $this->sendResponse($dataCategory->toArray(), 'Data Category retrieved successfully');
    }

    /**
     * Update the specified DataCategory in storage.
     * PUT/PATCH /dataCategories/{id}
     *
     * @param  int $id
     * @param UpdateDataCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var DataCategory $dataCategory */
        $dataCategory = $this->dataCategoryRepository->findWithoutFail($id);

        if (empty($dataCategory)) {
            return $this->sendError('Data Category not found');
        }

        $dataCategory = $this->dataCategoryRepository->update($input, $id);

        return $this->sendResponse($dataCategory->toArray(), 'DataCategory updated successfully');
    }

    /**
     * Remove the specified DataCategory from storage.
     * DELETE /dataCategories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DataCategory $dataCategory */
        $dataCategory = $this->dataCategoryRepository->findWithoutFail($id);

        if (empty($dataCategory)) {
            return $this->sendError('Data Category not found');
        }

        $dataCategory->delete();

        return $this->sendResponse($id, 'Data Category deleted successfully');
    }
}
