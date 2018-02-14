<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use App\Repositories\DocumentRepository;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Message\Topics;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use FCM;

class DocumentController extends Controller
{
    /** @var  DocumentRepository */
    private $documentRepository;

    public function __construct(DocumentRepository $documentRepo)
    {
        $this->documentRepository = $documentRepo;
    }

    /**
     * Display a listing of the Document.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->documentRepository->pushCriteria(new RequestCriteria($request));
        $documents = $this->documentRepository->all();

        return view('documents.index')
            ->with('documents', $documents);
    }

    /**
     * Show the form for creating a new Document.
     *
     * @return Response
     */
    public function create()
    {

//        $optionBuilder = new OptionsBuilder();
//        $optionBuilder->setTimeToLive(60*20);
//
//        $notificationBuilder = new PayloadNotificationBuilder('Commodity App');
//        $notificationBuilder->setBody('Hello world')
//            ->setSound('default');
//
//        $dataBuilder = new PayloadDataBuilder();
//        $dataBuilder->addData(['a_data' => 'my_data']);
//
//        $option = $optionBuilder->build();
//        $notification = $notificationBuilder->build();
//        $data = $dataBuilder->build();
//
//        $token = "c9dqYDrFZ0A:APA91bF2mu3wBLVVx7rCR2W-5omlURWWFPwNMN6jsU2avA4QpNGjorbpfZnYfQT_HZYn_I6TmgAJw_tSnoFA31nls3YUnaFL9I9mAHxrHHN9inHvG8EDAvbeSyHzjMQF6R-3wvSrX_9-";
//
//        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);
//
//        $downstreamResponse->numberSuccess();
//        $downstreamResponse->numberFailure();
//        $downstreamResponse->numberModification();
//
////return Array - you must remove all this tokens in your database
//        $downstreamResponse->tokensToDelete();
//
////return Array (key : oldToken, value : new token - you must change the token in your database )
//        $downstreamResponse->tokensToModify();
//
////return Array - you should try to resend the message to the tokens in the array
//        $downstreamResponse->tokensToRetry();
//
//// return Array (key:token, value:errror)
//       // return var_dump($topicResponse->isSuccess());
//        //return view('documents.create');



    }

    /**
     * Store a newly created Document in storage.
     *
     * @param CreateDocumentRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentRequest $request)
    {
        $input = $request->all();

        $destinationPath = '';
        $filename        = '';
        $thumbnail_name   = '';

        if ($request->hasFile('file_path')) {
            $file            = $request->file('file_path');
            $file_thumb            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('title'));
            $filename        = str_random(10) . '_' . $myArray[0];
            $uploadSuccess   = $file->move($destinationPath, $filename.".".$file->getClientOriginalExtension());
            $uploadSuccessThumb   = $file_thumb->move($destinationPath, $filename.".".$file_thumb->getClientOriginalExtension());
        }


        $doc = new Document();
        $doc->title = $request->get('title');
        $doc->category_id = $request->get('category_id');
        $doc->summary = $request->get('summary');
        $doc->file_path = $filename.".".$file->getClientOriginalExtension();
        $doc->thumbnail = $filename.".".$file_thumb->getClientOriginalExtension();
        $doc->save();


        $notificationBuilder = new PayloadNotificationBuilder('new document uploaded');
        $notificationBuilder->setBody($request->get('title'))
            ->setSound('default');

        $notification = $notificationBuilder->build();

        $topic = new Topics();
        $topic->topic('news');

        $topicResponse = FCM::sendToTopic($topic, null, $notification, null);

        $topicResponse->isSuccess();
        $topicResponse->shouldRetry();
        $topicResponse->error();

        Flash::success('Document saved successfully.');
        return redirect(route('admin.categories.doc', [$request->get('category_id')]));
    }

    /**
     * Display the specified Document.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('admin.documents.index'));
        }

        return view('admin.documents.show')->with('document', $document);
    }

    /**
     * Show the form for editing the specified Document.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('documents.index'));
        }

        return view('documents.edit')->with('document', $document);
    }

    /**
     * Update the specified Document in storage.
     *
     * @param  int              $id
     * @param UpdateDocumentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentRequest $request)
    {
        $document = $this->documentRepository->findWithoutFail($id);
        $doc =  $this->documentRepository->findWithoutFail($id);
        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('admin.documents.index'));
        }

        $input = $request->all();

        $destinationPath = '';
        $filename        = '';

        if ($request->hasFile('file_path') || $request->hasFile('thumbnail')) {
            $file            = $request->file('file_path');
            $file_thumb            = $request->file('thumbnail');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('title'));
            $filename        = str_random(10) . '_' . $myArray[0];
            if($request->hasFile('file_path')) {
                $uploadSuccess = $file->move($destinationPath, $filename . "." . $file->getClientOriginalExtension());
                $doc->file_path = $filename.".".$file->getClientOriginalExtension();
            }
            if($request->hasFile('thumbnail')){
            $uploadSuccessThumb = $file_thumb->move($destinationPath, $filename . "." . $file_thumb->getClientOriginalExtension());
                $doc->thumbnail = $filename.".".$file_thumb->getClientOriginalExtension();
        }

            $doc->title = $request->get('title');
            $doc->category_id = $request->get('category_id');
            $doc->summary = $request->get('summary');


             $doc->save();
			 
		$notificationBuilder = new PayloadNotificationBuilder('document updated');
        $notificationBuilder->setBody($request->get('title'))
            ->setSound('default');

        $notification = $notificationBuilder->build();

        $topic = new Topics();
        $topic->topic('news');

        $topicResponse = FCM::sendToTopic($topic, null, $notification, null);

        $topicResponse->isSuccess();
        $topicResponse->shouldRetry();
        $topicResponse->error();
			 
            Flash::success('Document updated successfully.');
            return redirect()->to('admin/categories/doc/'.$document->category_id);
        }else{




            $document = $this->documentRepository->update($request->all(), $id);
			
			
			
			$notificationBuilder = new PayloadNotificationBuilder('document updated');
        $notificationBuilder->setBody($document->title)
            ->setSound('default');

        $notification = $notificationBuilder->build();

        $topic = new Topics();
        $topic->topic('news');

        $topicResponse = FCM::sendToTopic($topic, null, $notification, null);

        $topicResponse->isSuccess();
        $topicResponse->shouldRetry();
        $topicResponse->error();
			
			
            Flash::success('Document updated successfully.');

            return redirect()->to('admin/categories/doc/'.$document->category_id);
        }
        }



    /**
     * Remove the specified Document from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);

        if (empty($document)) {
            Flash::error('Document not found');

            return redirect(route('admin.documents.index'));
        }

        $this->documentRepository->delete($id);

        Flash::success('Document deleted successfully.');

        return redirect()->back();
    }



    public function downloadFile($id)
    {
        $document = $this->documentRepository->findWithoutFail($id);
        $myFile = public_path("uploads/".$document->file_path);

       // return var_dump($myFile);

        $headers = ['Content-Type: application/pdf'];

        $newName = 'itsolutionstuff-pdf-file-'.time().'.pdf';


        return response()->download($myFile, $newName, $headers);

    }
}
