<? $client =  $this->params['client'][0];?>


<!-- Start: Topbar -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="/admin/clients">Список заказчиков</a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Контент</li>
            <li class="crumb-trail">Заказчики</li>
            <li class="crumb-trail">Редактирование заказчика</li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
    <? if ($client):?>
        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <div class="col-md-12">
                <!-- Input Fields -->
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Основное</span>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="/client/edit" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">ID</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input name="id" value="<?=$client['id']?>" readonly >
                                    </div>
                                </div>
                            </div>


                            <hr class="short alt">


                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Название</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input type="text" name="name" class="form-control" value="<?=$client['name']?>">
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
                                                <img data-src="/images/<?=$client['picture']?>" alt="<?=$client['picture']?>">
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

            <div class="col-sm-12 col-sm-offset-5">
                <button class="btn btn-white" type="reset">Сбросить</button>
                <button class="btn btn-primary" type="submit">Сохранить</button>
            </div>
            </form>
        </div>
        <!-- end: .tray-center -->
    <?else:?>
        Заказчик была удален или никогда и вовсе не существовал
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



    });
</script>
<!-- END: PAGE SCRIPTS -->