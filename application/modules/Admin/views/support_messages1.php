<?php include'header.php' ?>
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <!--Begin::App-->
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

            <!--Begin:: App Aside Mobile Toggle-->
            <button class="kt-app__aside-close" id="kt_chat_aside_close">
                <i class="la la-close"></i>
            </button>

            <!--End:: App Aside Mobile Toggle-->

            <!--Begin:: App Aside-->
            <div class="kt-grid__item kt-app__toggle kt-app__aside kt-app__aside--lg kt-app__aside--fit" id="kt_chat_aside" style="opacity: 1;">

                <!--begin::Portlet-->
                <div class="kt-portlet kt-portlet--last">
                    <div class="kt-portlet__body">
                        <div class="kt-searchbar">
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" id="Path" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg></span></div>
                                <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="kt-widget kt-widget--users kt-mt-20">
                            <div class="kt-scroll kt-scroll--pull ps ps--active-y" style="height: 152px; overflow: hidden;">
                                <div class="kt-widget__items" id="chatUsers">
                                    <?php
                                    foreach ($users as $user) {
                                        ?>
                                        <div class="kt-widget__item userBtn" data-user_id="<?php echo $user['user_id']; ?>" data-username="<?php echo $user['first_name'] . ' ' . $user['last_name']; ?>">
                                            <span class="kt-userpic kt-userpic--circle">
                                                <img src="<?php echo base_url('uploads/' . $user['image']); ?>" alt="image">
                                            </span>
                                            <div class="kt-widget__info">
                                                <div class="kt-widget__section">
                                                    <a href="#" class="kt-widget__username"><?php echo $user['user_id']; ?></a>
                                                    <span class="kt-badge kt-badge--success kt-badge--dot"></span>
                                                </div>
                                                <span class="kt-widget__desc">
                                                    <?php echo $user['first_name'] . ' ' . $user['last_name']; ?>
                                                </span>
                                            </div>
                                            <div class="kt-widget__action">
                                                <span class="kt-widget__date">5 Hours</span>
                                                <!--<span class="kt-badge kt-badge--success kt-font-bold">0</span>-->
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">

                                    </div>

                                </div>
                                <div class="ps__rail-y" style="top: 0px; height: 152px; right: -2px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 40px;">

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!--end::Portlet-->
            </div>

            <!--End:: App Aside-->

            <!--Begin:: App Content-->
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content" id="kt_chat_content">
                <div class="kt-chat">
                    <div class="kt-portlet kt-portlet--head-lg kt-portlet--last">
                        <div class="kt-portlet__head">
                            <div class="kt-chat__head ">
                                <div class="kt-chat__left">


                                </div>
                                <div class="kt-chat__center">
                                    <div class="kt-chat__label">
                                        <a href="#" class="kt-chat__title" id="chat_user"></a>
                                        <input type="hidden" id="chat_user_id"/>
                                        <span class="kt-chat__status">
                                            <span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
                                        </span>
                                    </div>
                                    <div class="kt-chat__pic kt-hidden">
                                        <span class="kt-userpic kt-userpic--sm kt-userpic--circle" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Jason Muller">
                                            <img src="https://localhost/DWAY/uploads/1565595770.png" alt="image">
                                        </span>
                                        <span class="kt-userpic kt-userpic--sm kt-userpic--circle" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Nick Bold">
                                            <img src="https://localhost/DWAY/uploads/1565595770.png" alt="image">
                                        </span>
                                        <span class="kt-userpic kt-userpic--sm kt-userpic--circle" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Milano Esco">
                                            <img src="https://localhost/DWAY/uploads/1565595770.png" alt="image">
                                        </span>
                                        <span class="kt-userpic kt-userpic--sm kt-userpic--circle" data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Teresa Fox">
                                            <img src="https://localhost/DWAY/uploads/1565595770.png" alt="image">
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-scroll kt-scroll--pull ps ps--active-y" data-mobile-height="300" style="height: 356px; overflow: hidden;" id="fullBody">
                                <div class="kt-chat__messages" id="ChatBody">

                                </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 356px; right: -2px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 140px;"></div></div></div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-chat__input">
                                <div class="kt-chat__editor">
                                    <textarea style="height: 50px" id="Cmessage" placeholder="Type here..."></textarea>
                                </div>
                                <div class="kt-chat__toolbar">
                                    <div class="kt_chat__tools">
                                        <a href="#"><i class="flaticon2-link"></i></a>
                                        <a href="#"><i class="flaticon2-photograph"></i></a>
                                        <a href="#"><i class="flaticon2-photo-camera"></i></a>
                                    </div>
                                    <div class="kt_chat__actions">
                                        <button type="button" class="btn btn-brand btn-md btn-upper btn-bold" id="rpbtn  ">reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--End:: App Content-->
        </div>

        <!--End::App-->
    </div>

    <!-- end:: Content -->
</div>
<?php include'footer.php' ?>
<script src="<?php echo base_url('classic/'); ?>assets/js/demo1/pages/custom/apps/chat/chat.js" type="text/javascript"></script>
<script>
    function show_messages() {
        var user_id = $('#chat_user_id').val();
        $.get('<?php echo base_url("Admin/Support/user_messages/") ?>' + user_id, function (res) {
            var html = '';
            $.each(res.messages, function (key, value) {
                if (value.sender == 'admin') {
                    html += '<div class="kt-chat__message kt-chat__message--right">' +
                            '<div class="kt-chat__user">' +
                            '   <span class="kt-userpic kt-userpic--circle kt-userpic--sm">' +
                            '      <img src="<?php echo base_url('classic/logo.png') ?>" alt="image">' +
                            ' </span>' +
                            '<a href="#" class="kt-chat__username">DWAY</a>' +
                            '<span class="kt-chat__datetime">' + value.created_at + '</span>' +
                            '</div>' +
                            '<div class="kt-chat__text kt-bg-light-success">' +
                            value.message +
                            '</div>' +
                            '</div>';
                } else {

                    html += '<div class="kt-chat__message">' +
                            '<div class="kt-chat__user">' +
                            '   <span class="kt-userpic kt-userpic--circle kt-userpic--sm">' +
                            '      <img src="<?php echo base_url('uploads/') ?>' + value.image + '" alt="image">' +
                            ' </span>' +
                            '<a href="#" class="kt-chat__username">' + value.first_name + '</a>' +
                            '<span class="kt-chat__datetime">' + value.created_at + '</span>' +
                            '</div>' +
                            '<div class="kt-chat__text kt-bg-light-success">' +
                            value.message +
                            '</div>' +
                            '</div>';
                }
            })
            $('#ChatBody').html(html)
            $('#fullBody').animate({
                scrollTop: $('#fullBody')[0].scrollHeight}, "slow");
        }, 'json')
    }
    show_messages();
    $(document).on('click', '.userBtn', function () {
        var user_info = $(this).data('username') + '(' + $(this).data('user_id') + ')';
        $('#chat_user_id').val($(this).data('user_id'))
        $('#chat_user').text(user_info)
        show_messages();
        $('#fullBody').animate({
            scrollTop: $('#fullBody')[0].scrollHeight}, "slow");
    })
    $(document).on('keydown', '#Cmessage', function (e) {
        if (e.keyCode == 13) {
            send_message()
            e.preventDefault();
            return false;
        }
    });
    $(document).on('click', '#rpbtn', function () {
        send_message()
    })
    function send_message() {
        var url = '<?php echo base_url('Admin/Support/SubmitQuery'); ?>';
        var formData = {
            'message': $('#Cmessage').val(),
            'user_id': $('#chat_user_id').val()
        }
        $.post(url, formData, function (res) {
            if (res.success == 1) {
                var html = '<div class="kt-chat__message kt-chat__message--right">' +
                        '<div class="kt-chat__user">' +
                        '   <span class="kt-userpic kt-userpic--circle kt-userpic--sm">' +
                        '      <img src="<?php echo base_url('classic/logo.png') ?>" alt="image">' +
                        ' </span>' +
                        '<a href="#" class="kt-chat__username">DWAY</a>' +
                        '<span class="kt-chat__datetime">Just Now</span>' +
                        '</div>' +
                        '<div class="kt-chat__text kt-bg-light-success">' +
                        formData.message +
                        '</div>' +
                        '</div>';
                $('#ChatBody').append(html)
                $('#fullBody').animate({
                    scrollTop: $('#fullBody')[0].scrollHeight}, "slow");

            }
        }, 'json')
        $('#Cmessage').val('');
    }
    function show_users() {
        var url = '<?php echo base_url("Admin/Support/show_users") ?>';
        var html = '';
        $.get(url, function (res) {

            $.each(res.users, function (key, value) {

                html += '<div class="kt-widget__item userBtn" data-user_id="' + value.user_id + '" data-username="' + value.user_id + '">' +
                        '<span class="kt-userpic kt-userpic--circle">' +
                        '<img src="<?php echo base_url('uploads/'); ?>' + value.image + '" alt="image">' +
                        '</span>' +
                        '<div class="kt-widget__info">' +
                        '<div class="kt-widget__section">' +
                        '<a href="#" class="kt-widget__username">' + value.first_name +' ' + value.last_name +'</a>' +
                        '  <span class="kt-badge kt-badge--success kt-badge--dot"></span>' +
                        '</div>' +
                        '<span class="kt-widget__desc">' +
                        value.user_id +
                        ' </span>' +
                        '</div>' +
                        ' <div class="kt-widget__action">' +
                        ' <span class="kt-widget__date ">5 Hours</span>' +
                     //   '<span class="kt-badge kt-badge--success kt-font-bold">0</span>' +
                        ' </div>' +
                        '</div>';

//                console.log(html)
            });
            $('#chatUsers').html(html)
            setTimeout(function () {
                show_users()
            }, 5000);
        }, 'json')
    }
    show_users();
</script>