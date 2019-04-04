<? $service =  $this->params['service'][0];?>
<? $items =  $this->params['items'];?>

<script>
    function changeActive(id, status){
        console.log(status);
        if(status){
            service_active = 'Y'; //формат для отправки данных на сервер
            old_status = false; //для возврата в предыдущий статус в случае ошибки
        }else{
            service_active = 'N';
            old_status = true;
        }

        $.ajax({
            url: "/service/Switch_active",
            method: 'POST',
            data: {
                id: id,
                status: service_active,
            },
            success: function(response){

                if(response !== 'true'){

                    alert('Произошла ошибка: ' + response);
                    a = $('#service_'+id);
                    a.prop('checked', old_status)

                }
            },
        });
    }
    function changeItemActive(id, status){
        console.log(status);
        if(status){
            item_active = 'Y'; //формат для отправки данных на сервер
            old_status = false; //для возврата в предыдущий статус в случае ошибки
        }else{
            item_active = 'N';
            old_status = true;
        }

        $.ajax({
            url: "/service/Switch_item_active",
            method: 'POST',
            data: {
                id: id,
                status: item_active,
            },
            success: function(response){

                if(response !== 'true'){

                    alert('Произошла ошибка: ' + response);
                    a = $('#service_'+id);
                    a.prop('checked', old_status)

                }
            },
        });
    }

    function deleteItem(id){

        $.ajax({
            url: "/service/deleteItem",
            method: 'POST',
            data: {
                id: id,
            },
            success: function(response){

                if(response !== 'true'){

                    alert('Произошла ошибка: ' + response);

                }else{
                    $('[data-id='+id+']').remove();
                }
            },
        });
    }
</script>
<!-- Start: Topbar -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="/admin/services">Список услуг</a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Контент</li>
            <li class="crumb-trail">Услуги</li>
            <li class="crumb-trail">Редактирование услуги</li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
    <? if ($service):?>
        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <div class="col-md-12">
                <!-- Input Fields -->
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Основное</span>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="/service/edit" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Сортировка</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input name="sort" type="number" id="inputStandard" class="form-control" value="<?=$service['sort']?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">ID</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input name="id" value="<?=$service['id']?>" readonly >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Активность</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <div class="admin-form">
                                            <label class="switch block mt5">
                                                <input onChange="changeActive('<?=$service['id']?>', this.checked )" type="checkbox" name="active" id="<?='service_'.$service['id']?>" <? echo ($service['active'] == 'Y') ? 'checked' : '' ;?>>
                                                <label for="<?='service_'.$service['id']?>" data-on="Да" data-off="Нет"></label>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <hr class="short alt">


                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Название</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input type="text" name="name" class="form-control" value="<?=$service['name']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Заголовок для всплывающего окна</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input type="text" name="title" class="form-control" value="<?=$service['title']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Подзаголовок для всплывающего окна</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input type="text" name="subtitle" class="form-control" value="<?=$service['subtitle']?>">
                                    </div>
                                </div>
                            </div>


                            <hr class="short alt">


                            <div class="mw800 center-block">
                                <div class="panel mt50" id="spy2">
                                    <div class="panel-heading">
                            <span class="panel-icon">
                              <i class="fa fa-upload"></i>
                            </span>
                            <span class="panel-title">Загрузка фотографий</span>
                            </div>
                                <div class="panel-body">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-preview thumbnail mb20">
                                            <img data-src="/images/<?=$service['picture']?>" alt="<?=$service['picture']?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                              <span class="btn btn-system btn-file btn-block">
                                                <span class="fileupload-new">Выбрать фотографию</span>
                                                <span class="fileupload-exists">Заменить</span>
                                                <input name="picture" type="file">
                                              </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <?if($items):?>

                            <div class="panel panel-visible" id="spy2">
                                <div class="panel-heading">
                                    <div class="panel-title hidden-xs">
                                        <span class="glyphicon glyphicon-tasks"></span>Пункты</div>
                                </div>
                                <div class="panel-body pn">
