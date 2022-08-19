<?php

namespace App\Http\Livewire\Page;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $template, $title, $slug, $about, $source, $cover, $alt_phone, $document_en_url, $document_es_url, $status = false, $lock_docs = false;

    public function render()
    {
        return view('livewire.page.create');
    }

    public function save()
    {
        $this->validate([
            'template' => 'required',
            'title' => 'required',
            'cover' => 'required|file|max:1024|mimes:webp,jpg,png',
        ]);

        try {
            $cover_path = '';
            if ($this->cover) {
                $cover_path = $this->cover->store('covers');
            }
            $document_en_path = '';
            if ($this->document_en_url) {
                $document_en_path = $this->document_en_url->store('documents');
            }
            $document_es_path = '';
            if ($this->document_es_url) {
                $document_es_path = $this->document_es_url->store('documents');
            }
            $page = Page::create([
                'template' => $this->template,
                'title' => $this->title,
                'slug' => str($this->slug)->slug() ?? str($this->title)->slug(),
                'about' => $this->about,
                'status' => ($this->status === true) ? 1 : 0,
                'lock_docs' => ($this->lock_docs === true) ? 1 : 0,
                'source' => str($this->source)->slug(),
                'alt_phone' => $this->alt_phone,
                'cover' => $cover_path,
                'document_en_url' => $document_en_path,
                'document_es_url' => $document_es_path,
            ]);
            $message = "Page successfully saved!";
            $style = "success";
        } catch (\Throwable $th) {
            info($th);
            $message = "Changes were not saved. Contact support for assistance.";
            $style = "danger";
        }
        session()->flash('flash.banner', $message);
        session()->flash('flash.bannerStyle', $style);
        return redirect()->route('admin.page.edit', ['page' => $page->id]);
    }
}
