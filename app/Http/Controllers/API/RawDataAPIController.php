<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRawDataAPIRequest;
use App\Http\Requests\API\UpdateRawDataAPIRequest;
use App\Models\RawData;
use App\Repositories\RawDataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RawDataController
 * @package App\Http\Controllers\API
 */

class RawDataAPIController extends Controller
{
    /** @var  RawDataRepository */
    private $rawDataRepository;

    public function __construct(RawDataRepository $rawDataRepo)
    {
        $this->rawDataRepository = $rawDataRepo;
    }

    /**
     * Display a listing of the RawData.
     * GET|HEAD /rawDatas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rawDataRepository->pushCriteria(new RequestCriteria($request));
        $this->rawDataRepository->pushCriteria(new LimitOffsetCriteria($request));
        $rawDatas = $this->rawDataRepository->all();

        return response($rawDatas->toArray());
    }

    /**
     * Store a newly created RawData in storage.
     * POST /rawDatas
     *
     * @param CreateRawDataAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRawDataAPIRequest $request)
    {
        $input = $request->all();

        $rawDatas = $this->rawDataRepository->create($input);

        return $this->sendResponse($rawDatas->toArray(), 'Raw Data saved successfully');
    }

    /**
     * Display the specified RawData.
     * GET|HEAD /rawDatas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RawData $rawData */
        $rawData = $this->rawDataRepository->findWithoutFail($id);

        if (empty($rawData)) {
            return $this->sendError('Raw Data not found');
        }

        return $this->sendResponse($rawData->toArray(), 'Raw Data retrieved successfully');
    }

    /**
     * Update the specified RawData in storage.
     * PUT/PATCH /rawDatas/{id}
     *
     * @param  int $id
     * @param UpdateRawDataAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRawDataAPIRequest $request)
    {
        $input = $request->all();

        /** @var RawData $rawData */
        $rawData = $this->rawDataRepository->findWithoutFail($id);

        if (empty($rawData)) {
            return $this->sendError('Raw Data not found');
        }

        $rawData = $this->rawDataRepository->update($input, $id);

        return $this->sendResponse($rawData->toArray(), 'RawData updated successfully');
    }

    /**
     * Remove the specified RawData from storage.
     * DELETE /rawDatas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RawData $rawData */
        $rawData = $this->rawDataRepository->findWithoutFail($id);

        if (empty($rawData)) {
            return $this->sendError('Raw Data not found');
        }

        $rawData->delete();

        return $this->sendResponse($id, 'Raw Data deleted successfully');
    }
}
