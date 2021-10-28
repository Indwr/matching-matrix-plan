<?php $this->load->view('header'); ?>
<div id="content" class="content">
    <h2 class="page-titel">
        <span style="">Recharge </span> /   Prepaid Portal
    </h2>
    <div id="rootwizard" class="wizard wizard-full-width">
        <div class="wizard-content tab-content">
            <!-- <h4>Income Balance : <b>Rs.<?php //echo $income_balance['sum']?></b> <br>Redeem Balance : <b>Rs.<?php //echo $token_balance['sum']?></b></h4> -->
            <div class="row">
                <h2><?php
                echo $this->session->flashdata('message');
                ?>
                </h2>
                <div class="col-md-12">
                    <?php
                    echo form_open();
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Phone</th>
                                <!--<th></th>-->
                                <th>Operator</th>
                                <th>Circle</th>
                                <th>Amount</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" name="mob" class="form-control"  onblur="check_number()" id="mob" value="<?php echo $mob;?>"></td>
                                <!--<td><button type="button" onclick="check_number()" class="btn btn-success">Check Operator</button></td>-->
                                <td id="">
                                    <select id="operator_id" name="operator_code" class="form-control">
                                        <option value="">Choose Operator</option>
                                        <option value="AT">AIRTEL</option>
                                        <option value="BS">BSNL</option>
                                        <option value="BSS">BSNL SPECIAL</option>
                                        <option value="IDX">IDEA</option>
                                        <option value="JO">JIO</option>
                                        <option value="VF">VODAFONE</option>
                                        <option value="TD">TATA DOCOMO GSM</option>
                                        <option value="TDS">TATA DOCOMO GSM SPECIAL</option>
                                        <option value="MTD">MTNL DELHI</option>
                                        <option value="MTDS">MTNL DELHI SPECIAL</option>
                                        <option value="MTM">MTNL MUMBAI</option>
                                        <option value="MTMS">MTNL MUMBAI SPECIAL</option>
                                    </select>
                                </td>
                                <td id="Circle"></td>
                                <td>
                                    <input type="number" class="form-control" name="amount" id="Amount">
                                    <span id="description" class="text-success"></span>
                                    <!-- <input type="hidden" class="form-control" name="operator_code" id="operator_code"> -->
                                    <input type="hidden" class="form-control" name="circle_code" id="circle_code">
                                </td>
                                <td>
                                    <!-- <select class="form-control" name="income_type">
                                        <option value="income">Income wallet</option>
                                        <option value="redeem">Redeem wallet</option>
                                    </select> -->
                                </td>
                                <td><button class="btn btn-success">Proceed To Recharge</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12">
                            <!-- Custom Tabs -->
                            <div class="card">
                                <div class="card-header d-flex p-0">
                                    <h3 class="card-title p-3">Plans</h3>
                                    <ul class="nav nav-pills ml-auto p-2" id="planUL">
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="planDiv">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('footer'); ?>
<script>
    function check_number(){
        var phone = $('#mob').val();
        var url = "<?php echo base_url('Dashboard/Recharge/findoperator/'); ?>" + phone;
        $.get(url, function (res) {
            console.log(res.data)
            if (res.success == 1) {
                // $('#operator').text(res.data.operator_name);
                $('#operator_id').val(res.data.operator_code)
                $('#Circle').text(res.data.circle_name);
                // $('#operator_code').val(res.data.operator_code);
                $('#circle_code').val(res.data.circle_code);
                find_plan(res.data.operator_code, res.data.circle_code);
            } else {
                alert(res.message)
            }
        }, 'json')
    };
    $(document).on('change','#operator_id',function(){
        var operator_id = $('#operator_id').val();
        var circle_code = $('#circle_code').val();
        if(circle_code != '' && operator_id != ''){
            find_plan(operator_id, circle_code)
        }
    })
    function find_plan(operator_code, circle_code) {
        var url = "<?php echo base_url('Dashboard/Recharge/findplan/'); ?>" + operator_code + "/" + circle_code;
        $.get(url, function (res) {
            console.log(res.data)
            if (res.success == 1) {
                $('#planUL').html('');
                $('#planDiv').html('');
                $.each(res.data.plancategory, function (key, value) {
                    $('#planUL').append('<li class="nav-item"><a class="nav-link" href="#tab_' + value.categoryid + '" data-toggle="tab">' + value.category + '</a></li>')
                    $('#planDiv').append('<div class="tab-pane active" id="tab_' + value.categoryid + '"><table class="table table-bordered"><thead><tr><td>Circle</td><td>PlanType</td><td>TalkTime</td><td>Validity</td><td>Description</td><td>Price</td>  </tr><thead><tbody id="PlanInfo' + value.categoryid + '"></tbody></table></div>')
                })
                $.each(res.data.plandetail, function (key, value) {
                    console.log(value);
                     $('#PlanInfo' + value.categoryid).append('<tr><td>' + value.circle_name + '</td><td>' + value.category + '</td><td>' + value.talktime + '</td><td>' + value.validity + '</td><td>' + value.description + '</td><td><button type="button" data-amount="' + value.amount + '" data-description="' + value.description + '" class="amoutpick">Rs. ' + value.amount + '</button></td></tr>')
                });
            }

        }, 'json')
    }
//
//    var url = "<?php echo base_url('Dashboard/Recharge/testString/'); ?>";
//    $.get(url, function (res) {
//        console.log(res.data.plancategory)
//        if (res.success == 1) {
//            $('#planUL').html('');
//            $('#planDiv').html('');
//            $.each(res.data.plancategory, function (key, value) {
//                $('#planUL').append('<li class="nav-item"><a class="nav-link" href="#tab_' + value.categoryid + '" data-toggle="tab">' + value.category + '</a></li>')
//                $('#planDiv').append('<div class="tab-pane" id="tab_' + value.categoryid + '"><table class="table table-bordered"><thead><tr><td>Circle</td><td>PlanType</td><td>TalkTime</td><td>Validity</td><td>Description</td><td>Price</td>  </tr><thead><tbody id="PlanInfo' + value.categoryid + '"></tbody></table></div>')
//            })
//            $.each(res.data.plandetail, function (key, value) {
//                console.log(value);
//                $('#PlanInfo' + value.categoryid).append('<tr><td>' + value.circle_name + '</td><td>' + value.category + '</td><td>' + value.talktime + '</td><td>' + value.validity + '</td><td>' + value.description + '</td><td><button type="button" data-amount="' + value.amount + '" data-description="' + value.description + '" class="amoutpick">Rs. ' + value.amount + '</button></td></tr>')
//            });
//        }
//    }, 'json')
//
    $(document).on('click', '.amoutpick', function () {
        $("#description").text($(this).data('description'))
        $("#Amount").val($(this).data('amount'))
    })

</script>
