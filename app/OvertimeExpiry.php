<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OvertimeExpiry extends Model
{
    //
    public function companyid()
    {
        return $this->belongsTo(Company::class,'company_id')->withDefault(['company_descr' => 'N/A']);
    }
}
