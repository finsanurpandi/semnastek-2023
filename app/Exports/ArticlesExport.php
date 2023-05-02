<?php

namespace App\Exports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ArticlesExport implements FromArray, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function array(): array
    {
        return Article::getExportArticles();
    }

    public function headings(): array
    {
        return [
            'No',
            'ID_article',
            'Authors',
            'Afiliasi',
            'Reviewer',
            'Scope',
            'Bidang Keahlian',
            'Title',
            // 'Keywords',
            'Email Corresponding',
            'Tanggal Submit',
            'Submission Status',
        ];
    }
}
