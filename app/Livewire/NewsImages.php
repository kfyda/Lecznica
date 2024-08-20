<?php

namespace App\Livewire;

use Livewire\Component;

class NewsImages extends Component
{
    public $news;
    public int $imgIndex = 0;

    public function mount($news)
    {
        if (!$news) abort(404, 'News not found');

        $this->news = $news;
    }

    public function render()
    {
        $news = $this->news;
        $image = null;

        if (!empty($news->image_path) && is_array($news->image_path)) {
            $image = $news->image_path[$this->imgIndex] ?? null;
        }

        return view('livewire.news-images', compact('news', 'image'));
    }

    public function getPreviousImage()
    {
        $arraySize = $this->getArraySize($this->news->image_path);

        if ($arraySize > 0) {
            $this->imgIndex = ($this->imgIndex === 0) ? $arraySize - 1 : $this->imgIndex - 1;
        }
    }

    public function getNextImage()
    {
        $arraySize = $this->getArraySize($this->news->image_path);

        if ($arraySize > 0) {
            $this->imgIndex = ($this->imgIndex === $arraySize - 1) ? 0 : $this->imgIndex + 1;
        }
    }

    public function getArraySize(array $imgArr): int
    {
        return count($imgArr);
    }
}
