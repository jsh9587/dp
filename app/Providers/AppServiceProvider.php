<?php
namespace App\Providers;

use App\Interfaces\Admin\News\NewsAuthorRepositoryInterface;
use App\Interfaces\Admin\News\NewsAuthorServiceInterface;
use App\Interfaces\Admin\News\NewsCategoryRepositoryInterface;
use App\Interfaces\Admin\News\NewsCategoryServiceInterface;
use App\Interfaces\Admin\News\NewsFlagRepositoryInterface;
use App\Interfaces\Admin\News\NewsFlagServiceInterface;
use App\Interfaces\Admin\News\NewsHashTagRepositoryInterface;
use App\Interfaces\Admin\News\NewsHashTagServiceInterface;
use App\Interfaces\Admin\News\NewsHistoryRepositoryInterface;
use App\Interfaces\Admin\News\NewsHistoryServiceInterface;
use App\Interfaces\Admin\News\NewsLevelRepositoryInterface;
use App\Interfaces\Admin\News\NewsLevelServiceInterface;
use App\Interfaces\Admin\News\NewsRepositoryInterface;
use App\Interfaces\Admin\News\NewsServiceInterface;
use App\Interfaces\Admin\News\NewsTypeRepositoryInterface;
use App\Interfaces\Admin\News\NewsTypeServiceInterface;
use App\Interfaces\Admin\User\UserPermitRepositoryInterface;
use App\Interfaces\Admin\User\UserPermitServiceInterface;
use App\Interfaces\Admin\User\UserRepositoryInterface;
use App\Interfaces\Admin\User\UserServiceInterface;
use App\Interfaces\Auth\AuthRepositoryInterface;
use App\Models\News\News;
use App\Policies\Admin\NewsPolicy;
use App\Repositories\Admin\News\NewsCategoryRepository;
use App\Repositories\Admin\News\NewsFlagRepository;
use App\Repositories\Admin\News\NewsHashTagRepository;
use App\Repositories\Admin\News\NewsHistoryRepository;
use App\Repositories\Admin\News\NewsLevelRepository;
use App\Repositories\Admin\News\NewsRepository;
use App\Repositories\Admin\News\NewsTypeRepository;
use App\Repositories\Admin\User\UserPermitRepository;
use App\Repositories\Admin\User\UserRepository;
use App\Repositories\AuthRepository;
use App\Services\Admin\News\NewsCategoryService;
use App\Services\Admin\News\NewsFlagService;
use App\Services\Admin\News\NewsHashTagService;
use App\Services\Admin\News\NewsHistoryService;
use App\Services\Admin\News\NewsLevelService;
use App\Services\Admin\News\NewsService;
use App\Services\Admin\News\NewsTypeService;
use App\Services\Admin\User\UserPermitService;
use App\Services\Admin\User\UserService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserPermitRepositoryInterface::class, UserPermitRepository::class);
        $this->app->bind(UserPermitServiceInterface::class, UserPermitService::class);
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
        $this->app->bind(NewsServiceInterface::class, NewsService::class);
        $this->app->bind(NewsTypeRepositoryInterface::class, NewsTypeRepository::class);
        $this->app->bind(NewsTypeServiceInterface::class, NewsTypeService::class);
        $this->app->bind(NewsLevelServiceInterface::class, NewsLevelService::class);
        $this->app->bind(NewsLevelRepositoryInterface::class, NewsLevelRepository::class);
        $this->app->bind(NewsFlagRepositoryInterface::class, NewsFlagRepository::class);
        $this->app->bind(NewsFlagServiceInterface::class, NewsFlagService::class);
        $this->app->bind(NewsCategoryRepositoryInterface::class, NewsCategoryRepository::class);
        $this->app->bind(NewsCategoryServiceInterface::class, NewsCategoryService::class);
        $this->app->bind(NewsHashTagRepositoryInterface::class, NewsHashTagRepository::class);
        $this->app->bind(NewsHashTagServiceInterface::class, NewsHashTagService::class);
        $this->app->bind(NewsHistoryRepositoryInterface::class, NewsHistoryRepository::class);
        $this->app->bind(NewsHistoryServiceInterface::class, NewsHistoryService::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Gate::policy(News::class, NewsPolicy::class);
    }
}
