<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCheckpointUserAPIRequest;
use App\Http\Requests\API\UpdateCheckpointUserAPIRequest;
use App\Models\CheckpointUser;
use App\Repositories\CheckpointUserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CheckpointUserController
 * @package App\Http\Controllers\API
 */

class CheckpointUserAPIController extends Controller
{
    /** @var  CheckpointUserRepository */
    private $checkpointUserRepository;

    public function __construct(CheckpointUserRepository $checkpointUserRepo)
    {
        $this->checkpointUserRepository = $checkpointUserRepo;
    }

    /**
     * Display a listing of the CheckpointUser.
     * GET|HEAD /checkpointUsers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->checkpointUserRepository->pushCriteria(new RequestCriteria($request));
        $this->checkpointUserRepository->pushCriteria(new LimitOffsetCriteria($request));
        $checkpointUsers = $this->checkpointUserRepository->all();

        return response($checkpointUsers->toArray());
    }

    /**
     * Store a newly created CheckpointUser in storage.
     * POST /checkpointUsers
     *
     * @param CreateCheckpointUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCheckpointUserAPIRequest $request)
    {
        $username = $request->get('username');
        $pinCode = $request->get('pin_code');
     $data =   CheckpointUser::where('pin_code', '=', $pinCode)->where('username', '=', $username)->first();
        if($data != null){
            if($data->username == $username){
                return response($data->toArray());
            }else{
               // return false;
                return response($data->toArray());
            }
        }else{
			return redirect(route('tpCheckpoints.index'));
		}

        return response('Checkpoint User saved successfully');
    }

    /**
     * Display the specified CheckpointUser.
     * GET|HEAD /checkpointUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CheckpointUser $checkpointUser */
        $checkpointUser = $this->checkpointUserRepository->findWithoutFail($id);

        if (empty($checkpointUser)) {
            return $this->sendError('Checkpoint User not found');
        }

        return $this->sendResponse($checkpointUser->toArray(), 'Checkpoint User retrieved successfully');
    }

    /**
     * Update the specified CheckpointUser in storage.
     * PUT/PATCH /checkpointUsers/{id}
     *
     * @param  int $id
     * @param UpdateCheckpointUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCheckpointUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var CheckpointUser $checkpointUser */
        $checkpointUser = $this->checkpointUserRepository->findWithoutFail($id);

        if (empty($checkpointUser)) {
            return $this->sendError('Checkpoint User not found');
        }

        $checkpointUser = $this->checkpointUserRepository->update($input, $id);

        return $this->sendResponse($checkpointUser->toArray(), 'CheckpointUser updated successfully');
    }

    /**
     * Remove the specified CheckpointUser from storage.
     * DELETE /checkpointUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CheckpointUser $checkpointUser */
        $checkpointUser = $this->checkpointUserRepository->findWithoutFail($id);

        if (empty($checkpointUser)) {
            return $this->sendError('Checkpoint User not found');
        }

        $checkpointUser->delete();

        return $this->sendResponse($id, 'Checkpoint User deleted successfully');
    }
}
