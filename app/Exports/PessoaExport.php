<?php

namespace App\Exports;

use App\Pessoa;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PessoaExport implements FromCollection, WithMapping, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pessoa::where([
            'status' => 'Ativo'
        ])->get();
    }

    //Coluns add
    public function map($irmas): array
    {
        return [
            $irmas->id,
            $irmas->name,            
            $irmas->congregacao->name,
            date("m", strtotime($irmas->data_nascimento)),
            $irmas->situacao,
        ];
    }

    //Description table
    public function headings(): array
    {
        return [
            '#',
            'Nome Completo',
            'Congregação',
            'Mês',
            'Situação',
        ];
    }

    //Title
    public function title(): string
    {
        return 'Lista de Irmãs';
    }

}