<!--                                    <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">-->
<!--                                        <thead>-->
<!--                                        <tr>-->
<!--                                            <th>Название</th>-->
<!--                                            <th>ID</th>-->
<!--                                            <th>Сортировка</th>-->
<!--                                            <th>Активность</th>-->
<!--                                            <th class="text-right">Удалить</th>-->
<!--                                        </tr>-->
<!--                                        </thead>-->
<!--                                        <tbody>-->
                                            <? foreach ($items as $item):?>
                                                <tr data-id="<?=$item['id']?>">
                                                    <td class="col-md-5 col-sm-4 col-xs-3"><input name="<?=$item['id']?>_item_name" value="<?=$item['name']?>"></td>
                                                    <td class="col-md-5 col-sm-4 col-xs-3"><input name="<?=$item['id']?>" value="<?=$item['id']?>" readonly></td>
                                                    <td class="col-md-5 col-sm-4 col-xs-3"><input name="<?=$item['id']?>_item_sort" value="<?=$item['sort']?>" type="number"></td>
                                                    <td>
                                                        <div class="admin-form">
                                                            <label class="switch block mt15">
                                                                <input onChange="changeItemActive('<?=$item['id']?>', this.checked )" type="checkbox" name="tools" id="<?='item_'.$item['id']?>" <? echo ($item['active'] == 'Y') ? 'checked' : '' ;?>>
                                                                <label for="<?='item_'.$item['id']?>" data-on="Да" data-off="Нет"></label>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="bs-component">
                                                            <div class="btn-group">
                                                                <span class="glyphicons glyphicons-pencil"></span>
                                                                <button onclick="deleteItem('<?=$item['id']?>')" type="button" class="btn btn-danger dark">
                                                                    <i class="fa fa-delete">✗</i>
                                                                    <!-- Удалить -->
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?endforeach;?>
<!--                                        </tbody>-->
<!--                                    </table>-->
                                </div>
                            </div>

                        Нужно добавить кнопку "Добавить пункт" при появлении которой появляется еще один инпут
                    <?else:?>
                        Нет одного пункта по этой услуге
                    <?endif;?>
                </div>

                <div class="col-sm-12 col-sm-offset-5">
                    <button class="btn btn-white" type="reset">Сбросить</button>
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </div>
            </form>
        </div>
        <!-- end: .tray-center -->
    <?else:?>
        Услуга была удалена или никогда и вовсе не существовала
    <?endif;?>
</section>
<!-- End: Content -->


<style>
    /* demo page styles */
    body { min-height: 2300px; }

    .content-header b,
    .admin-form .panel.heading-border:before,
    .admin-form .panel .heading-border:before {
        transition: all 0.7s ease;
    }
    /* responsive demo styles */
    @media (max-width: 800px) {
        .admin-form .panel-body { padding: 18px 12px; }
        .option-group .option { display: block; }
        .option-group .option + .option { margin-top: 8px; }
    }
</style>

<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
<script src="/vendor/jquery/jquery-1.11.1.min.js"></script>
<script src="/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- HighCharts Plugin -->
<script src="/vendor/plugins/highcharts/highcharts.js"></script>


<!-- Theme Javascript -->
<script src="/assets/js/utility/utility.js"></script>
<script src="/assets/js/main.js"></script>




<!-- Datatables -->
<script src="/vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

<!-- Datatables Tabletools addon -->
<script src="/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

<!-- Datatables ColReorder addon -->
<script src="/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>

<!-- Datatables Bootstrap Modifications  -->
<script src="/vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>






<!-- Cropper Image Plugin -->
<script src="/vendor/plugins/cropper/cropper.min.js"></script>

<!-- jQuery Zoom Plugin -->
<script src="/vendor/plugins/imagezoom/jquery.elevatezoom.min.js"></script>

<!-- FileUpload Plugin -->
<script src="/vendor/plugins/fileupload/fileupload.js"></script>
<script src="/vendor/plugins/holder/holder.min.js"></script>


<script src="/assets/js/demo/demo.js"></script>



