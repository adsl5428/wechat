<?php

namespace App\Admin\Controllers;

use App\Http\Model\Partner;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class PartnerController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('合伙人');
            $content->description('列表');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {
            $content->header('合伙人');
            $content->description('编辑');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content $content) {

            $content->header('合伙人');
            $content->description('新增');



            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(Partner::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->code('邀请码');
            $grid->name('名字');
            $grid->tel('电话');
            $grid->qianyue('签约人');
            $grid->updated_at('最后更新');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Partner::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->text('code', '邀请码');
            $form->text('name', '合伙人');
            $form->text('tel', '电话');
            $form->text('idcard', '身份证');
            $form->text('qianyue', '签约人');
            $form->text('bankname', '银行');
            $form->text('kaihuhang', '开户行');
            $form->text('bankid', '卡号');
            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}
