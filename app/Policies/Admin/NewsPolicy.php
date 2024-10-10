<?php

namespace App\Policies\Admin;

use App\Interfaces\Admin\User\UserServiceInterface;
use App\Models\News\News;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class NewsPolicy
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if (
            !$this->userService->hasUserPermission($user->id, 'REPORTER') &&
            !$this->userService->hasUserPermission($user->id, 'IT') &&
            !$this->userService->hasUserPermission($user->id, 'ROOT')
        ) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, News $news): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if (
            !$this->userService->hasUserPermission($user->id, 'REPORTER') &&
            !$this->userService->hasUserPermission($user->id, 'IT') &&
            !$this->userService->hasUserPermission($user->id, 'ROOT')
        ) {
            return false;
        }

        return true;
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, News $news): bool
    {
        // Allow users with specific roles or if they are the author of the news
        return ( $this->userService->hasUserPermission($user->id, 'REPORTER') ||
            $this->userService->hasUserPermission($user->id, 'IT') ||
            $this->userService->hasUserPermission($user->id, 'ROOT') ) &&
            $user->id === $news->author_id; // Assuming you have an author_id field
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, News $news): bool
    {
        // Implement your logic
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, News $news): bool
    {
        // Implement your logic
        return true;
    }
}
