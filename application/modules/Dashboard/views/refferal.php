

<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Refferal
                </h3>
            </div>

        </div>
        <div class="kt-portlet__body">
            <div class="kt-space-20">
                <button type="button" class="btn btn-danger" id="gntrflin">Generate New Referral Code</button>
                <input type="text" id="rflink" class="form-control" value="<?php echo base_url('Dashboard/User/Step1/?sponser_id=' . $user['user_id'] . '-DWAY' . $user['refferal_count']) ?>">
                <button class="btn btn-primary cpybtn" id="refferalLink" data-touch_id="rflink">Copy Referral Link</button>
                <span id="cpdata" class="text-success"></span>
            </div>
        </div>
    </div>
</div>
<?php include'footer.php' ?>

<script>
    $(document).on('click', '#refferalLink', function () {
        var copyText = document.getElementById('rflink');
        copyText.select();
        document.execCommand("copy");
        $('#cpdata').text('Referral Link Copied')
    })
    $(document).on('click','#gntrflin',function(){
        var base_url = '<?php echo base_url('Dashboard/AjaxController/get_refferal_code');?>';
        $.get(base_url,function(res){
            console.log(res)
            $('#rflink').val(res);
        })
    })
</script>