<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Grant extends AdminModel
{

    const STATUSES_MAP = [
        1 => 'Pending',
        2 => 'Accepted',
        3 => 'Rejected',
        4 => 'Draft',
        5 => 'Archived',
    ];
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $table = 'grants_info';

    protected $fillable = [
        'id',
        'doc_id',
        'workflow_count',
        'approval_count',
        'reject_count',
        'opportunity_title',
        'opportunity_teaser',
        'opportunity_title_for_subscriber',
        'opportunity_description_for_subscriber',
        'amount_low',
        'amount_high',
        'close_date_at',
        'deadline_at',
        'letter_of_intent_deadline_at',
        'posted_date_at',
        'url',
        'funding_source',
        'interest_group',
        'funding_agency_id',
        'additional_notes',
        'status',
        'is_ongoing',
        'is_opening',
        'user_id',
        'site_id',
        'approved_by',
        'rejected_by',
        'title_slug',
    ];
    /**
     * Validation rules for this model
     */
    public static $rules = [
        'opportunity_title'    => 'required|min:3|max:191',
        'opportunity_title_for_subscriber' => 'nullable',
        'opportunity_description_for_subscriber' => 'nullable',
        'letter_of_intent_deadline_at' => 'nullable',
        'url' => 'required|url|unique:grants_info,url',
        'interest_group' => 'nullable',
        'funding_agency' => 'required',
        'additional_notes' => 'nullable',
        'is_ongoing' => 'nullable',
        'is_opening' => 'nullable',
    ];

    public static $rule = [
        'opportunity_title'    => 'required|min:3|max:191',
        'opportunity_title_for_subscriber' => 'nullable',
        'opportunity_description_for_subscriber' => 'nullable',
        'letter_of_intent_deadline_at' => 'nullable',
        'url' => 'required',
        'interest_group' => 'nullable',
        'additional_notes' => 'nullable',
        'is_ongoing' => 'nullable',
        'is_opening' => 'nullable',
    ];

    public static $messages = [
        'opportunity_title.required'  => 'Please enter a title for the opportunity',
        'opportunity_title.min'       => 'The title must be at least :min characters',
        'opportunity_title.max'       => 'The title may not be greater than :max characters',
        'url.required'                => 'Please enter a URL for the opportunity',
        'url.url'                     => 'Please enter a Valid URL for the opportunity',
    ];

    const STATUSES = [
        'pending'   => 1,
        'accepted'  => 2,
        'rejected'  => 3,
        'draft'     => 4,
        'archive'   => 5,
    ];

    public function eligibilties()
    {
        return $this->belongsToMany(Eligibilty::class, 'grants_info_eligibilty_map', 'grant_info_id', 'eligibilty_id')->withTimestamps();
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'grants_info_interest_map', 'grant_info_id', 'interest_id')->withTimestamps();
    }

    public function states()
    {
        return $this->belongsToMany(Province::class, 'grants_info_locations_map', 'grant_info_id', 'province_id')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fundingAgency()
    {
        return $this->belongsTo(FundingAgency::class);
    }

    public function favourite()
    {
        return $this->hasOne(GrantsInfoFavorite::class, 'grants_info_id', 'id');
    }

    public function getStatus()
    {
        $status = "";
        switch ($this->status) {
            case 2:
                $status = "<div class='badge badge-success text-center'>Completed</div>";
                break;
            case 3:
                $status = "<div class='badge badge-danger text-center'>Rejected</div>";
                break;
            case 4:
                $status = "<div class='badge badge-secondary text-center'>Draft</div>";
            case 5:
                $status = "<div class='badge badge-secondary text-center'>Archived</div>";
                break;
            default:
                $status = "<div class='badge badge-warning text-center'>Pending</div>";
        }

        return $status;
    }
    /**
     * Get the getGrantByDocID
     */
    public static function getGrantByDocID($doc_id = "")
    {
        if ($doc_id == "") {
            return null;
        }
        $grants = Grant::select('id')->where('doc_id', $doc_id)->first();
        if ($grants) {
            return $grants->doc_id;
        }
        return null;
    }
}
