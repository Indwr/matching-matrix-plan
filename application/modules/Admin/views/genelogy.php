<?php $this->load->view('header'); ?>
<link rel="stylesheet" href="<?php echo base_url('classic/assets/css/demo1/tree.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('classic/assets/css/demo1/animate.css'); ?>">
<style>
    span.dropbtn input {
    border-radius: 50% !important;
}
</style>    
<div class="main-content">
      <div class="page-content">
        <div class="container-fluid">

<div class="row">
    
    <div id="tree" class="treeview" style="margin: 40px auto;">
        <div class="treemember green">
            <div class="dropdown">
                <span class="dropbtn">
                    <input type="image" class="abc" src="<?php echo base_url('classic/user3green.jpg'); ?>" style="height:50px;width:50px;border-width:0px;">
                </span>
                <div class="span">
                    <span id="ctl00_ContentPlaceHolder1_lblusername1">
                        <a href="<?php echo base_url('Admin/Management/Genelogy/' . $level1->user_id); ?>"><?php echo $level1->first_name . ' ' . $level1->last_name; ?></a>
                    </span>
                    <br>
                    <span id="ctl00_ContentPlaceHolder1_lbluser1">
                        <?php echo $level1->user_id; ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="connecter1">
            <img src="<?php echo base_url('classic/treeimg.png'); ?>" style="width: 480px; height: 33px;">
        </div>
        <div class="tree_row">
            <?php
            foreach ($level2 as $l2) {
                if (!empty($l2)) {
                    ?>
                    <div class="row_2_child">
                        <div class="dropdown">
                            <span class="dropbtn">
                                <input type="image" src="<?php echo base_url('classic/user3green.jpg'); ?>" style="height:50px;width:50px;border-width:0px;">
                            </span>
                            <div class="span">
                                <span id="">
                                    <a href="<?php echo base_url('Admin/Management/Genelogy/' . $l2->user_id); ?>"><?php echo $l2->first_name . ' ' . $l2->last_name ?></a>
                                </span>
                                <br>
                                <span id="ctl00_ContentPlaceHolder1_lbluser2"><?php echo $l2->user_id; ?></span>
                            </div>
                            <div class="dropdown-content animated ZoomIn">
                                <table class="tables" cellpadding="0px" cellspacing="0px">
                                    <tbody>
                                        <tr class="fgtybmd">
                                            <td class="table_heading">Sponser ID:</td>
                                            <td colspan="3">
                                                <span id="ctl00_ContentPlaceHolder1_lblsponsername2">
                                                    <?php echo $l2->sponser_id ?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table_heading">Sponser :</td>
                                            <td class="grtydfbc" colspan="3">
                                                <span id="ctl00_ContentPlaceHolder1_lblsponser2"> <?php echo $l2->sponser_id ?></span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="table_heading">Joining&nbsp;Date :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lbljoindate2"> <?php echo $l2->joining_date; ?></span></td>
                                            <td class="table_heading">Topup &nbsp;Date :</td>
                                            <td>
                                                <span id="ctl00_ContentPlaceHolder1_lbltopupdate2"> <?php echo $l2->topup_date; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td class="table_heading">Status :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lbltopstatus2">Active</span></td>
                                            <td class="table_heading">Package :</td>
                                            <td>
                                                <span id="ctl00_ContentPlaceHolder1_lblpack2">$ 500 Package</span></td>
                                        </tr>
                                        <tr>
                                            <td class="table_heading">Total Left :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblleft2"> <?php echo $l2->left_count; ?></span></td>
                                            <td class="table_heading">Total Right :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblright2"> <?php echo $l2->right_count; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td class="table_heading">Total Left Active :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblleftactive2"> <?php echo $l2->left_count;
                                                    ?></span></td>
                                            <td class="table_heading">Right Active :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblrightactive2"> <?php echo $l2->right_count ?></span></td>
                                        </tr>
                                        <tr>
                                            <td class="table_heading">Left Business :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblleftbv2">0</span></td>
                                            <td class="table_heading">Right Business :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblrightbv2">0</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row_2_child">
                        <div class="dropdown">
                            <span class="dropbtn">
                                <span id=""></span>
                                <input type="image" name="ctl00$ContentPlaceHolder1$Image5" id="ctl00_ContentPlaceHolder1_Image5" src="<?php echo base_url('classic/default.png'); ?>" style="height:50px;width:50px;border-width:0px;margin:0px; cursor: pointer;">
                            </span>
                            <div class="span">
                                <span id="ctl00_ContentPlaceHolder1_lblusername10">Waiting</span><br>

                                <span id="ctl00_ContentPlaceHolder1_lbluser10">empty</span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
            }
            ?>
        </div>

        <div class="tree_row" style="height: 34px;">
            <div class="row_2_child" style="height: 34px;">
                <img src="<?php echo base_url('classic/treeimg1.png'); ?>" style="width: 253px; height: 32px;">
            </div>
            <div class="row_2_child" style="height: 34px;">
                <img src="<?php echo base_url('classic/treeimg1.png'); ?>" style="width: 253px; height: 32px;">
            </div>
        </div>

        <div class="tree_row">
            <?php
            foreach ($level3 as $l3) {
                if (!empty($l3)) {
                    ?>
                    <div class="row_3_child">
                        <div class="dropdown">
                            <span class="dropbtn">

                                <input type="image" name="ctl00$ContentPlaceHolder1$Image4" id="ctl00_ContentPlaceHolder1_Image4" src="<?php echo base_url('classic/user3green.jpg'); ?>" style="height:50px;width:50px;border-width:0px;">

                            </span>
                            <div class="span">
                                <span id="ctl00_ContentPlaceHolder1_lblusername4">
                                    <a href="<?php echo base_url('Admin/Management/Genelogy/' . $l3->user_id); ?>"><?php echo $l3->first_name . ' ' . $l3->last_name; ?></a> </span><br>

                                <span id="ctl00_ContentPlaceHolder1_lbluser4"><?php echo $l3->user_id; ?></span>
                            </div>
                            <div class="dropdown-content animated ZoomIn">
                                <table class="tables" cellpadding="0px" cellspacing="0px">
                                    <tbody>
                                        <tr class="fgtybmd">
                                            <td class="table_heading">Sponser Name:</td>
                                            <td colspan="3">
                                                <span id="ctl00_ContentPlaceHolder1_lblsponsername4"><?php echo $l3->sponser_id; ?>  </span></td>
                                        </tr>
                                        <tr>
                                            <td class="table_heading">Sponser :</td>
                                            <td class="grtydfbc" colspan="3">

                                                <span id="ctl00_ContentPlaceHolder1_lblsponser4"><?php echo $l3->sponser_id; ?></span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="table_heading">Joining&nbsp;Date :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lbljoindate4"><?php echo $l3->joining_date; ?></span></td>
                                            <td class="table_heading">Topup &nbsp;Date :</td>
                                            <td>
                                                <span id="ctl00_ContentPlaceHolder1_lbltopupdate4"><?php echo $l3->topup_date; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td class="table_heading">Status :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lbltopstatus4">Active</span></td>
                                            <td class="table_heading">Package :</td>
                                            <td>
                                                <span id="ctl00_ContentPlaceHolder1_lblpack4">$500 Package</span></td>
                                        </tr>
                                        <tr>
                                            <td class="table_heading">Total Left :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblleft4"><?php echo $l3->left_count; ?></span></td>
                                            <td class="table_heading">Total Right :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblright4"><?php echo $l3->right_count; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td class="table_heading">Total Left Active :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblleftactive4"><?php echo $l3->left_count; ?></span></td>
                                            <td class="table_heading">Right Active :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblrightactive4">right_count</span></td>
                                        </tr>
                                        <tr>
                                            <td class="table_heading">Left Business :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblleftbv4">0</span></td>
                                            <td class="table_heading">Right Business :</td>
                                            <td class="grtydfbc">
                                                <span id="ctl00_ContentPlaceHolder1_lblrightbv4">0</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row_3_child">
                        <div class="dropdown">
                            <span class="dropbtn">
                                <span id="ctl00_ContentPlaceHolder1_lblid5"></span>
                                <input type="image" name="ctl00$ContentPlaceHolder1$Image5" id="" src="<?php echo base_url('classic/default.png'); ?>" style="height:50px;width:50px;border-width:0px;margin:0px; cursor: pointer;">
                            </span>
                            <div class="span">
                                <span id="ctl00_ContentPlaceHolder1_lblusername10">Waiting</span><br>

                                <span id="ctl00_ContentPlaceHolder1_lbluser10">empty</span>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
 </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
