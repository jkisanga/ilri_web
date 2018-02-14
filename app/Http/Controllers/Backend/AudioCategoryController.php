<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateAudioCategoryRequest;
use App\Http\Requests\UpdateAudioCategoryRequest;
use App\Models\audio;
use App\Models\AudioCategory;
use App\Repositories\AudioCategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class AudioCategoryController extends Controller
{
    /** @var  AudioCategoryRepository */
    private $audioCategoryRepository;

    public function __construct(AudioCategoryRepository $audioCategoryRepo)
    {
        $this->audioCategoryRepository = $audioCategoryRepo;
    }

    /**
     * Display a listing of the AudioCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->audioCategoryRepository->pushCriteria(new RequestCriteria($request));
        $audioCategories = $this->audioCategoryRepository->all();

        return view('audio_categories.index')
            ->with('audioCategories', $audioCategories);
    }

    /**
     * Show the form for creating a new AudioCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('audio_categories.create');
    }

    /**
     * Store a newly created AudioCategory in storage.
     *
     * @param CreateAudioCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateAudioCategoryRequest $request)
    {
        $input = $request->all();


        if ($request->hasFile('thumbnail')) {
            $file            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('name'));
            $filename        = str_random(10) . '_' . $myArray[0];
            $uploadSuccess   = $file->move($destinationPath, $filename.".".$file->getClientOriginalExtension());
            $category = new AudioCategory();
            $category->title = $request->get('title');
            $category->desc = $request->get('desc');
            $category->thumbnail = $filename.".".$file->getClientOriginalExtension();
            $category->save();

            Flash::success('Audio Category saved successfully.');
            return redirect(route('admin.audioCategories.index'));
        }else {
            $audioCategory = $this->audioCategoryRepository->create($input);
            Flash::success('Audio Category saved successfully.');
            return redirect(route('admin.audioCategories.index'));
        }


    }

    /**
     * Display the specified AudioCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $audioCategory = $this->audioCategoryRepository->findWithoutFail($id);

        if (empty($audioCategory)) {
            Flash::error('Audio Category not found');

            return redirect(route('audioCategories.index'));
        }

        return view('audio_categories.show')->with('audioCategory', $audioCategory);
    }

    /**
     * Show the form for editing the specified AudioCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $audioCategory = $this->audioCategoryRepository->findWithoutFail($id);

        if (empty($audioCategory)) {
            Flash::error('Audio Category not found');

            return redirect(route('audioCategories.index'));
        }

        return view('audio_categories.edit')->with('audioCategory', $audioCategory);
    }

    /**
     * Update the specified AudioCategory in storage.
     *
     * @param  int              $id
     * @param UpdateAudioCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAudioCategoryRequest $request)
    {
        $audioCategory = $this->audioCategoryRepository->findWithoutFail($id);

        if (empty($audioCategory)) {
            Flash::error('Audio Category not found');

            return redirect(route('admin.audioCategories.index'));
        }
        if ($request->hasFile('thumbnail')) {
            $file            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('title'));
            $filename        = str_random(10) . '_' . $myArray[0];
            $uploadSuccess   = $file->move($destinationPath, $filename.".".$file->getClientOriginalExtension());

            $audioCategory->title = $request->get('title');
            $audioCategory->desc = $request->get('desc');
            $audioCategory->thumbnail = $filename.".".$file->getClientOriginalExtension();
            $audioCategory->save();

            Flash::success('Audio Category updated successfully.');

            return redirect(route('admin.audioCategories.index'));
        }else {

            $audioCategory = $this->audioCategoryRepository->update($request->all(), $id);

            Flash::success('Audio Category updated successfully.');

            return redirect(route('admin.audioCategories.index'));
        }
    }

    /**
     * Remove the specified AudioCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $audioCategory = $this->audioCategoryRepository->findWithoutFail($id);

        if (empty($audioCategory)) {
            Flash::error('Audio Category not found');

            return redirect(route('admin.audioCategories.index'));
        }

        $this->audioCategoryRepository->delete($id);

        Flash::success('Audio Category deleted successfully.');

        return redirect(route('admin.audioCategories.index'));
    }

    public function audio($id)
    {
        $category = $this->audioCategoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Data Category not found');

            return redirect(route('admin.audioCategories.index'));
        }

        $values = audio::where('audio_category_id', '=', $id)->get();

        return view('audio.create')->with('category', $category)->with('values', $values);
    }
}
