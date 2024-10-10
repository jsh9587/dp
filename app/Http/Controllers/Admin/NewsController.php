<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\StoreNewsRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Interfaces\Admin\News\NewsCategoryServiceInterface;
use App\Interfaces\Admin\News\NewsFlagServiceInterface;
use App\Interfaces\Admin\News\NewsHashTagServiceInterface;
use App\Interfaces\Admin\News\NewsHistoryServiceInterface;
use App\Interfaces\Admin\News\NewsLevelServiceInterface;
use App\Interfaces\Admin\News\NewsServiceInterface;
use App\Interfaces\Admin\News\NewsTypeServiceInterface;
use App\Interfaces\Admin\User\UserPermitServiceInterface;
use App\Models\News\News;
use App\Services\Admin\LockService;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    use AuthorizesRequests;
    private NewsTypeServiceInterface $newsTypeService;
    private NewsLevelServiceInterface $newsLevelService;
    private UserPermitServiceInterface $userPermitService;
    private NewsFlagServiceInterface $newsFlagService;
    private NewsCategoryServiceInterface $newsCategoryService;
    private NewsHashTagServiceInterface $newsHashTagService;
    private NewsServiceInterface $newsService;
    private LockService $lockService;
    private NewsHistoryServiceInterface $newsHistoryService;
    public function __construct(
        NewsTypeServiceInterface $newsTypeService ,
        NewsLevelServiceInterface $newsLevelService,
        UserPermitServiceInterface $userPermitService,
        NewsFlagServiceInterface $newsFlagService,
        NewsCategoryServiceInterface $newsCategoryService,
        NewsHashTagServiceInterface $newsHashTagService,
        LockService $lockService,
        NewsHistoryServiceInterface $newsHistoryService,
        NewsServiceInterface $newsService
    ){
        $this->newsTypeService = $newsTypeService;
        $this->newsLevelService = $newsLevelService;
        $this->userPermitService = $userPermitService;
        $this->newsFlagService = $newsFlagService;
        $this->newsCategoryService = $newsCategoryService;
        $this->newsHashTagService = $newsHashTagService;
        $this->lockService = $lockService;
        $this->newsService = $newsService;
        $this->newsHistoryService = $newsHistoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $mode = $request->mode;
        if ($mode && $mode == 'my') {  // Check if $mode is an object and has a property 'my'
            $data = [
                'author_id' => Auth::user()->id,
            ];
        } else {
            $data = [];
        }

        $news = $this->newsService->findAllPaginate(15,$data);
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data = $this->formLoad();
        return view('admin.news.create',
            compact(
                'data'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreNewsRequest $request)
    {
        // Validate the request
        $validated = $request->validated();

        try {
            // Use a transaction to ensure all operations succeed or fail together
            DB::transaction(function () use ($validated) {
                // Store the news
                $newsId = $this->newsService->store($validated);
                // Store the category
                $this->newsCategoryService->store($newsId, $validated['category_id']);
                // Store the hashtags
                $this->newsHashTagService->store($newsId, $validated['hashtags'] ?? []);
                // Store the history
                $this->newsHistoryService->store($newsId, $validated['content']);
            });

            // Redirect after successful transaction
            return redirect()->route('admin.news')->with('success', '저장완료');

        } catch (QueryException $e) {
            // Handle exception (e.g., log it, show a message)
            return redirect()->back()->withErrors(['error' => 'Failed to create news: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //

        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,News $news)
    {
        $currentUrl = $request->fullUrl();
        $this->lockService->index($currentUrl);

        $data = $this->formLoad();

        return view('admin.news.create',
            compact(
                'data',
                'news'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request, News $news)
    {
        // Authorize the action using the policy
        $this->authorize('update', $news);

        // Proceed with the update logic
        $validated = $request->validated();

        // Use the validated data to update the news item
        try {
            // Use a transaction to ensure all operations succeed or fail together
            DB::transaction(function () use ($validated,$news) {
                // update the news
                $this->newsService->update($news, $validated);
                // update the category
                $this->newsCategoryService->update($news->id, $validated['category_id']);
                // update the hashtag logic : find by news_id -> delete hash tag ->create
                $this->newsHashTagService->update($news->id,$validated);
                // Store the history
                $this->newsHistoryService->store($news->id, $validated['content']);
            });
            // Redirect after successful transaction
            return redirect()->route('admin.news')->with('success', '수정완료');
        } catch (QueryException $e) {
            // Handle exception (e.g., log it, show a message)
            return redirect()->back()->withErrors(['error' => 'Failed to create news: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }

    private function formLoad():array
    {
        return [
            'newsType' => $this->newsTypeService->findAll(),
            'newsLevel' => $this->newsLevelService->findAll(),
            'authors' => $this->userPermitService->findByName('REPORTER'),
            'flag1' => $this->newsFlagService->findByType(1),
            'flag2' => $this->newsFlagService->findByType(2),
            'categories' => $this->newsCategoryService->findAll(),
        ];
    }

    public function getHistory( Request $request )
    {
        $id = $request->id;
        return json_encode($this->newsHistoryService->findById($id));
    }

}
