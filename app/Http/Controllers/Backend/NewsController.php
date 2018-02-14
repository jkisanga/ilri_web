<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\CreateNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Repositories\NewsRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Message\Topics;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use FCM;

class NewsController extends Controller
{
    /** @var  NewsRepository */
    private $newsRepository;

    public function __construct(NewsRepository $newsRepo)
    {
        $this->newsRepository = $newsRepo;
    }

    /**
     * Display a listing of the News.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->newsRepository->pushCriteria(new RequestCriteria($request));
        $news = $this->newsRepository->all();

        return view('news.index')
            ->with('news', $news);
    }

    /**
     * Show the form for creating a new News.
     *
     * @return Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created News in storage.
     *
     * @param CreateNewsRequest $request
     *
     * @return Response
     */
    public function store(CreateNewsRequest $request)
    {
        $input = $request->all();

       // $news = $this->newsRepository->create($input);

        $filename        = '';
        $file   = '';

        if ($request->hasFile('image_path')) {
            $file            = $request->file('image_path');
            $destinationPath = 'uploads/';
            $myArray = explode(' ', $request->get('title'));
            $filename        = str_random(10) . '_' . $myArray[0];
            $uploadSuccess   = $file->move($destinationPath, $filename.".".$file->getClientOriginalExtension());
        }


        $doc = new News();
        $doc->title = $request->get('title');
        $doc->story = $request->get('story');
        $doc->summary = $request->get('summary');
        $doc->published_date = $request->get('published_date');
        $doc->published = $request->get('published');
        $doc->published_by = $request->get('published_by');

        $doc->image_path = $filename.".".$file->getClientOriginalExtension();
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

        Flash::success('saved successfully.');
        //return redirect(route('admin.categories.doc', [$request->get('category_id')]));




        Flash::success('News saved successfully.');

        return redirect(route('admin.news.index'));
    }

    /**
     * Display the specified News.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $news = $this->newsRepository->findWithoutFail($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        return view('news.show')->with('news', $news);
    }

    /**
     * Show the form for editing the specified News.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $news = $this->newsRepository->findWithoutFail($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        return view('news.edit')->with('news', $news);
    }

    /**
     * Update the specified News in storage.
     *
     * @param  int              $id
     * @param UpdateNewsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNewsRequest $request)
    {
        $news = $this->newsRepository->findWithoutFail($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        $news = $this->newsRepository->update($request->all(), $id);

        Flash::success('News updated successfully.');

        return redirect(route('admin.news.index'));
    }

    /**
     * Remove the specified News from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $news = $this->newsRepository->findWithoutFail($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        $this->newsRepository->delete($id);

        Flash::success('News deleted successfully.');

        return redirect(route('admin.news.index'));
    }
}
