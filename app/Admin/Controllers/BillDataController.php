<?php

namespace App\Admin\Controllers;

use Slowlyo\OwlAdmin\Renderers\Page;
use Slowlyo\OwlAdmin\Renderers\Form;
use Slowlyo\OwlAdmin\Controllers\AdminController;
use App\Services\BillDataService;

/**
 * 账单
 *
 * @property BillDataService $service
 */
class BillDataController extends AdminController
{
    protected string $serviceName = BillDataService::class;

    public function list(): Page
    {
        $crud = $this->baseCRUD()
            ->filterTogglable(false)
			->headerToolbar([
				$this->createButton(true),
				...$this->baseHeaderToolBar()
			])
            ->columns([
                amis()->TableColumn('id', 'ID')->sortable(),
				amis()->TableColumn('amounts', '金额'),
				amis()->TableColumn('type', '类型'),
				amis()->TableColumn('remarks', '备注'),
				amis()->TableColumn('statement_date', '账单日期'),
				amis()->TableColumn('created_at', __('admin.created_at'))->type('datetime')->sortable(),
				amis()->TableColumn('updated_at', __('admin.updated_at'))->type('datetime')->sortable(),
                $this->rowActions(true)
            ]);

        return $this->baseList($crud);
    }

    public function form($isEdit = false): Form
    {
        return $this->baseForm()->body([
            amis()->TextControl('amounts', '金额')->placeholder('输入金额'),
			amis()->RadiosControl('type', '类型')->options([
                ['label' => '支出','value' => 0],
                ['label' => '收入','value' => 1],
            ])->value(0),
			amis()->TextareaControl('remarks', '备注')->placeholder('支出收入详情信息'),
			amis()->DateControl('statement_date', '账单日期'),
        ]);
    }

    public function detail(): Form
    {
        return $this->baseDetail()->body([
            amis()->TextControl('id', 'ID')->static(),
			amis()->TextControl('amounts', '金额')->static(),
			amis()->TextControl('type', '类型（0支出 1收入）')->static(),
			amis()->TextControl('remarks', '备注')->static(),
			amis()->TextControl('statement_date', '账单日期')->static(),
			amis()->TextControl('created_at', __('admin.created_at'))->static(),
			amis()->TextControl('updated_at', __('admin.updated_at'))->static()
        ]);
    }
}
