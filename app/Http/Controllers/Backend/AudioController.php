<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateaudioRequest;
use App\Http\Requests\UpdateaudioRequest;
use App\Models\audio;
use App\Repositories\audioRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AudioController extends Controller
{
    /** @var  audioRepository */
    private $audioRepository;

    public function __construct(audioRepository $audioRepo)
    {
        $this->audioRepository = $audioRepo;
    }

    /**
     * Display a listing of the audio.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->audioRepository->pushCriteria(new RequestCriteria($request));
        $audio = $this->audioRepository->all();

        return view('audio.index')
            ->with('audio', $audio);
    }

    /**
     * Show the form for creating a new audio.
     *
     * @return Response
     */
    public function create()
    {
        return view('audio.create');
    }

    /**
     * Store a newly created audio in storage.
     *
     * @param CreateaudioRequest $request
     *
     * @return Response
     */
    public function store(CreateaudioRequest $request)
    {
        $input = $request->all();



        $input = $request->all();

        $destinationPath = '';
        $filename        = '';

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $file_thumb            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('title'));
            $filename = str_random(10) . '_' . $myArray[0];
            $uploadSuccess = $file->move($destinationPath, $filename . "." . $file->getClientOriginalExtension());
            $uploadSuccessThumb   = $file_thumb->move($destinationPath, $filename.".".$file_thumb->getClientOriginalExtension());


            $doc = new audio();
            $doc->title = $request->get('title');
            $doc->audio_category_id = $request->get('audio_category_id');
            $doc->desc = $request->get('desc');
            $doc->file_path = $filename . "." . $file->getClientOriginalExtension();
            $doc->thumbnail = $filename.".".$file_thumb->getClientOriginalExtension();
            $doc->save();
            Flash::success('Audio saved successfully.');
            return redirect(route('admin.audioCategories.audio', [$request->get('audio_category_id')]));
        }else{
            $audio = $this->audioRepository->create($input);
            Flash::success('Audio saved successfully.');

            return redirect(route('admin.audioCategories.audio', [$audio->audio_category_id]));
        }

    }

    /**
     * Display the specified audio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $audio = $this->audioRepository->findWithoutFail($id);

        if (empty($audio)) {
            Flash::error('Audio not found');

            return redirect(route('audio.index'));
        }

        return view('audio.show')->with('audio', $audio);
    }

    /**
     * Show the form for editing the specified audio.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $audio = $this->audioRepository->findWithoutFail($id);

        if (empty($audio)) {
            Flash::error('Audio not found');

            return redirect(route('audio.index'));
        }

        return view('audio.edit')->with('audio', $audio);
    }

    /**
     * Update the specified audio in storage.
     *
     * @param  int              $id
     * @param UpdateaudioRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateaudioRequest $request)
    {
        $audio = $this->audioRepository->findWithoutFail($id);

        if (empty($audio)) {
            Flash::error('Audio not found');

            return redirect(route('audio.index'));
        }

        if ($request->hasFile('file_path') || $request->hasFile('thumbnail')) {

            $file            = $request->file('file_path');
            $file_thumb            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('title'));
            $filename        = str_random(10) . '_' . $myArray[0];
            if($request->hasFile('file_path')) {
                $uploadSuccess = $file->move($destinationPath, $filename . "." . $file->getClientOriginalExtension());
                $audio->file_path = $filename.".".$file->getClientOriginalExtension();
            }
            if($request->hasFile('thumbnail')){
                $uploadSuccessThumb = $file_thumb->move($destinationPath, $filename . "." . $file_thumb->getClientOriginalExtension());
                $audio->thumbnail = $filename.".".$file_thumb->getClientOriginalExtension();

            }

            $audio->title = $request->get('title');
            $audio->audio_category_id = $request->get('audio_category_id');
            $audio->desc = $request->get('desc');

            $audio->save();
            Flash::success('Audio updated successfully.');
            return redirect()->to('admin/audioCategories/audio/'.$audio->audio_category_id);
        }else{

        $audio = $this->audioRepository->update($request->all(), $id);

        Flash::success('Audio updated successfully.');

            return redirect()->to('admin/audioCategories/audio/'.$audio->addio_category_id);
        }
    }

    /**
     * Remove the specified audio from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $audio = $this->audioRepository->findWithoutFail($id);

        if (empty($audio)) {
            Flash::error('Audio not found');

            return redirect(route('audio.index'));
        }

        $this->audioRepository->delete($id);

        Flash::success('Audio deleted successfully.');

        return redirect()->back();
    }

    public function downloadFile($id)
    {
        $document = $this->audioRepository->findWithoutFail($id);
        $myFile = public_path("uploads/".$document->file_path);

        // return var_dump($myFile);

        $headers = ['Content-Type: .mp3'];

        $newName = $document->title.time().'.mp3';


        return response()->download($myFile, $newName, $headers);

    }
}
