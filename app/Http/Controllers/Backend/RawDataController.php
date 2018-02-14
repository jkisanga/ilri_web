<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateRawDataRequest;
use App\Http\Requests\UpdateRawDataRequest;
use App\Models\RawData;
use App\Repositories\RawDataRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RawDataController extends Controller
{
    /** @var  RawDataRepository */
    private $rawDataRepository;

    public function __construct(RawDataRepository $rawDataRepo)
    {
        $this->rawDataRepository = $rawDataRepo;
    }

    /**
     * Display a listing of the RawData.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rawDataRepository->pushCriteria(new RequestCriteria($request));
        $rawDatas = $this->rawDataRepository->all();

        return view('raw_datas.index')
            ->with('rawDatas', $rawDatas);
    }

    /**
     * Show the form for creating a new RawData.
     *
     * @return Response
     */
    public function create()
    {
        return view('raw_datas.create');
    }

    /**
     * Store a newly created RawData in storage.
     *
     * @param CreateRawDataRequest $request
     *
     * @return Response
     */
    public function store(CreateRawDataRequest $request)
    {
        $input = $request->all();


        $filename        = '';

        if ($request->hasFile('file_path')) {
            $file            = $request->file('file_path');
            $file_thumb            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('title'));
            $filename        = str_random(10) . '_' . $myArray[0];
            $uploadSuccess   = $file->move($destinationPath, $filename.".".$file->getClientOriginalExtension());
           // $uploadSuccessThumb   = $file_thumb->move($destinationPath, $filename.".".$file_thumb->getClientOriginalExtension());
           if($request->hasFile('thumbnail')){
            $uploadSuccessThumb   = $file_thumb->move($destinationPath, $filename.".".$file_thumb->getClientOriginalExtension());
			}
        }

        $doc = new RawData();
        $doc->title = $request->get('title');
        $doc->data_category_id = $request->get('data_category_id');
        $doc->summary = $request->get('summary');
        $doc->file_path = $filename.".".$file->getClientOriginalExtension();
        if($request->hasFile('thumbnail')){
        $doc->thumbnail = $filename.".".$file_thumb->getClientOriginalExtension();
        }else{
        $doc->thumbnail = "";
        }
        $doc->save();


       // $rawData = $this->rawDataRepository->create($doc);

        Flash::success('Raw Data saved successfully.');



        return redirect(route('admin.dataCategories.data', [$request->get('data_category_id')]));
    }

    /**
     * Display the specified RawData.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rawData = $this->rawDataRepository->findWithoutFail($id);

        if (empty($rawData)) {
            Flash::error('Raw Data not found');

            return redirect(route('rawDatas.index'));
        }

        return view('raw_datas.show')->with('rawData', $rawData);
    }

    /**
     * Show the form for editing the specified RawData.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rawData = $this->rawDataRepository->findWithoutFail($id);

        if (empty($rawData)) {
            Flash::error('Raw Data not found');

            return redirect(route('rawDatas.index'));
        }

        return view('raw_datas.edit')->with('rawData', $rawData);
    }

    /**
     * Update the specified RawData in storage.
     *
     * @param  int              $id
     * @param UpdateRawDataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRawDataRequest $request)
    {
        $rawData = $this->rawDataRepository->findWithoutFail($id);
        if (empty($rawData)) {
            Flash::error('Raw Data not found');

            return redirect(route('admin.rawDatas.index'));
        }

        $input = $request->all();


        $filename        = '';

        if ($request->hasFile('file_path') || $request->file('thumbnail')) {
            $file            = $request->file('file_path');
            $file_thumb            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('title'));
            $filename        = str_random(10) . '_' . $myArray[0];
            if($request->file('file_path')) {
                $uploadSuccess = $file->move($destinationPath, $filename . "." . $file->getClientOriginalExtension());
                $rawData->file_path = $filename . "." . $file->getClientOriginalExtension();
            }
            if($request->file('thumbnail')) {
                $uploadSuccessThumb = $file_thumb->move($destinationPath, $filename . "." . $file_thumb->getClientOriginalExtension());
                $rawData->thumbnail = $filename . "." . $file_thumb->getClientOriginalExtension();
            }

            $rawData->title = $request->get('title');
            $rawData->data_category_id = $request->get('data_category_id');
            $rawData->summary = $request->get('summary');
            $rawData->save();

            Flash::success('Raw Data updated successfully.');
            return redirect()->to('admin/dataCategories/data/'.$rawData->data_category_id);

        }else{

            $rawData = $this->rawDataRepository->update($request->all(), $id);
            Flash::success('Raw Data updated successfully.');
            return redirect()->to('admin/dataCategories/data/'.$rawData->data_category_id);
        }

    }

    /**
     * Remove the specified RawData from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rawData = $this->rawDataRepository->findWithoutFail($id);

        if (empty($rawData)) {
            Flash::error('Raw Data not found');

            return redirect(route('rawDatas.index'));
        }

        $this->rawDataRepository->delete($id);

        Flash::success('Raw Data deleted successfully.');

        return redirect()->back();
    }


    public function downloadFile($id)
    {

        $rawData = $this->rawDataRepository->findWithoutFail($id);
        $myFile = public_path("uploads/".$rawData->file_path);

        $headers = ['Content-Type: application/pdf'];

        $newName = $rawData->title.'_'.time().'.pdf';


        return response()->download($myFile, $newName, $headers);

    }
}
