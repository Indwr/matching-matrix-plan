<?php include_once'header.php'; ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Video Task Perform</h1>
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
                <div class="col-md-12">
                    <div class="bg-white p-4 mb-4">
                        <?php
                        if ($user_info->paid_status == 1) {
                            if (!empty($task)) {
                                echo $task['tasks'] . '/15 videos Completed<br>';
                                if ($task['redeem'] == 0) {
                                    if ($task['tasks'] < 15) {
                                        echo'<a class="btn btn-success" href="' . base_url('Dashboard/Task/TaskPerform') . '">Perform</a>';
                                    } elseif ($task['tasks'] >= 15 && $task['redeem'] == 0) {
                                        echo'<button class="btn btn-success" id="rdmbtn">Redeem</button>';
                                    }
                                } else {
                                    echo'You Have redeemd your money<br>';
                                }
                            } else {
                                echo '0/5 videos Completed<br>';
                                echo'<a class="btn btn-success" href="' . base_url('Dashboard/Task/TaskPerform') . '">Perform</a>';
                            }
                            ?>
                            <div class="table-responsive mt-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Link</td>
                                            <td>Status</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($task_links as $key => $links) {
                                            echo'<tr>';
                                            echo'<td>' . ($key + 1) . '</td>';
                                            echo'<td> Video No .' . ($key + 1) . '</td>';
                                            echo'<td><a class="btn btn-success tskbtn" data-task_id="' . $links['id'] . '" data-url="' . $links['link'] . '" target="_blank">View</a></td>';
                                            echo'<td></td>';
                                            // if (empty($links['counter'])) {
                                            //     // echo'<td>Not Completed</td>';
                                            //     echo'<td><a class="btn btn-success tskbtn" data-task_id="' . $links['id'] . '" data-url="' . $links['link'] . '" target="_blank">View</a></td>';
                                            //     // echo'<td><iframe width="560" height="315" src="https://www.youtube.com/embed/' . $links['link'] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>';
                                            // } else {
                                            //     echo'<td>Completed</td>';
                                            //     echo'<td></td>';
                                            // }

                                            echo'</tr>';
                                        }
                                        ?>
                                    </tbody>    
                                </table>

                                <div>
                                    <?php
                                } else {
                                    echo'Please Activate Your Account For Completing task';
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once'footer.php'; ?>
        <script>
            // $(document).on('click', '#rdmbtn', function () {
            //     var url = '<?php echo base_url("Dashboard/Task/RedeemMoney"); ?>';
            //     $.get(url, function (res) {
            //         alert(res.message)
            //         if (res.success == 1)
            //             window.location.href = '<?php echo base_url("Dashboard/Task") ?>';
            //     }, 'json')
            // })
            $(document).on('click', '.tskbtn', function (e) {
                e.preventDefault();
                var link = $(this).data('url')
                var task_id = $(this).data('task_id');
                var url = '<?php echo base_url("Dashboard/Task/TaskComplete/"); ?>' + task_id;
                $.get(url, function (res) {
                    alert(res.message)
                    if (res.success == 1) {
                        window.open(link, '_blank');
                        location.reload();
                    }
                    // window.location.href= link;
                }, 'json')
            })
        </script>