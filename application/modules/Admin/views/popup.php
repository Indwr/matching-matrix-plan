<?php include_once'header.php'; ?>
 <div class="main-content">
    <div class="page-content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <section class="content-header">
            <span class="">Popup Image</span>
            <?php if($popup['status'] == 0){ ?>
              <a href="<?php echo base_url('Admin/Settings/popupSetting');?>"><button>ON</button></a>
            <?php }else{ ?>
              <a href="<?php echo base_url('Admin/Settings/popupSetting');?>"><button>OFF</button></a>
            <?php } ?>
          </section>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
              <li class="breadcrumb-item">Popup</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    
        <div class="card">
          <div class="card-body">
        <div class="row">

          <div class="col-md-6">
          <?php echo $this->session->flashdata('error');?>
            <?php echo form_open_multipart('',array('id' => 'walletForm'));?>
            <h3 class="text-danger"><?php if(!empty($error)) {echo $error;}  ?></h3>
            <div class="form-group">
                <label>Caption</label>
                <input type="text" class="form-control" name="caption" value="<?php echo set_value('caption');?>" id="user_id" placeholder="Caption"/>
                <span class="text-danger"><?php echo form_error('caption')?></span>
                <span id="errorMessage"></span>
            </div>
            <div class="form-group">
                <label>Type</label>
                <select class="form-control" name="type" id="selectType"/>
                    <option value="image">Image</option>
                    <?php if(empty($user)):?>
                    <option value="video">Video</option>
                    <?php endif;?>
                </select>
            </div>
            <div class="form-group" id="imageField">
                <label>Media</label>
                <?php echo form_input(array('class' => 'form-control', 'type' => 'file', 'name' => 'media'));?>
                <span class="text-danger"><?php echo form_error('media')?></span>
            </div>
            <div class="form-group" id="videoField" style="display:none;">
                <label>VIdeo link</label>
                <?php echo form_input(array('class' => 'form-control', 'type' => 'text', 'name' => 'media'));?>
                <span class="text-danger"><?php echo form_error('media')?></span>
            </div>
            <div class="form-group">
                <button type="subimt" name="save" class="btn btn-success" />Send</button>
            </div>
            <?php echo form_close();?>
          </div>
           </div>
        </div>
        </div>
      </div>
    </div>
     </div>

<?php include_once'footer.php'; ?>
<script>
  $(document).on('change','#selectType',function(){
        $('#imageField').toggle();
        $('#videoField').toggle();
  })
</script>
