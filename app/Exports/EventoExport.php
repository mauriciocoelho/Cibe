<?php

namespace App\Exports;

use App\EventoDetails;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class EventoExport implements FromCollection, WithMapping, WithHeadings, WithTitle, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return EventoDetails::where([
            'status' => 'Ativo'
        ])->get();
    }

    //Coluns add
    public function map($evento): array
    {
        return [
            $evento->id,
            $evento->pessoa->name,            
            $evento->tipo,
            $evento->status_evento,
        ];
    }

    //Description table
    public function headings(): array
    {
        return [
            '#',
            'Nome Completo',
            'Tipo',
            'Status',
        ];
    }

    //Title
    public function title(): string
    {
        return 'Relatório de Evento';
    }
}
