<?php
namespace App\Transformers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Themsaid\Transformers\AbstractTransformer;
use App\Models\Comment;

class CommentTransformer extends AbstractTransformer
{
    public function transformModel(Model $item)
    {
        $output = [
            'id' => $item->id,
            'user_id' => $item->user_id,
            'message' => $item->message,
            'created_at' => $item->created_at,
            'updated_at' => $item->updated_at
        ];
        return $output;
    }

}