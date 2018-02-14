<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDocumentAPIRequest;
use App\Http\Requests\API\UpdateDocumentAPIRequest;
use App\Models\Document;
use App\Repositories\DocumentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DocumentController
 * @package App\Http\Controllers\API
 */

class DocumentAPIController extends Controller
{
    /** @var  DocumentRepository */
    private $documentRepository;

    public function __construct(DocumentRepository $documentRepo)
    {
        $this->documentRepository = $documentRepo;
    }

    /**
     * Display a listing of the Document.
     * GET|HEAD /documents
     *
     * @param Request $request
     * @return Response
     */
//    public function getDocByCategoryId(Request $request, $id)
//    {
//        $this->documentRepository->pushCriteria(new RequestCriteria($request));
//        $this->documentRepository->pushCriteria(new LimitOffsetCriteria($request));
//        $documents = $this->documentRepository->where('category_id', '=', $id)->get();
//
//        return response($documents->toArray());
//    }
  public function index(Request $request)
    {
        $this->documentRepository->pushCriteria(new RequestCriteria($request));
        $this->documentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $documents = $this->documentRepository->all();

        return response($documents->toArray());
    }

    /**
     * Store a newly created Document in storage.
     * POST /documents
     *
     * @param CreateDocumentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentAPIRequest $request)
    {
        $input = $request->all();

        $documents = $this->documentRepository->create($input);

        return $this->sendResponse($documents->toArray(), 'Document saved successfully');
    }

    /**
     * Display the specified Document.
     * GET|HEAD /documents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Document $document */
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            return $this->sendError('Document not found');
        }

        return $this->sendResponse($document->toArray(), 'Document retrieved successfully');
    }

    /**
     * Update the specified Document in storage.
     * PUT/PATCH /documents/{id}
     *
     * @param  int $id
     * @param UpdateDocumentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Document $document */
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            return $this->sendError('Document not found');
        }

        $document = $this->documentRepository->update($input, $id);

        return $this->sendResponse($document->toArray(), 'Document updated successfully');
    }

    /**
     * Remove the specified Document from storage.
     * DELETE /documents/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Document $document */
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            return $this->sendError('Document not found');
        }

        $document->delete();

        return $this->sendResponse($id, 'Document deleted successfully');
    }

    public function downloadDoc($file)
    {

        $path = public_path()."/uploads/".$file;

        return response()->file($path ,[
            'Content-Type'=>'application/vnd.android.package-archive',
            'Content-Disposition'=> 'attachment; filename='.$file,
        ]) ;
    }
}
