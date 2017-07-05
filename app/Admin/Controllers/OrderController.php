<?php

namespace App\Admin\Controllers;

use App\Http\Model\Order;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class OrderController extends Controller
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

            $content->header('进件');
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

            $content->header('进件');
            $content->description('详情');

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

            $content->header('header');
            $content->description('description');

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
        return Admin::grid(Order::class, function (Grid $grid) {
            $grid->id('ID')->sortable();
            $grid->name('借款人');
            $grid->project('项目');
            $grid->money('借款金额');
            $grid->teshu('备离单老小');
            $grid->status('状态');
            $grid->partner_name('合作伙伴')->sortable();
            $grid->qianyue_name('签约人')->sortable();
            $grid->created_at('进件时间')->sortable();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(Order::class, function (Form $form) {

            $form->display('id', 'ID');
            $form->display('name', '借款人');
            $form->display('money', '借款金额');
            $form->display('teshu', '备离单老小');
            $form->display('partner_name', '合作伙伴');
            $form->display('qianyue_name', '签约人');
            $form->textarea('qingkuang', '备注情况');
            $form->display('created_at', '创建时间');
            $form->display('updated_at', '更新时间');
        });
    }
}