<!-- Widget Javascript -->
<script type="text/javascript">


    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init();






        $('#datatable2').dataTable({
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [-1]
            }],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
            },
            "iDisplayLength": 10,
            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
            "oTableTools": {
                "sSwfPath": "/vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
            }
        });




        // // Form Switcher
        // $('#form-switcher > button').on('click', function() {
        //   var btnData = $(this).data('form-layout');
        //   var btnActive = $('#form-elements-pane .admin-form.active');

        //   // Remove any existing animations and then fade current form out
        //   btnActive.removeClass('slideInUp').addClass('animated fadeOutRight animated-shorter');
        //   // When above exit animation ends remove leftover classes and animate the new form in
        //   btnActive.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
        //     btnActive.removeClass('active fadeOutRight animated-shorter');
        //     $('#' + btnData).addClass('active animated slideInUp animated-shorter')
        //   });
        // });

        // // Cache several DOM elements
        // var pageHeader = $('.content-header').find('b');
        // var adminForm = $('.admin-form');
        // var options = adminForm.find('.option');
        // var switches = adminForm.find('.switch');
        // var buttons = adminForm.find('.button');
        // var Panel = adminForm.find('.panel');

        // // Form Skin Switcher
        // $('#skin-switcher a').on('click', function() {
        //   var btnData = $(this).data('form-skin');

        //   $('#skin-switcher a').removeClass('item-active');
        //   $(this).addClass('item-active')

        //   adminForm.each(function(i, e) {
        //     var skins = 'theme-primary theme-info theme-success theme-warning theme-danger theme-alert theme-system theme-dark';
        //     var panelSkins = 'panel-primary panel-info panel-success panel-warning panel-danger panel-alert panel-system panel-dark';
        //     $(e).removeClass(skins).addClass('theme-' + btnData);
        //     Panel.removeClass(panelSkins).addClass('panel-' + btnData);
        //     pageHeader.removeClass().addClass('text-' + btnData);
        //   });

        //   $(options).each(function(i, e) {
        //     if ($(e).hasClass('block')) {
        //       $(e).removeClass().addClass('block mt15 option option-' + btnData);
        //     } else {
        //       $(e).removeClass().addClass('option option-' + btnData);
        //     }
        //   });
        //   $(switches).each(function(i, ele) {
        //     if ($(ele).hasClass('switch-round')) {
        //       if ($(ele).hasClass('block')) {
        //         $(ele).removeClass().addClass('block mt15 switch switch-round switch-' + btnData);
        //       } else {
        //         $(ele).removeClass().addClass('switch switch-round switch-' + btnData);
        //       }
        //     } else {
        //       if ($(ele).hasClass('block')) {
        //         $(ele).removeClass().addClass('block mt15 switch switch-' + btnData);
        //       } else {
        //         $(ele).removeClass().addClass('switch switch-' + btnData);
        //       }
        //     }

        //   });
        //   buttons.removeClass().addClass('button btn-' + btnData);
        // });

        // setTimeout(function() {
        //   adminForm.addClass('theme-primary');
        //   Panel.addClass('panel-primary');
        //   pageHeader.addClass('text-primary');

        //   $(options).each(function(i, e) {
        //     if ($(e).hasClass('block')) {
        //       $(e).removeClass().addClass('block mt15 option option-primary');
        //     } else {
        //       $(e).removeClass().addClass('option option-primary');
        //     }
        //   });
        //   $(switches).each(function(i, ele) {

        //     if ($(ele).hasClass('switch-round')) {
        //       if ($(ele).hasClass('block')) {
        //         $(ele).removeClass().addClass('block mt15 switch switch-round switch-primary');
        //       } else {
        //         $(ele).removeClass().addClass('switch switch-round switch-primary');
        //       }
        //     } else {
        //       if ($(ele).hasClass('block')) {
        //         $(ele).removeClass().addClass('block mt15 switch switch-primary');
        //       } else {
        //         $(ele).removeClass().addClass('switch switch-primary');
        //       }
        //     }
        //   });
        //   buttons.removeClass().addClass('button btn-primary');
        // }, 800);






    });
</script>
<!-- END: PAGE SCRIPTS -->