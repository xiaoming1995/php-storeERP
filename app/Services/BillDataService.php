<?php

namespace App\Services;

use App\Models\BillData;
use Slowlyo\OwlAdmin\Services\AdminService;

/**
 * 账单
 *
 * @method BillData getModel()
 * @method BillData|\Illuminate\Database\Query\Builder query()
 */
class BillDataService extends AdminService
{
    protected string $modelName = BillData::class;
}
