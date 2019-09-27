<?php

namespace App\Components\Post\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Components\Post\Contracts\Repositories\PostRepository;

class PostPolicy
{
    use HandlesAuthorization;

    protected $repository;

    public function __construct(PostRepository $repository)
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
		$post = $this->repository->show($id);

        return $user->id == $post->user_id;
	}
}
