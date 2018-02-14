<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateVideoCategoryRequest;
use App\Http\Requests\UpdateVideoCategoryRequest;
use App\Models\Video;
use App\Models\VideoCategory;
use App\Repositories\VideoCategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class VideoCategoryController extends Controller
{
    /** @var  VideoCategoryRepository */
    private $videoCategoryRepository;

    public function __construct(VideoCategoryRepository $videoCategoryRepo)
    {
        $this->videoCategoryRepository = $videoCategoryRepo;
    }

    /**
     * Display a listing of the VideoCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->videoCategoryRepository->pushCriteria(new RequestCriteria($request));
        $videoCategories = $this->videoCategoryRepository->all();

        return view('video_categories.index')
            ->with('videoCategories', $videoCategories);
    }

    /**
     * Show the form for creating a new VideoCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('video_categories.create');
    }

    /**
     * Store a newly created VideoCategory in storage.
     *
     * @param CreateVideoCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateVideoCategoryRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('thumbnail')) {
            $file            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('name'));
            $filename        = str_random(10) . '_' . $myArray[0];
            $uploadSuccess   = $file->move($destinationPath, $filename.".".$file->getClientOriginalExtension());
            $category = new VideoCategory();
            $category->title = $request->get('title');
            $category->desc = $request->get('desc');
            $category->thumbnail = $filename.".".$file->getClientOriginalExtension();
            $category->save();

            Flash::success('Video Category saved successfully.');

            return redirect(route('admin.videoCategories.index'));
        }else {

            $videoCategory = $this->videoCategoryRepository->create($input);

            Flash::success('Video Category saved successfully.');

            return redirect(route('admin.videoCategories.index'));
        }
    }

    /**
     * Display the specified VideoCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $videoCategory = $this->videoCategoryRepository->findWithoutFail($id);

        if (empty($videoCategory)) {
            Flash::error('Video Category not found');

            return redirect(route('videoCategories.index'));
        }

        return view('video_categories.show')->with('videoCategory', $videoCategory);
    }

    /**
     * Show the form for editing the specified VideoCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $videoCategory = $this->videoCategoryRepository->findWithoutFail($id);

        if (empty($videoCategory)) {
            Flash::error('Video Category not found');

            return redirect(route('videoCategories.index'));
        }

        return view('video_categories.edit')->with('videoCategory', $videoCategory);
    }

    /**
     * Update the specified VideoCategory in storage.
     *
     * @param  int              $id
     * @param UpdateVideoCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVideoCategoryRequest $request)
    {
        $videoCategory = $this->videoCategoryRepository->findWithoutFail($id);

        if (empty($videoCategory)) {
            Flash::error('Video Category not found');

            return redirect(route('videoCategories.index'));
        }
        if ($request->hasFile('thumbnail')) {
            $file            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('title'));
            $filename        = str_random(10) . '_' . $myArray[0];
            $uploadSuccess   = $file->move($destinationPath, $filename.".".$file->getClientOriginalExtension());

            $videoCategory->title = $request->get('title');
            $videoCategory->desc = $request->get('desc');
            $videoCategory->thumbnail = $filename.".".$file->getClientOriginalExtension();
            $videoCategory->save();

            Flash::success('Video Category updated successfully.');

            return redirect(route('admin.videoCategories.index'));
        }else {

            $videoCategory = $this->videoCategoryRepository->update($request->all(), $id);

            Flash::success('Video Category updated successfully.');

            return redirect(route('admin.videoCategories.index'));
        }
    }

    /**
     * Remove the specified VideoCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $videoCategory = $this->videoCategoryRepository->findWithoutFail($id);

        if (empty($videoCategory)) {
            Flash::error('Video Category not found');

            return redirect(route('videoCategories.index'));
        }

        $this->videoCategoryRepository->delete($id);

        Flash::success('Video Category deleted successfully.');

        return redirect(route('videoCategories.index'));
    }


    public function video($id)
    {
        $category = $this->videoCategoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Data Category not found');

            return redirect(route('admin.videoCategories.index'));
        }

        $values = Video::where('video_category_id', '=', $id)->get();

        return view('videos.create')->with('category', $category)->with('values', $values);
    }
}
