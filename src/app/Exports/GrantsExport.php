<?php

namespace App\Exports;

use App\Models\Grant;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use function GuzzleHttp\Promise\queue;
use function PHPUnit\Framework\returnSelf;

class GrantsExport implements WithHeadings, ShouldAutoSize, WithStyles, FromCollection, WithMapping
{


    use Exportable;

    protected $search;
    protected $status;
    protected $contributors;
    protected $publishers;

    public function __construct($search, $status, $contributors, $publishers)
    {
        $this->search = $search;
        $this->status = $status;
        $this->contributors = $contributors;
        $this->publishers = $publishers;

    }


    public function collection()
    {   
        $query = Grant::query();
        if ($this->search) {
            $query->where(function ($query) {
                $query->where('opportunity_title', 'like', '%' . $this->search . '%')
                ->orWhere('amount_high', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%')
                ->orWhere('amount_low', 'like', '%' . $this->search . '%')
                ->orWhere('close_date_at', 'like', '%' . $this->search . '%');
            });
        }
        
        
        if (!empty($status)) {
            $statusKey = array_search($status, Grant::STATUSES_MAP);
            if ($statusKey !== false) {
                $query->where('status', $statusKey);
            }
        }

        if (!empty($this->contributors)) {
            $query->where('user_id', $this->contributors);
        }

        if (!empty($this->publishers)) {
            $query->where('approved_by', $this->publishers);
        }
        return $query->get();
    }


    public function map($grant): array
    {
        $eligibilities = $grant->eligibilties ? $grant->eligibilties->pluck('title')->filter()->implode(', ') : '';
        $interests = $grant->interests ? $grant->interests->pluck('title')->filter()->implode(', ') : '';
        $states = $grant->states ? $grant->states->pluck('name')->filter()->implode(', ') : '';
        
        return [
            $grant->id,
            $grant->site_id,
            $grant->user_id,
            $grant->opportunity_title,
            $grant->opportunity_teaser,
            $grant->opportunity_title_for_subscriber,
            $grant->opportunity_description_for_subscriber,
            $grant->amount_low,
            $grant->amount_high,
            $grant->close_date,
            $grant->deadline,
            $grant->letter_of_intent_deadline,
            $grant->posted_date,
            $grant->url,
            $eligibilities,
            $interests,
            $states,
            $grant->funding_source,
            $grant->funding_agency_id,
            $grant->additional_notes,
            $grant->is_ongoing,
            $grant->is_opening,
            $grant->status,
            $grant->approved_by,
            $grant->rejected_by,
            $grant->created_by,
            $grant->updated_by,
            $grant->deleted_by,
            $grant->deleted_at,
            $grant->created_at,
            $grant->updated_at,
            $grant->reject_count,
            $grant->workflow_count,
            $grant->is_imported,
        ];
    }



    public function headings(): array
    {
        return [
            'ID',
            'Site ID',
            'User ID',
            'Opportunity Title',
            'Opportunity Teaser',
            'Opportunity Title for Subscriber',
            'Opportunity Description for Subscriber',
            'Amount Low',
            'Amount High',
            'Close Date',
            'Deadline',
            'Letter of Intent Deadline',
            'Posted Date',
            'URL',
            'Eligibilities',
            'Interest',
            'State',
            'Funding Source',
            'Funding Agency ID',
            'Additional Notes',
            'Is Ongoing',
            'Is Opening',
            'Status',
            'Approved By',
            'Rejected By',
            'Created By',
            'Updated By',
            'Deleted By',
            'Deleted At',
            'Created At',
            'Updated At',
            'Reject Count',
            'Workflow Count',
            'Is Imported',
        ];
    }


    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:AD1')->getFont()->setBold(true);
        $sheet->freezePane('A2');
    }
}
