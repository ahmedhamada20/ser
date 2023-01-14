<?php

namespace App\Exports;

use App\Models\AnswerQuiz;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AnswerQuizsExport implements  FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
    public function collection()
    {
        return AnswerQuiz::orderBy('id', 'DESC')->get(['name','quz','text']);
    }
    
    
     public function map($customers): array
    {
        return [
            $customers->name,
            $customers->status(),
            $customers->text,
        ];
    }


     public function headings(): array
    {
        return [
            'السوال',
            'الاجابه',
            'اسم الشخص',
         
        ];
    }
}
