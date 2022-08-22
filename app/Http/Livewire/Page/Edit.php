<?php

namespace App\Http\Livewire\Page;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $template, $title, $slug, $about, $source, $cover, $alt_phone, $document_en_url, $document_es_url, $status = false, $lock_docs = false;

    public function mount(Page $page)
    {
        $this->page = $page;
        $this->template = $this->page->template;
        $this->title = $this->page->title;
        $this->slug = $this->page->slug;
        $this->about = $this->page->about;
        $this->status = ($this->page->status == 1) ? true : false;
        $this->lock_docs = ($this->page->lock_docs == 1) ? true : false;
        $this->source = $this->page->source;
        $this->alt_phone = $this->page->alt_phone;
    }

    public function render()
    {
        dd(
            phpinfo()
        );
        return view('livewire.page.edit', [
            'questions' => $this->page->questions
        ]);
    }

    public function save()
    {
        $this->validate([
            'template' => 'required',
            'title' => 'required',
        ]);

        try {
            $cover_path = $this->page->cover;
            if ($this->cover) {
                $cover_path = $this->cover->store('covers');
            }
            $document_en_path = $this->page->document_en_url;
            if ($this->document_en_url) {
                $document_en_path = $this->document_en_url->store('documents');
            }
            $document_es_path = $this->page->document_es_url;
            if ($this->document_es_url) {
                $document_es_path = $this->document_es_url->store('documents');
            }
            $this->page->update([
                'template' => $this->template,
                'title' => $this->title,
                'slug' => str($this->slug)->slug() ?? str($this->title)->slug(),
                'source' => str($this->source)->slug(),
                'about' => $this->about,
                'status' => ($this->status == true) ? 1 : 0,
                'lock_docs' => ($this->lock_docs == true) ? 1 : 0,
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
        return redirect()->route('admin.page.edit', ['page' => $this->page->id]);
    }
}
