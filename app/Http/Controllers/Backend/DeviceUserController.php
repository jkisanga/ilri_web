<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateDeviceUserRequest;
use App\Http\Requests\UpdateDeviceUserRequest;
use App\Repositories\DeviceUserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DeviceUserController extends Controller
{
    /** @var  DeviceUserRepository */
    private $deviceUserRepository;

    public function __construct(DeviceUserRepository $deviceUserRepo)
    {
        $this->deviceUserRepository = $deviceUserRepo;
    }

    /**
     * Display a listing of the DeviceUser.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->deviceUserRepository->pushCriteria(new RequestCriteria($request));
        $deviceUsers = $this->deviceUserRepository->all();

        return view('device_users.index')
            ->with('deviceUsers', $deviceUsers);
    }

    /**
     * Show the form for creating a new DeviceUser.
     *
     * @return Response
     */
    public function create()
    {
        return view('device_users.create');
    }

    /**
     * Store a newly created DeviceUser in storage.
     *
     * @param CreateDeviceUserRequest $request
     *
     * @return Response
     */
    public function store(CreateDeviceUserRequest $request)
    {
        $input = $request->all();

        $deviceUser = $this->deviceUserRepository->create($input);

        Flash::success('Device User saved successfully.');

        return redirect(route('admin.deviceUsers.index'));
    }

    /**
     * Display the specified DeviceUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $deviceUser = $this->deviceUserRepository->findWithoutFail($id);

        if (empty($deviceUser)) {
            Flash::error('Device User not found');

            return redirect(route('admin.deviceUsers.index'));
        }

        return view('device_users.show')->with('deviceUser', $deviceUser);
    }

    /**
     * Show the form for editing the specified DeviceUser.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $deviceUser = $this->deviceUserRepository->findWithoutFail($id);

        if (empty($deviceUser)) {
            Flash::error('Device User not found');

            return redirect(route('admin.deviceUsers.index'));
        }

        return view('device_users.edit')->with('deviceUser', $deviceUser);
    }

    /**
     * Update the specified DeviceUser in storage.
     *
     * @param  int              $id
     * @param UpdateDeviceUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDeviceUserRequest $request)
    {
        $deviceUser = $this->deviceUserRepository->findWithoutFail($id);

        if (empty($deviceUser)) {
            Flash::error('Device User not found');

            return redirect(route('deviceUsers.index'));
        }

        $deviceUser = $this->deviceUserRepository->update($request->all(), $id);

        Flash::success('Device User updated successfully.');

        return redirect(route('admin.deviceUsers.index'));
    }

    /**
     * Remove the specified DeviceUser from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $deviceUser = $this->deviceUserRepository->findWithoutFail($id);

        if (empty($deviceUser)) {
            Flash::error('Device User not found');

            return redirect(route('deviceUsers.index'));
        }

        $this->deviceUserRepository->delete($id);

        Flash::success('Device User deleted successfully.');

        return redirect(route('deviceUsers.index'));
    }
}
