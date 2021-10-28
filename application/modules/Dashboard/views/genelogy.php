<?php $this->load->view('header'); ?>
<style>
  .treemainscas  ul, #myUL {
        list-style-type: none;
    }

     .treemainscas #myUL {
        margin: 0;
        padding: 0;
    }
    body {

    background: #ffffff !important;

}

  .treemainscas  .caret {
        cursor: pointer;
        -webkit-user-select: none; /* Safari 3.1+ */
        -moz-user-select: none; /* Firefox 2+ */
        -ms-user-select: none; /* IE 10+ */
        user-select: none;
        font-size: 16px;
    font-weight: bold;
    width: 100%;
    }

    .treemainscas .caret::before {
        content: "\25B6";
        color: black;

        margin-right: 6px;
    }
    .content {

    background-color: #fff;
  }
    .treemainscas .caret-down::before {
        -ms-transform: rotate(90deg); /* IE 9 */
        -webkit-transform: rotate(90deg); /* Safari */
        transform: rotate(90deg);
    }

  .treemainscas  .nested {
        display: none;
    }

  .treemainscas  .active {
        display: block;
    }
  .treemainscas  span.dropbtn input {
    border-radius: 50% !important;
}

ul.nested li {
    width: 100%;
    float: left;
    margin: 10px 0px;
    display: inline;
    font-size: 9px;
}
</style>
<div class="main-content">
      <div class="page-content">
      <div class="container-fluid">
         <section class="content-header">
        <span style="">Genelogy List View</span>
      </section>
        <div id="content">
    <div >
     
  <div id="rootwizard" class="wizard wizard-full-width" style="background:white">
      <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
            <div class="col-md-12">
              <div class="treemainscas">
                <ul id="myUL">
                    <li>
                        <span class="caret"><?php echo $this->session->userdata['user_id']; ?></span>
                        <ul class="nested">
                            <?php foreach ($directs as $direct) {
                                ?>
                                <li>
                                    <span class="caret innerCaret" data-user_id="<?php echo $direct['user_id']; ?>"><?php echo $direct['user_id']; ?>(<?php echo $direct['name']; ?>)</span>
                                    <ul class="nested">
                                        <li>fs</li>
                                    </ul>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                </ul></div>
            </div>
        </div>
      </div>
    </div>
  </div>  </div>
   </div>
   </div>
   </div>
   </div>
   </div>
<?php include'footer.php' ?>

<script>
    var toggler = document.getElementsByClassName("caret");

    $(document).on('click', '.caret', function () {
//        $(this).parent('li').find('ul').toggle('active')
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function () {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    })
    $(document).on('click', '.innerCaret', function () {
        var t = $(this);
//        console.log($(this).parent('li').find('ul').html('<li><span class="caret">Lemon Tea</span></li>'))
        var url = '<?php echo base_url('Dashboard/User/genelogy_users/'); ?>';
        var html = '';
        $.get(url + $(this).data('user_id'), function (res) {
            $.each(res.directs, function (key, value) {
                html += '<li><span class="caret innerCaret" data-user_id="' + value.user_id + '">' + value.user_id + '('+ value.name +')</span><ul class="nested"></ul></li>';
            })
            t.parent('li').find('ul').html(html);
        }, 'json');
    });
</script>
