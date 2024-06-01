<?php

namespace App\Exports;

use App\Models\Subscriber;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use function PHPUnit\Framework\returnSelf;

class SubscriberExport implements WithHeadings, ShouldAutoSize, WithStyles, FromCollection, WithMapping
{
    protected $search;

    public function __construct($search)
    {
        $this->search = $search;
    }


    public function collection()
    {
        $query = Subscriber::query();

        if ($this->search) {
                $query->where('id', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('company', 'like', '%' . $this->search . '%')
                    ->orWhere('city', 'like', '%' . $this->search . '%')
                    ->orWhere('state', 'like', '%' . $this->search . '%')
                    ->orWhere('postal_code', 'like', '%' . $this->search . '%')
                    ->orWhere('order_key', 'like', '%' . $this->search . '%')
                    ->orWhere('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%');
            }
            return $query->get();
    }



    public function map($subscriber): array
    {
        return [
            'id' => $subscriber->id,
            'site_id' => $subscriber->site_id,
            'user_id' => $subscriber->user_id,
            'first_name' => $subscriber->first_name,
            'last_name' => $subscriber->last_name,
            'email' => $subscriber->email,
            'company' => $subscriber->company,
            'address_line_1' => $subscriber->address_line_1,
            'address_line_2' => $subscriber->address_line_2,
            'city' => $subscriber->city,
            'postal_code' => $subscriber->postal_code,
            'state' => $subscriber->state,
            'order_key' => $subscriber->order_key,
            'customer_id' => $subscriber->customer_id,
            'status' => $subscriber->status,
            'is_active' => $subscriber->is_active,
            'created_at' => $subscriber->created_at,
            'updated_at' => $subscriber->updated_at,
            'deleted_at' => $subscriber->deleted_at,
            'created_by' => $subscriber->created_by,
            'updated_by' => $subscriber->updated_by,
            'deleted_by' => $subscriber->deleted_by,
            'is_imported' => $subscriber->is_imported,
        ];
    }
    



    public function headings(): array
    {
        return [
            'id',
            'site_id',
            'user_id',
            'first_name',
            'last_name',
            'email',
            'company',
            'address_line_1',
            'address_line_2',
            'city',
            'postal_code',
            'state',
            'order_key',
            'customer_id',
            'status',
            'is_active',
            'created_at',
            'updated_at',
            'deleted_at',
            'created_by',
            'updated_by',
            'deleted_by',
            'is_imported',
        ];
    }
    


    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:AD1')->getFont()->setBold(true);
        $sheet->freezePane('A2');
    }
}
