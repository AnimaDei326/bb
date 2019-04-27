<? $positions = $this->params['positions'];?>


<!-- Start: Topbar -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="/admin/worker_add>/">Новый работник</a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Контент</li>
            <li class="crumb-trail">
                <a href="/admin/workers">Работники</a>
            </li>
            <li class="crumb-trail">Добавление работника</li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <form class="form-horizontal" role="form" action="/worker/add" method="POST" enctype="multipart/form-data">

            <div class="col-md-12">

                <!-- Input Fields -->
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Основное</span>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Сортировка</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input name="sort" type="number" id="inputStandard" class="form-control" value="100">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Активность</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <div class="admin-form">
                                        <label class="switch block mt5">
                                            <input  type="checkbox" name="active" id="active" checked >
                                            <label for="active" data-on="Да" data-off="Нет"></label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="short alt">

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Имя</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input type="text" name="first_name" required class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Фамилия</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input type="text" name="second_name" required class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Институт</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input type="text" name="institution" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Специальность</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input type="text" name="speciality" class="form-control">
                                </div>
                            </div>
                        </div>

                        <hr class="short alt">

                        <div class="form-group">
                            <label for="client" class="col-lg-3 control-label">Позиция</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <select id="position" name="position" class="form-control">
                                        <? foreach ($positions as $position):?>
                                            <option value="<?=$position['id']?>"><?=$position['name']?></option>
                                        <?endforeach;?>
                                    </select>
                                    <i class="arrow"></i>
                                </div>
                            </div>
                        </div>

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

</section>
<!-- End: Content -->

