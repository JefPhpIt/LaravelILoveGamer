<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class game extends Model
{
    use HasFactory;

    public static function deleteGame($gameId) : bool
    {
        $game = self::find($gameId);

        if ($game) {
            return $game->delete();
        }

        return false;
    }
}
