<?php

namespace App\Filament\User\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleDetail extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.user.pages.article-detail';

    protected static ?string $slug = '/articles/{article}';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = '';

    public string $markdownContent;

    public function mount($article)
    {
        $file = Storage::get("$article.md");

        if (!$file) {
            abort(404, 'File not found');
        }
        $this->markdownContent = Str::of($file)->markdown();
    }
}
