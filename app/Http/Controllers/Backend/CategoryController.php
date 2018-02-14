<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\Document;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CategoryController extends Controller
{
    /** @var  CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepo)
    {
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Category.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->categoryRepository->pushCriteria(new RequestCriteria($request));
        $categories = $this->categoryRepository->all();

        return view('categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();
        $filename        = '';

        if ($request->hasFile('thumbnail')) {
            $file            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('name'));
            $filename        = str_random(10) . '_' . $myArray[0];
            $uploadSuccess   = $file->move($destinationPath, $filename.".".$file->getClientOriginalExtension());
            $category = new Category();
            $category->name = $request->get('name');
            $category->desc = $request->get('desc');
            $category->thumbnail = $filename.".".$file->getClientOriginalExtension();
            $category->save();

            Flash::success('Category saved successfully.');

            return redirect(route('admin.categories.index'));
        }else {
            $category = $this->categoryRepository->create($input);

            Flash::success('Category saved successfully.');

            return redirect(route('admin.categories.index'));
        }
    }

    /**
     * Display the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  int              $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('admin.categories.index'));
        }

        if ($request->hasFile('thumbnail')) {
            $file            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('name'));
            $filename        = str_random(10) . '_' . $myArray[0];
            $uploadSuccess   = $file->move($destinationPath, $filename.".".$file->getClientOriginalExtension());

            $category->name = $request->get('name');
            $category->desc = $request->get('desc');
            $category->thumbnail = $filename.".".$file->getClientOriginalExtension();
            $category->save();

            Flash::success('Category saved successfully.');

            return redirect(route('admin.categories.index'));
        }else {

            $category = $this->categoryRepository->update($request->all(), $id);

            Flash::success('Category updated successfully.');

            return redirect(route('admin.categories.index'));
        }
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Category not found');

            return redirect(route('admin.categories.index'));
        }

        $this->categoryRepository->delete($id);

        Flash::success('Category deleted successfully.');

        return redirect(route('admin.categories.index'));
    }


    public function doc($id)
    {
        $category = $this->categoryRepository->findWithoutFail($id);

        if (empty($category)) {
            Flash::error('Data Category not found');

            return redirect(route('admin.dataCategories.index'));
        }

        $documents = Document::where('category_id', '=', $id)->get();

        return view('documents.create')->with('category', $category)->with('documents', $documents);
    }
}
