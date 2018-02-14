<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateDataCategoryRequest;
use App\Http\Requests\UpdateDataCategoryRequest;
use App\Models\RawData;
use App\Models\DataCategory;
use App\Repositories\DataCategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class DataCategoryController extends Controller
{
    /** @var  DataCategoryRepository */

    private $dataCategoryRepository;

    public function __construct(DataCategoryRepository $dataCategoryRepo)
    {
        $this->dataCategoryRepository = $dataCategoryRepo;
    }

    /**
     * Display a listing of the DataCategory.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->dataCategoryRepository->pushCriteria(new RequestCriteria($request));
        $dataCategories = $this->dataCategoryRepository->all();

        return view('data_categories.index')
            ->with('dataCategories', $dataCategories);
    }

    /**
     * Show the form for creating a new DataCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('data_categories.create');
    }

    /**
     * Store a newly created DataCategory in storage.
     *
     * @param CreateDataCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateDataCategoryRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('thumbnail')) {
            $file            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('name'));
            $filename        = str_random(10) . '_' . $myArray[0];
            $uploadSuccess   = $file->move($destinationPath, $filename.".".$file->getClientOriginalExtension());
            $category = new DataCategory();
            $category->name = $request->get('name');
            $category->desc = $request->get('desc');
            $category->thumbnail = $filename.".".$file->getClientOriginalExtension();
            $category->save();

            Flash::success('Category saved successfully.');

            return redirect(route('admin.dataCategories.index'));
        }else {
            $dataCategory = $this->dataCategoryRepository->create($input);

            Flash::success('Data Category saved successfully.');

            return redirect(route('admin.dataCategories.index'));
        }
    }

    /**
     * Display the specified DataCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dataCategory = $this->dataCategoryRepository->findWithoutFail($id);

        if (empty($dataCategory)) {
            Flash::error('Data Category not found');

            return redirect(route('dataCategories.index'));
        }

        return view('data_categories.show')->with('dataCategory', $dataCategory);
    }

    /**
     * Show the form for editing the specified DataCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dataCategory = $this->dataCategoryRepository->findWithoutFail($id);

        if (empty($dataCategory)) {
            Flash::error('Data Category not found');

            return redirect(route('dataCategories.index'));
        }

        return view('data_categories.edit')->with('dataCategory', $dataCategory);
    }

    /**
     * Update the specified DataCategory in storage.
     *
     * @param  int              $id
     * @param UpdateDataCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDataCategoryRequest $request)
    {
        $dataCategory = $this->dataCategoryRepository->findWithoutFail($id);

        if (empty($dataCategory)) {
            Flash::error('Data Category not found');

            return redirect(route('admin.dataCategories.index'));
        }
        if ($request->hasFile('thumbnail')) {
            $file            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('name'));
            $filename        = str_random(10) . '_' . $myArray[0];
            $uploadSuccess   = $file->move($destinationPath, $filename.".".$file->getClientOriginalExtension());

            $dataCategory->name = $request->get('name');
            $dataCategory->desc = $request->get('desc');
            $dataCategory->thumbnail = $filename.".".$file->getClientOriginalExtension();
            $dataCategory->save();

            Flash::success('Category saved successfully.');

            return redirect(route('admin.dataCategories.index'));
        }else {
            $dataCategory = $this->dataCategoryRepository->update($request->all(), $id);

            Flash::success('Data Category updated successfully.');

            return redirect(route('admin.dataCategories.index'));
        }
    }

    /**
     * Remove the specified DataCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dataCategory = $this->dataCategoryRepository->findWithoutFail($id);

        if (empty($dataCategory)) {
            Flash::error('Data Category not found');

            return redirect(route('dataCategories.index'));
        }

        $this->dataCategoryRepository->delete($id);

        Flash::success('Data Category deleted successfully.');

        return redirect(route('admin.dataCategories.index'));
    }

    public function data($id)
    {
        $dataCategory = $this->dataCategoryRepository->findWithoutFail($id);

        if (empty($dataCategory)) {
            Flash::error('Data Category not found');

            return redirect(route('admin.dataCategories.index'));
        }

        $rawDatas = RawData::where('data_category_id', '=', $id)->get();

        return view('raw_datas.create')->with('dataCategory', $dataCategory)->with('rawDatas', $rawDatas);
    }
}
