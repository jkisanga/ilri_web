<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDeviceUserAPIRequest;
use App\Http\Requests\API\UpdateDeviceUserAPIRequest;
use App\Models\DeviceUser;
use App\Repositories\DeviceUserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DeviceUserController
 * @package App\Http\Controllers\API
 */

class DeviceUserAPIController extends Controller
{
    /** @var  DeviceUserRepository */
    private $deviceUserRepository;

    public function __construct(DeviceUserRepository $deviceUserRepo)
    {
        $this->deviceUserRepository = $deviceUserRepo;
    }

    /**
     * Display a listing of the DeviceUser.
     * GET|HEAD /deviceUsers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->deviceUserRepository->pushCriteria(new RequestCriteria($request));
        $this->deviceUserRepository->pushCriteria(new LimitOffsetCriteria($request));
        $deviceUsers = $this->deviceUserRepository->all();

        return response($deviceUsers->toArray());
    }

    /**
     * Store a newly created DeviceUser in storage.
     * POST /deviceUsers
     *
     * @param CreateDeviceUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDeviceUserAPIRequest $request)
    {
        $ime = $request->get('IME_NO');
        $password = $request->get('password');
        $data =   DeviceUser::where('IME_NO', '=', $ime)->where('password', '=',$password )->first();
        if($data != null){
            if($data->IME_NO == $ime){
                return response($data->toArray());
            }else{
                // return false;
                return response($data->toArray());
            }
        }else{
            return redirect(route('dss.index'));
        }


    }

    /**
     * Display the specified DeviceUser.
     * GET|HEAD /deviceUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DeviceUser $deviceUser */
        $deviceUser = $this->deviceUserRepository->findWithoutFail($id);

        if (empty($deviceUser)) {
            return $this->sendError('Device User not found');
        }

        return $this->sendResponse($deviceUser->toArray(), 'Device User retrieved successfully');
    }

    /**
     * Update the specified DeviceUser in storage.
     * PUT/PATCH /deviceUsers/{id}
     *
     * @param  int $id
     * @param UpdateDeviceUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeviceUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var DeviceUser $deviceUser */
        $deviceUser = $this->deviceUserRepository->findWithoutFail($id);

        if (empty($deviceUser)) {
            return $this->sendError('Device User not found');
        }

        $deviceUser = $this->deviceUserRepository->update($input, $id);

        return response($deviceUser->toArray());
    }

    /**
     * Remove the specified DeviceUser from storage.
     * DELETE /deviceUsers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DeviceUser $deviceUser */
        $deviceUser = $this->deviceUserRepository->findWithoutFail($id);

        if (empty($deviceUser)) {
            return $this->sendError('Device User not found');
        }

        $deviceUser->delete();

        return $this->sendResponse($id, 'Device User deleted successfully');
    }


    public function changePIN($user_id, $pin)
    {


//        if (empty($deviceUser)) {
//            return $this->sendError('Device User not found');
//        }

        $deviceUser =  DeviceUser::find($user_id);   //$this->deviceUserRepository->findWithoutFail($user_id);
        $deviceUser->password = $pin;
        if($deviceUser->save()) {
            return response($deviceUser->toArray());
        }else{

            return $this->sendError('Device User not found');
        }
    }
}
