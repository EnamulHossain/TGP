<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use function PHPUnit\Framework\returnSelf;

class UsersExport implements WithHeadings, ShouldAutoSize, WithStyles, FromCollection, WithMapping
{
    protected $search;

    public function __construct($search)
    {
        $this->search = $search;
    }

    public function collection()
    {
        $query = User::query();

        if ($this->search) {
                $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhere('firstname', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('lastname', 'like', '%' . $this->search . '%');
            }
            return $query->get();
    }


    public function map($users): array
{
    
    return [
        'id' => $users->id,
        'firstname' => $users->firstname,
        'lastname' => $users->lastname,
        'email' => $users->email,
        'cellphone' => $users->cellphone,
        'image' => $users->image,
        'gender' => $users->gender,
        'born_at' => $users->born_at,
    ];
}



    public function headings(): array
    {
        return [
            'ID',
            'firstname',
            'lastname',
            'email',
            'cellphone',
            'image',
            'gender',
            'born_at',
        ];
    }


    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:AD1')->getFont()->setBold(true);
        $sheet->freezePane('A2');
    }
}
