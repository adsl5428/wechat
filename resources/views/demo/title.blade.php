
<div class="bd">
    <div class="weui_cells weui_cells_form">

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">名字</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="nameid" name="name" class="weui_input"  placeholder="贷款人姓名" value="孙悟空" disabled/>
            </div>
        </div>

        <div class="weui_cell">
            <div class="weui_cell_hd"><label class="weui_label">身份证</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="cardid" name="card" class="weui_input"  placeholder="贷款人身份证" value="350525190010015338" disabled />
            </div>
        </div>


        <div class="weui_cell weui_vcode ">
            <div class="weui_cell_hd"><label class="weui_label">贷款额(万元)</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input id="moneyid" class="weui_input" type="tel" placeholder="申请贷款金额" value="1000" disabled />
            </div>
            <div class="weui_cell_ft">
                {{--<i class="weui_icon_warn"></i>--}}
                <p class="weui-vcode-btn">万元</p>
            </div>
        </div>
        </div>
        </div>