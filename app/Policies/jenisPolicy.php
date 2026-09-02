<?php

namespace App\Policies;

use App\Models\Jenis;
use App\Models\User;

class JenisPolicy
{
    public function update(User $user, Jenis $jenis): bool
    {
        return true; // Siapa saja bisa update
    }

    public function delete(User $user, Jenis $jenis): bool
    {
        return true; // Siapa saja bisa hapus
    }
}