<?php include_once'header.php'; ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Task Perform</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Task</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <div id="some_div"></div>
            
            </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once'footer.php'; ?>
  <script>
    var timeLeft = 5;
    var elem = document.getElementById('some_div');
    var timerId = setInterval(countdown, 1000);
    function countdown() {
        if (timeLeft == 0) {
            clearTimeout(timerId);
            taskComplete();
        } else {
            elem.innerHTML = timeLeft + ' seconds remaining';
            timeLeft--;
        }
    }
    countdown()
    function taskComplete(){
        var url = '<?php echo base_url("Dashboard/Task/TaskComplete");?>';
        $.get(url,function(res){
            // alert(res.message)
            // if(res.success == 1)
                window.location.href='<?php echo base_url("Dashboard/Task")?>';
        },'json')
    }
    </script>