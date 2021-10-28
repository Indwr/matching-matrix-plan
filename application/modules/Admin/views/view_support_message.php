<?php include'header.php' ?>
<div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">View Support Message</span>
            </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Support Message</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->



            <div class="row">
                <div class="col-md-6">
                    <?php echo form_open(); ?>
                        <div class="kt-portlet__body">
                            <h2><?php echo $this->session->flashdata('message'); ?></h2>
                            <div class="form-group">
                                <label>Package Title</label>
                                <?php
                                    echo form_input(array('type' => 'text', 'class' => 'form-control', 'name' => 'title', 'value' => $message['title']));
                                ?>
                                <span class="text-danger"><?php echo form_error('title'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <?php
                                echo form_textarea(array('class' => 'form-control', 'name' => 'description', 'value' => $message['message'], 'rows' => 5, 'cols' => 3));
                                ?>
                                <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="0" <?php echo $message['status'] == 0 ? 'selected' : ''?>>Pending</option>
                                    <option value="1" <?php echo $message['status'] == 1 ? 'selected' : ''?>>Resolved</option>
                                    <option value="2" <?php echo $message['status'] == 2 ? 'selected' : ''?>>Unresolved</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Remarks</label>
                                <?php
                                echo form_textarea(array('class' => 'form-control', 'name' => 'remark', 'value' => $message['remark'], 'rows' => 5, 'cols' => 3));
                                ?>
                                <span class="text-danger"><?php echo form_error('remark'); ?></span>
                            </div>

                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <?php
                                echo form_input(array('type' => 'submit', 'class' => 'btn btn-primary', 'name' => 'create', 'value' => 'Update'));
                                ?>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once'footer.php'; ?>


<script type="text/javascript">
$(document).on('submit','#productImageForm',function(e){
    e.preventDefault();
    var url = $(this).attr('action');
    var  formData = new FormData(this);
    var t = $(this);
    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function (data) {
            res = JSON.parse(data);
            alert(res.message)
            t.append('<input type="hidden" name="'+res.token_name+'" value="'+res.token_value+'" style="display:none;">')
            if(res.success == 1)
                location.reload();
        },
        cache: false,
        contentType: false,
        processData: false
    });
})
</script>
