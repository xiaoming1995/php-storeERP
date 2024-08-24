<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Slowlyo\OwlAdmin\Models\BaseModel as Model;

/**
 * 账单
 */
class BillData extends Model
{
    use SoftDeletes;

    protected $table = 'bill_data';
    

    public function amounts():\Illuminate\Database\Eloquent\Casts\Attribute
    {
        return file_upload_handle();
    }
}
