<? $worker = $this->params['worker'][0];?>
<? $positions = $this->params['positions'];?>

<script>

    function changeActive(id, status){

        if(status){
            worker_active = 'Y'; //формат для отправки данных на сервер
            old_status = false; //для возврата в предыдущий статус в случае ошибки
        }else{
            worker_active = 'N';
            old_status = true;
        }

        $.ajax({
            url: "/worker/Switch_active",
            method: 'POST',
            data: {
                id: id,
                status: worker_active,
            },
            success: function(response){

                if(response !== 'true'){

                    alert('Произошла ошибка: ' + response);
                    a = $('#worker_'+id);
                    a.prop('checked', old_status)

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
                <a href="/admin/worker/<?=$worker['id']?>/"><?=$worker['second_name']?> <?=$worker['first_name']?></a>
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
            <li class="crumb-trail">Редактирование работника</li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
    <? if ($worker):?>
        <!-- begin: .tray-center -->
        <div class="tray tray-center">
            <form class="form-horizontal" role="form" action="/worker/edit" method="POST" enctype="multipart/form-data">

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
                                        <input name="sort" type="number" id="inputStandard" class="form-control" value="<?=$worker['sort']?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">ID</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input name="id" value="<?=$worker['id']?>"  class="form-control" readonly >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Активность</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <div class="admin-form">
                                            <label class="switch block mt5">
                                                <input onChange="changeActive('<?=$worker['id']?>', this.checked )" type="checkbox" name="active" id="<?='worker_'.$worker['id']?>" <? echo ($worker['active'] == 'Y') ? 'checked' : '' ;?>>
                                                <label for="<?='worker_'.$worker['id']?>" data-on="Да" data-off="Нет"></label>
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
                                        <input type="text" name="first_name" required class="form-control" value="<?=$worker['first_name']?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Фамилия</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input type="text" name="second_name" class="form-control" value="<?=$worker['second_name']?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Институт</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input type="text" name="institution" class="form-control" value="<?=$worker['institution']?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputStandard" class="col-lg-3 control-label">Специальность</label>
                                <div class="col-lg-8">
                                    <div class="bs-component">
                                        <input type="text" name="speciality" class="form-control" value="<?=$worker['speciality']?>">
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
                                                <option value="<?=$position['id']?>"
                                                    <? echo ($position['id'] == $worker['id_Positions'])? 'selected' : ''?>
                                                ><?=$position['name']?></option>
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
                                                <?if ($worker['picture']):?>
                                                <img id="picture_<?=$worker['id']?>" src="/images/<?=$worker['picture']?>" alt="<?=$worker['picture']?>">
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-6">
                                                            <span class="btn btn-system btn-file btn-block">
                                                                <span class="fileupload-new">Выбрать фотографию</span>
                                                                <span class="fileupload-exists">Заменить</span>
                                                                <input id="picture-input_<?=$worker['id']?>" name="picture" type="file">
                                                            </span>
                                                </div>
                                                <div class="col-xs-6"  onclick="clearPicture(<?=$worker['id']?>)">
                                                      <span class="btn btn-system btn-file btn-block">
                                                        <span class="fileupload-delete">Очистить</span>
                                                      </span>
                                                </div>
                                            </div>
                                            <?else:?>
                                            <img id="picture_<?=$worker['id']?>" data-src="holder.js/100%x195" alt="holder">
                                        </div>
                                        <div class="row" onclick="setPicture()">
                                            <div class="col-xs-12">
                                                          <span class="btn btn-system btn-file btn-block">
                                                              <span class="fileupload-new">Выбрать фотографию</span>
                                                              <span class="fileupload-exists">Заменить</span>
                                                              <input id="picture-input_<?=$worker['id']?>" name="picture" type="file">
                                                          </span>
                                            </div>
                                        </div>
                                        <?endif;?>
                                        <input id="clear_picture" type="hidden" name="clear_picture" value="N">
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
        Работник был удален или никогда и вовсе не существовал
    <?endif;?>
</section>
<!-- End: Content -->

