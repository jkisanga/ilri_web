<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Repositories\DocumentRepository;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
	
	private $documentRepository;

    public function __construct(DocumentRepository $documentRepo)
    {
        $this->documentRepository = $documentRepo;
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard');
    }
	
	public function documents(){
		 $documents = $this->documentRepository->all();
        return view('frontend.user.documents')
            ->with('documents', $documents);

	}
}
