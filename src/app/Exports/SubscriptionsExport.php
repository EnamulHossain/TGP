<?php

namespace App\Exports;

use App\Models\Subscription;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SubscriptionsExport implements WithHeadings, ShouldAutoSize, WithStyles, FromCollection, WithMapping
{
    protected $search;

    public function __construct($search)
    {
        $this->search = $search;
    }

    public function collection()
    {
        $query = Subscription::query();

        if ($this->search) {
            $query->where('user_name', 'like', '%' . $this->search . '%')
                ->orWhere('order_number', 'like', '%' . $this->search . '%');
        }

        return $query->get();
    }

    public function map($subscriber): array
    {
        return [
            'Full Name' => $subscriber->first_name . ' ' . $subscriber->last_name,
            'Order Number' => $subscriber->order_number,
            'Subtotal' => $subscriber->subtotal,
            'Tax' => $subscriber->tax,
            'Expired At' => $subscriber->expired_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Full Name',
            'Order Number',
            'Subtotal',
            'Tax',
            'Expired At',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:E1')->getFont()->setBold(true);
        $sheet->freezePane('A2');
    }
}
