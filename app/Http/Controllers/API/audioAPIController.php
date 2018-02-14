<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateaudioAPIRequest;
use App\Http\Requests\API\UpdateaudioAPIRequest;
use App\Models\audio;
use App\Repositories\audioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class audioController
 * @package App\Http\Controllers\API
 */

class audioAPIController extends Controller
{
    /** @var  audioRepository */
    private $audioRepository;

    public function __construct(audioRepository $audioRepo)
    {
        $this->audioRepository = $audioRepo;
    }

    /**
     * Display a listing of the audio.
     * GET|HEAD /audio
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->audioRepository->pushCriteria(new RequestCriteria($request));
        $this->audioRepository->pushCriteria(new LimitOffsetCriteria($request));
        $audio = $this->audioRepository->all();

        return response($audio->toArray());
    }

    /**
     * Store a newly created audio in storage.
     * POST /audio
     *
     * @param CreateaudioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateaudioAPIRequest $request)
    {
        $input = $request->all();

        $audio = $this->audioRepository->create($input);

        return $this->sendResponse($audio->toArray(), 'Audio saved successfully');
    }

    /**
     * Display the specified audio.
     * GET|HEAD /audio/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var audio $audio */
        $audio = $this->audioRepository->findWithoutFail($id);

        if (empty($audio)) {
            return $this->sendError('Audio not found');
        }

        return $this->sendResponse($audio->toArray(), 'Audio retrieved successfully');
    }

    /**
     * Update the specified audio in storage.
     * PUT/PATCH /audio/{id}
     *
     * @param  int $id
     * @param UpdateaudioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateaudioAPIRequest $request)
    {
        $input = $request->all();

        /** @var audio $audio */
        $audio = $this->audioRepository->findWithoutFail($id);

        if (empty($audio)) {
            return $this->sendError('Audio not found');
        }

        $audio = $this->audioRepository->update($input, $id);

        return $this->sendResponse($audio->toArray(), 'audio updated successfully');
    }

    /**
     * Remove the specified audio from storage.
     * DELETE /audio/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var audio $audio */
        $audio = $this->audioRepository->findWithoutFail($id);

        if (empty($audio)) {
            return $this->sendError('Audio not found');
        }

        $audio->delete();

        return $this->sendResponse($id, 'Audio deleted successfully');
    }
}
