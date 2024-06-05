<?php

namespace Modules\Core\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BaseModel extends Model
{
    use HasFactory;

    public function fillByAttr($attributes, $input)
    {
        if (!empty($attributes)) {
            foreach ($attributes as $item) {
                $this->$item = isset($input[$item]) ? ($input[$item]) : null;
            }
        }
    }

    public function genSlug($string, $number = 0)
    {
        $slug = Str::slug($string . ($number > 1 ? $number : ''));
        $find = static::query()->where('slug', $slug)->first();
        if (!$find) return $slug;
        return $this->genSlug($string, ($number + 1));
    }



}
