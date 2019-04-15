

<!-- Start: Topbar -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="/admin/client_add">Добавление заказчика</a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-link">Контент</li>
            <li class="crumb-trail">
                <a href="/admin/clients">Заказчики</a>
            </li>
            <li class="crumb-trail">
                Добавление заказчика
            </li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->







<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

    <!-- begin: .tray-center -->
    <div class="tray tray-center" style="width: 100%;">


        <div class="col-md-12">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Основное</span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="/client/add" method="POST" enctype="multipart/form-data">


                        <hr class="short alt">


                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Название</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input name="name" type="text" id="inputStandard" class="form-control" value="">
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
                                    <span class="panel-title"> Загрузка фотографий</span>
                                </div>
                                <div class="panel-body">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-preview thumbnail mb20">
                                            <img data-src="holder.js/100%x195" alt="holder">
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
