<?php

namespace App\Traits\Models;

trait HasThumbnail
{
    abstract protected function thumbnailDir(): string;

    public function makeThumbnail(
        string $size,
        string $path,
        string $method = 'resize'
    ): string {
        return route('thumbnail', [
            'size' => $size,
            'dir' => $this->thumbnailDir(),
            'method' => $method,
            'file' => \File::basename($this->{$this->thumbnailColumn()}),
            //'file' => $path,
        ]);
    }

    protected function thumbnailColumn(): string
    {
        return 'thumbnail';
    }
}
