<?php
include_once 'header.php';
$userinfo = userinfo();
$bankinfo = bankinfo();
?>

<style>
.panel-heading {
    background: #e0e0e0;
    color: #000;
    padding: 8px 16px;
    border-radius: 10px;
}
</style>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
          <!-- BEGIN row -->
          <div class="row row-space-20">
              <!-- BEGIN col-8 -->
              <div class="col-md-12">
                  <!-- BEGIN tab-content -->
                  <div class="tab-content p-0">
                      <!-- BEGIN tab-pane -->
                      
                      <!-- END tab-pane -->
                      <!-- BEGIN tab-pane -->
                      


                        <div class="col-md-12 card">
                          <div class="card-body">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">CHANGE PASSWORD</h4>
                                    <?php echo $this->session->flashdata('password_message');?>
                                </div>
                                <div class="panel-body">
                                    <p class="desc"></p>
                                        <?php echo form_open(base_url('Dashboard/Profile/passwordReset'),array(''));?>
                                        <div class="form-group">
                                            <label for="txtoldpass">Old Password</label>
                                            <input type="password" class="form-control" name="cpassword" maxlength="20" placeholder="Enter Your Old Password" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtnewpass">New Password</label>
                                            <input type="password" class="form-control" name="npassword" maxlength="20" required="" placeholder="Enter Your New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="txtnewpass">Confirm New Password</label>
                                            <input type="password" class="form-control"  name="vpassword" maxlength="20" required="" placeholder="Re-Enter Your New Password">
                                        </div>
                                        <div id="SLgPWD"></div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        <?php echo form_close();?>
                                </div>
                            </div>
                          </div>
                        </div>
                        


                        <div class="col-md-12 card">
                          <div class="card-body">
                            <div class="panel panel-default">
                                <!-- BEGIN panel-heading -->
                                <div class="panel-heading">
                                    <h4 class="panel-title" style="color:black">TRANSACTION PASSWORD</h4>
                                    <?php echo $this->session->flashdata('txn_message');?>
                                </div>
                                <!-- END panel-heading -->
                                <!-- BEGIN panel-body -->
                                <div class="panel-body">
                                      <p class="desc"></p>
                                      <?php echo form_open(base_url('Dashboard/Profile/transPassword'),array( ''));?>
                                      <div class="form-group">
                                          <label for="txtoldpass">Old Password</label>
                                          <input type="password" class="form-control" name="cpassword" maxlength="20" placeholder="Enter Your Old Txn Password" required="">
                                      </div>
                                      <div class="form-group">
                                          <label for="txtnewpass">New Password</label>
                                          <input type="password" class="form-control" name="npassword" maxlength="20" required="" placeholder="Enter Your New Txn Password">
                                      </div>
                                      <div class="form-group">
                                          <label for="txtnewpass">Confirm New Password</label>
                                          <input type="password" class="form-control"  name="vpassword" maxlength="20" required="" placeholder="Re-Enter Your New Txn Password">
                                      </div>
                                      <div id="SLgPWD"></div>
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                      <?php echo form_close();?>
                                </div>
                                <!-- END panel-body -->
                            </div>
                          </div>
                        </div>


                            
                            <!--	 <div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">2 FA Code</h4></div><div class="panel-body"><p class="desc"></p><form  action="#"><div class="input-group form-group"><span class="input-group-addon"><input type="checkbox" id="myCheck" onclick="getmsgbns()" ></span><input type="text" class="form-control" disabled="true" placeholder="Please click on check box for enable 2 factor athentication "></div><div id="fmsg"  style="display:none"><div class="alert alert-danger  m-b-10"><strong>Sorry !</strong> We are working on 2 factor athentication try later!</div></div></form></div></div>-->
                        </div>
                      <!-- END tab-pane -->
                      <!-- BEGIN tab-pane -->
                        <div class="tab-pane" id="E-CURRENCY-ACCOUNT">

                        </div>
                      <!-- END tab-pane -->
                      <!-- BEGIN tab-pane -->
                      <div class="tab-pane " id="RESET-PASSWORD">
                          <!-- BEGIN panel -->

                          <!-- end panel -->

                      </div>
                      <!-- END tab-pane -->
                      <!-- BEGIN tab-pane -->
                      <div class="tab-pane " id="KYC" style="display:none;">
                          <!-- BEGIN panel -->
                          <div class="panel panel-default">
                              <!-- BEGIN panel-heading -->
                              <div class="panel-heading">
                                  <h4 class="panel-title">KYC VERIFICATION</h4>
                              </div>
                              <!-- END panel-heading -->
                              <!-- BEGIN panel-body -->

                              <!-- END file-upload-form -->
                          </div>
                          <!-- BEGIN panel -->
                          <div class="panel panel-default" style="margin-top:20px;display:none;" id="pochanki">
                              <!-- BEGIN panel-heading -->
                              <div class="panel-heading">
                                  <h4 class="panel-title"> Identity Document (ID)</h4>
                              </div>
                              <!-- END panel-heading -->
                              <!-- BEGIN panel-body -->
                              <div class="panel-body gtdtf">
                                  <!-- BEGIN file-upload-form -->
                              </div>
                              <div class="container-fluid  ng-scope nxs nxz" id="Div2">
                                  <div class="row tyomy">
                                      <div class="col-sm-12">
                                          <div class="lead mb10">
                                              PAN CARD
                                          </div>
                                          <p>If your ID document also states your residential address, then an additional Proof of Address document may not be required.</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-xs-12 col-md-9 col-lg-12">
                                          <div class="panel-white panel">
                                              <div class="panel-heading">
                                                  <h4 class="color-orange" style="color:Orange;font-weight:600;">Select files to upload</h4>
                                              </div>
                                              <div class="panel-body">
                                                  <ul class="">
                                                      <li> We accept both scanned copies and mobile photos of the FRONT of your document.</li>
                                                      <li>
                                                          <span class="color-blue">Accepted formats when uploading:</span>
                                                          jpg, jpeg, gif, png, tiff, doc, docx, pdf

                                                      </li>
                                                      <li> Max. file size: 500 KB</li>
                                                  </ul>
                                                  <table class="document-verify-step2-table table form-condensed ng-pristine ng-valid" width="100%">
                                                      <tbody>
                                                          <tr>
                                                              <td colspan="6" style="BORDER:UNSET;">
                                                                  <div>
                                                                      <span class="">Select ID Proof</span>
                                                                      <div class="radio-inline m-b-3">
                                                                          <input type="radio" name="KYCTYPE" id="radio-option-1" value="PAN CARD">
                                                                          <label for="radio-option-1">PAN CARD</label>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td style="BORDER:UNSET;"></td>
                                                          </tr>
                                                          <tr>
                                                              <td width="100%">
                                                                  <label class="form-control mb0  ng-pristine ng-untouched ">
                                                                      <span class="vertical-middle ng-binding">FRONT Scan/Photo of ID</span>
                                                                  </label>
                                                              </td>
                                                              <td>
                                                                  <span class="btn btn-primary fileinput-button btn-sm m-r-3 m-b-3" style="padding: 6px 16px;">
                                                                      <i class="glyphicon glyphicon-plus"></i>
                                                                      <span>Add files...</span>
                                                                      <input type="file" name="files[]" onchange="ShowImagePreview2(this);" id="IMGADDUPLOAD" multiple="">
                                                                  </span>
                                                              </td>
                                                          </tr>
                                                          <tr style="border-bottom: 1px solid #e0e0e0;">
                                                              <td>
                                                                  <input name="txtuserid" type="text" maxlength="20" id="KYCIdNo" placeholder="Enter Id Number" class="form-control input-sm">
                                                              </td>
                                                              <td>
                                                                  <a href="#" onclick="SaveKYCInfo();" class="btn btn-primary btn-sm m-r-3 m-b-3 start">
                                                                      <i class="glyphicon glyphicon-upload"></i>
                                                                      <span>Start upload</span>
                                                                  </a>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td>
                                                                  <div id="DvKYCUpdate"></div>
                                                              </td>
                                                          </tr>
                                                      </tbody>
                                                  </table>
                                                  <div class="col-sm-12">
                                                      <img id="ImgAdd789" alt="Identity Document (ID)" width="80" height="80" style="display:none;">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row document-upload-help tyomy">
                                      <div class="col-xs-12">
                                          <h5 class="neds">In order for the document to be valid it needs to meet the following requirements and contain the following information:</h5>
                                          <ul class="">
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Clear, with no blurs, light reflections or shadows
                                              </li>
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Full name should be visible
                                              </li>
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Issue or expiry date
                                              </li>
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Place and Date of Birth OR Tax Identification Number
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- BEGIN panel -->
                          <div class="panel panel-default" style="margin-top:20px;display:none; " id="rozhok">
                              <div class="panel-heading">
                                  <h4 class="panel-title"> Proof of Residence (POR)</h4>
                              </div>
                              <div class="panel-body gtdtf"></div>
                              <div class="container-fluid  ng-scope nxs nxz" id="Div1">
                                  <div class="row tyomy">
                                      <div class="col-sm-12">
                                          <div class="lead mb10">
                                              Aadhar Card
                                          </div>
                                          <p>If your ID document also states your residential address, then an additional Proof of Address document may not be required.</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-xs-12 col-md-9 col-lg-12">
                                          <div class="panel-white panel">
                                              <div class="panel-heading">
                                                  <h4 class="color-orange" style="color:Orange;font-weight:600;">Select files to upload</h4>
                                              </div>
                                              <div class="panel-body">
                                                  <ul class="">
                                                      <li> We accept both scanned copies and mobile photos of the FRONT of your document.</li>
                                                      <li>
                                                          <span class="color-blue">Accepted formats when uploading:</span>
                                                          jpg, jpeg, gif, png, tiff, doc, docx, pdf

                                                      </li>
                                                      <li> Max. file size: 500 KB</li>
                                                  </ul>
                                                  <table class="document-verify-step2-table table form-condensed ng-pristine ng-valid" width="100%">
                                                      <tbody>
                                                          <tr>
                                                              <td colspan="6" style="BORDER:UNSET;">
                                                                  <div>
                                                                      <span class="">Select ID Proof</span>
                                                                      <div class="radio-inline m-b-3">
                                                                          <input type="radio" name="KYCTYPE1" id="radio-option-4" value="Aadhar Card">
                                                                          <label for="radio-option-4">Aadhar Card</label>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td style="BORDER:UNSET;"></td>
                                                          </tr>
                                                          <tr>
                                                              <td width="100%">
                                                                  <label class="form-control mb0  ng-pristine ng-untouched ">
                                                                      <span class="vertical-middle ng-binding">FRONT Scan/Photo of ID</span>
                                                                  </label>
                                                              </td>
                                                              <td>
                                                                  <span class="btn btn-primary fileinput-button btn-sm m-r-3 m-b-3" style="padding: 6px 16px;">
                                                                      <i class="glyphicon glyphicon-plus"></i>
                                                                      <span>Add files...</span>
                                                                      <input type="file" name="files[]" onchange="ShowImagePreview98(this);" id="IMGADDUPLOAD1">
                                                                  </span>
                                                              </td>
                                                          </tr>
                                                          <tr style="border-bottom: 1px solid #e0e0e0;">
                                                              <td>
                                                                  <input name="txtuserid" type="text" maxlength="20" id="KYCIdNo1" placeholder="Enter Id Number" class="form-control input-sm">
                                                              </td>
                                                              <td>
                                                                  <a href="#" onclick="SavePorInfo();" class="btn btn-primary btn-sm m-r-3 m-b-3 start">
                                                                      <i class="glyphicon glyphicon-upload"></i>
                                                                      <span>Start upload</span>
                                                                  </a>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td>
                                                                  <div id="DvKYCUpdate1"></div>
                                                              </td>
                                                          </tr>
                                                      </tbody>
                                                  </table>
                                                  <div class="col-sm-12">
                                                      <img id="ImgAdd78985" alt="Identity Document (ID)" width="80" height="80" style="display:none;">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row document-upload-help tyomy">
                                      <div class="col-xs-12">
                                          <h5 class="neds">In order for the document to be valid it needs to meet the following requirements and contain the following information:</h5>
                                          <ul class="">
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Clear, with no blurs, light reflections or shadows
                                              </li>
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Full name should be visible
                                              </li>
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Issue or expiry date
                                              </li>
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Place and Date of Birth OR Tax Identification Number
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                              <!-- END file-upload-form -->
                          </div>
                          <!-- BEGIN panel3 -->
                          <div class="panel panel-default" style="margin-top:20px;display:none;" id="ruins">
                              <!-- BEGIN panel-heading -->
                              <div class="panel-heading">
                                  <h4 class="panel-title">  Bank Account Proof</h4>
                              </div>
                              <!-- END panel-heading -->
                              <!-- BEGIN panel-body -->
                              <div class="panel-body gtdtf">
                                  <!-- BEGIN file-upload-form -->
                              </div>
                              <div class="container-fluid  ng-scope nxs nxz" id="Div3">
                                  <div class="row tyomy">
                                      <div class="col-sm-12">
                                          <div class="lead mb10">
                                              Cheque or Passbook
                                          </div>
                                          <p>If you already submited your bank account proof, then an additional Bank account proof may not be required.</p>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-xs-12 col-md-9 col-lg-12">
                                          <div class="panel-white panel">
                                              <div class="panel-heading">
                                                  <h4 class="color-orange" style="color:Orange;font-weight:600;">Select files to upload</h4>
                                              </div>
                                              <div class="panel-body">
                                                  <ul class="">
                                                      <li> We accept both scanned copies and mobile photos of the FRONT of your document.</li>
                                                      <li>
                                                          <span class="color-blue">Accepted formats when uploading:</span>
                                                          jpg, jpeg, gif, png, tiff, doc, docx, pdf

                                                      </li>
                                                      <li> Max. file size: 500 KB</li>
                                                  </ul>
                                                  <table class="document-verify-step2-table table form-condensed ng-pristine ng-valid" width="100%">
                                                      <tbody>
                                                          <tr>
                                                              <td colspan="6" style="BORDER:UNSET;">
                                                                  <div>
                                                                      <span class="">Select ID Proof</span>
                                                                      <div class="radio-inline m-b-3">
                                                                          <span>
                                                                              <input type="radio" name="BANKPROF2" id="radio-option-9" value="Cancel Cheque">
                                                                              <label for="radio-option-9">Cancel Cheque</label>
                                                                          </span>
                                                                          <span class="bcmp">
                                                                              <input type="radio" name="BANKPROF2" id="radio-option-10" value="Bank Passbook">
                                                                              <label for="radio-option-10">Bank Passbook</label>
                                                                          </span>
                                                                      </div>
                                                                  </div>
                                                              </td>
                                                              <td style="BORDER:UNSET;"></td>
                                                          </tr>
                                                          <tr>
                                                              <td width="100%">
                                                                  <label class="form-control mb0  ng-pristine ng-untouched ">
                                                                      <span class="vertical-middle ng-binding">FRONT Scan/Photo of ID</span>
                                                                  </label>
                                                              </td>
                                                              <td>
                                                                  <span class="btn btn-primary fileinput-button btn-sm m-r-3 m-b-3" style="padding: 6px 16px;">
                                                                      <i class="glyphicon glyphicon-plus"></i>
                                                                      <span>Add files...</span>
                                                                      <input type="file" name="files[]" id="IMGADDUPLOAD5" onchange="ShowImagePreview9889(this);" multiple="">
                                                                  </span>
                                                              </td>
                                                          </tr>
                                                          <tr style="border-bottom: 1px solid #e0e0e0;">
                                                              <td>
                                                                  <input name="txtaccountnumber" type="text" maxlength="20" id="bankidNo2" placeholder="Enter Account Number" class="form-control input-sm">
                                                              </td>
                                                              <td>
                                                                  <a href="#" onclick="SavePorInfo6();" class="btn btn-primary btn-sm m-r-3 m-b-3 start">
                                                                      <i class="glyphicon glyphicon-upload"></i>
                                                                      <span>Start upload</span>
                                                                  </a>
                                                              </td>
                                                          </tr>
                                                          <tr>
                                                              <td>
                                                                  <div id="DvKYCUpdate56"></div>
                                                              </td>
                                                          </tr>
                                                      </tbody>
                                                  </table>
                                                  <div class="col-sm-12">
                                                      <img id="ImgAdd7898558" alt="Bank account proof" width="80" height="80" style="display:none;">
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row document-upload-help tyomy">
                                      <div class="col-xs-12">
                                          <h5 class="neds">In order for the document to be valid it needs to meet the following requirements and contain the following information:</h5>
                                          <ul class="">
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Clear, with no blurs, light reflections or shadows
                                              </li>
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Full name should be visible
                                              </li>
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Issue or expiry date
                                              </li>
                                              <li>
                                                  <i class="icon-Verified color-salad mr10"></i>Place and Date of Birth OR Tax Identification Number
                                              </li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- BEGIN pane3 -->
                      </div>
                  </div>
                  <!-- END panel-body -->
                  <!-- end panel -->
              </div>
              <!-- BEGIN col-4 -->

              <!-- END col-4 -->
          </div>
          <!-- END col-8 -->
      </div>
      <!-- END row -->
  </div>


    </div>

