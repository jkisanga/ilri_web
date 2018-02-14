<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Video;
use App\Repositories\VideoRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VideoController extends Controller
{
    /** @var  VideoRepository */
    private $videoRepository;

    public function __construct(VideoRepository $videoRepo)
    {
        $this->videoRepository = $videoRepo;
    }

    /**
     * Display a listing of the Video.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->videoRepository->pushCriteria(new RequestCriteria($request));
        $videos = $this->videoRepository->all();

        return view('videos.index')
            ->with('videos', $videos);
    }

    /**
     * Show the form for creating a new Video.
     *
     * @return Response
     */
    public function create()
    {
        return view('videos.create');
    }

    /**
     * Store a newly created Video in storage.
     *
     * @param CreateVideoRequest $request
     *
     * @return Response
     */
    public function store(CreateVideoRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $file_thumb            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('title1'));
            $filename = str_random(10) . '_' . $myArray[0];
            $uploadSuccess = $file->move($destinationPath, $filename . "." . $file->getClientOriginalExtension());
            $uploadSuccessThumb   = $file_thumb->move($destinationPath, $filename.".".$file_thumb->getClientOriginalExtension());


            $doc = new Video();
            $doc->title = $request->get('title1');
            $doc->user_id = Auth::id();
            $doc->video_category_id = $request->get('video_category_id');
            $doc->desc = $request->get('desc');
            $doc->file_path = $filename . "." . $file->getClientOriginalExtension();
            $doc->thumbnail = $filename.".".$file_thumb->getClientOriginalExtension();
            $doc->save();
            Flash::success('Video saved successfully.');
            return redirect(route('admin.videoCategories.video', [$request->get('video_category_id')]));
        }else {
            $video = $this->videoRepository->create($input);

            Flash::success('Video saved successfully.');

            return redirect(route('admin.videoCategories.video', [$video->video_category_id]));
        }
    }

    /**
     * Display the specified Video.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }

        return view('videos.show')->with('video', $video);
    }

    /**
     * Show the form for editing the specified Video.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }

        return view('videos.edit')->with('video', $video);
    }

    /**
     * Update the specified Video in storage.
     *
     * @param  int              $id
     * @param UpdateVideoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideoRequest $request)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }
        if ($request->hasFile('file_path') || $request->hasFile('thumbnail')) {

            $file            = $request->file('file_path');
            $file_thumb            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('title1'));
            $filename        = str_random(10) . '_' . $myArray[0];
            if($request->hasFile('file_path')) {
                $uploadSuccess = $file->move($destinationPath, $filename . "." . $file->getClientOriginalExtension());
                $video->file_path = $filename.".".$file->getClientOriginalExtension();
            }
            if($request->hasFile('thumbnail')){
                $uploadSuccessThumb = $file_thumb->move($destinationPath, $filename . "." . $file_thumb->getClientOriginalExtension());
                $video->thumbnail = $filename.".".$file_thumb->getClientOriginalExtension();

            }

            $video->title = $request->get('title1');
            $video->video_category_id = $request->get('audio_category_id');
            $video->desc = $request->get('desc');

            $video->save();
            Flash::success('Video updated successfully.');
            return redirect()->to('admin/videoCategories/video/'.$video->video_category_id);
        }else {
            $video = $this->videoRepository->update($request->all(), $id);

            Flash::success('Video updated successfully.');

            return redirect()->to('admin/videoCategories/video/'.$video->video_category_id);
        }
    }

    /**
     * Remove the specified Video from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $video = $this->videoRepository->findWithoutFail($id);

        if (empty($video)) {
            Flash::error('Video not found');

            return redirect(route('videos.index'));
        }

        $this->videoRepository->delete($id);

        Flash::success('Video deleted successfully.');

        return redirect()->back();
    }

    public function downloadFile($id)
    {
        $document = $this->videoRepository->findWithoutFail($id);
        $myFile = public_path("uploads/".$document->file_path);

        // return var_dump($myFile);

        $headers = ['Content-Type: .mp4'];

        $newName = $document->title.time().'.mp4';


        return response()->download($myFile, $newName, $headers);

    }
}
