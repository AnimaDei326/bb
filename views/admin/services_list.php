<? $services =  $this->params['services'];?>
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

    function deleteService(id){

        $.ajax({
            url: "/service/DeleteService",
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
        </ol>
    </div>
</header>
<!-- End: Topbar -->

<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <? if ($services) : ?>
            <div class="col-md-12">
                <div class="panel panel-visible" id="spy2">
                    <div class="panel-heading">
                        <div class="panel-title hidden-xs">
                            <span class="glyphicon glyphicon-tasks"></span>Список услуг</div>
                    </div>
                    <div class="panel-body pn">
                        <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>ID</th>
                                <th>Сортировка</th>
                                <th>Активность</th>
                                <th class="text-right">Удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? foreach ($services as $service) :?>
                                <tr data-id="<?=$service['id']?>">
                                    <td class="col-md-5 col-sm-4 col-xs-3"><a href="/admin/service/<?=$service['id']?>/"><?=$service['name']?></a></td>
                                    <td><?=$service['id']?></td>
                                    <td><?=$service['sort']?></td>
                                    <td>
                                        <div class="admin-form">
                                            <label class="switch block mt15">
                                                <input onChange="changeActive('<?=$service['id']?>', this.checked )" type="checkbox" name="tools" id="<?='service_'.$service['id']?>" <? echo ($service['active'] == 'Y') ? 'checked' : '' ;?>>
                                                <label for="<?='service_'.$service['id']?>" data-on="Да" data-off="Нет"></label>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="bs-component">
                                            <div class="btn-group">
                                                <span class="glyphicons glyphicons-pencil"></span>
                                                <button onclick="deleteService('<?=$service['id']?>')" type="button" class="btn btn-danger dark">
                                                    <i class="fa fa-delete">✗</i>
                                                    <!-- Удалить -->
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <? else : ?>
            <div class="col-md-12"><h3>Список пуст</h3></div>

        <?endif;?>
        <div class="col-md-12">
            <a href="/admin/service_add">
                <button type="button" class="btn btn-primary">Добавить</button>
            </a>
        </div>

    </div>
    <!-- end: .tray-center -->



</section>
<!-- End: Content -->