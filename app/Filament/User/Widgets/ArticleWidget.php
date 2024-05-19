<?php

namespace App\Filament\User\Widgets;

use Filament\Widgets\Widget;

class ArticleWidget extends Widget
{
    protected static string $view = 'filament.user.widgets.article-widget';

    protected int | string | array $columnSpan = 'full';
}