<?php include_once 'footer.php'; ?>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).on('click','#btnCopy',function(){
        //linkTxt
        var copyText = document.getElementById("linkTxt");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/
        /* Copy the text inside the text field */
        document.execCommand("copy");
        /* Alert the copied text */
        alert("Link Copied : " + copyText.value);
    })
    $("form.proofForm").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $(this).attr('action');
        var t = $(this);
        t.find('.loader').css('display','block');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (data) {
                var res = JSON.parse(data)
                alert(res.message);
                $("form.proofForm").append('<input type="hidden" name="'+res.csrfName+'" value="'+res.csrfHash+'" style="display:none;">')
                $("form.pswrdrst").append('<input type="hidden" name="'+res.csrfName+'" value="'+res.csrfHash+'" style="display:none;">')
                $("form#bankform").append('<input type="hidden" name="'+res.csrfName+'" value="'+res.csrfHash+'" style="display:none;">')
                t.find('.loader').css('display','none');
                if(res.success == 1){
                    t.find('.verification-img img').attr('src',res.image)
                    t.find('span.wanki').remove();
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    $("#bankform").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var url = $(this).attr('action');
        var t = $(this);
        t.find('.loader').css('display','block');
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (data) {
                var res = JSON.parse(data)
                alert(res.message);
                $("form.proofForm").append('<input type="hidden" name="'+res.csrfName+'" value="'+res.csrfHash+'" style="display:none;">')
                $("form.pswrdrst").append('<input type="hidden" name="'+res.csrfName+'" value="'+res.csrfHash+'" style="display:none;">')
                $("form#bankform").append('<input type="hidden" name="'+res.csrfName+'" value="'+res.csrfHash+'" style="display:none;">')
                t.find('.loader').css('display','none');
                if(res.success == 1){
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
    $(document).on('submit','.pswrdrst',function(e){
        e.preventDefault();
        var formData = new FormData(this);
        var url = $(this).attr('action');
        var formData = $(this).serialize();
        $.post(url,formData,function(res){
            alert(res.message);
            $("form.proofForm").append('<input type="hidden" name="'+res.csrfName+'" value="'+res.csrfHash+'" style="display:none;">')
            $("form.pswrdrst").append('<input type="hidden" name="'+res.csrfName+'" value="'+res.csrfHash+'" style="display:none;">')
            $("form#bankform").append('<input type="hidden" name="'+res.csrfName+'" value="'+res.csrfHash+'" style="display:none;">')
            // if(res.success == 1){
            //     document.getElementById("pswrdrst").reset();
            // }
        },'json')
    })

$.get('<?php echo base_url("Assets/banks.json")?>',function(res){
    var html = '<option value="">Choose your bank</option>';
    var bank_name = '<?php echo $user_bank->bank_name;?>';
    $.each(res,function(key,value){
        html += '<option value="'+value+'" '+( value == bank_name ? 'selected' : '')+'>'+key+'</option>';
    })
    $("#txtBakName").html(html);
},'json')

$(document).on('change','#bnktoggle',function(){
    $('#bankform').toggle();
    $('#btcForm').toggle();
})
</script>
