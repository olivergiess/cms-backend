<?php

namespace App\Components\Blog\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Components\Blog\Contracts\Repositories\BlogRepository;

class BlogPolicy
{
    use HandlesAuthorization;

    protected $repository;

    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(User $user)
    {
        return TRUE;
    }

    public function create(User $user)
    {
        return TRUE;
    }

    public function read(User $user, int $id)
    {
        return $this->owns($user, $id);
    }

    public function update(User $user, int $id)
    {
        return $this->owns($user, $id);
    }

    public function delete(User $user, int $id)
    {
        return $this->owns($user, $id);
    }

    public function owns(User $user, int $id)
    {
        $blog = $this->repository->show($id);

        return $user->id == $blog->user_id;
    }
}
