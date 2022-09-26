<?php

namespace App\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait Imageable
{
    public function imageUrl(string $column = 'image'): ?string
    {
        $imageName = $this->getImageNameFromColumn($column);

        return $imageName === null
            ? "https://ui-avatars.com/api/?name={$column}&color=7F9CF5&background=EBF4FF"
            : Storage::url("{$this->uploadFolder()}/{$imageName}"); 
    }

    public function deleteImage(string $column = 'image'): void
    {
        $imageName = $this->getImageNameFromColumn($column);

        if ($imageName !== null) {
            Storage::delete("{$this->uploadFolder()}/{$imageName}");
        }
    }

    private function getImageNameFromColumn(string $column): ?string
    {
        if (!Str::contains($column, '->')) {
            return $this->{$column};
        }

        $jsonColumnName = Str::before($column, '->');
        $columnKey = Str::after($column, '->');

        return Arr::get($this->{$jsonColumnName}, $columnKey);
    }
}
