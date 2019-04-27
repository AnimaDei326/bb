<? $client =  $this->params['client'][0];?>


<!-- Start: Topbar -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="/admin/client/<?=$client['id']?>/"><?=$client['name']?></a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Контент</li>
            <li class="crumb-trail">
                <a href="/admin/clients">Заказчики</a>
            </li>
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
                                        <input name="id" value="<?=$client['id']?>" readonly class="form-control">
                                    </div>
                                </div>
                            </div>


                            <hr class="short alt">


                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Название</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input required type="text" name="name" class="form-control" value="<?=$client['name']?>">
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
                                                <img src="/images/<?=$client['picture']?>" alt="<?=$client['picture']?>">
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

