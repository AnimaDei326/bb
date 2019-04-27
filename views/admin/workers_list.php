<?
$workers = $this->params['workers'];
?>

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
    function deleteWorker(id){

        if (confirm('Вы уверены, что хотите удалить работника?')) {
            $.ajax({
                url: "/worker/DeleteWorker",
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
    }
</script>
<!-- Start: Topbar -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="/admin/workers">Список работников</a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-link">Контент</li>
            <li class="crumb-trail">Работники</li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->



<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

    <? if($workers):?>
    <!-- begin: .tray-center -->
    <div class="tray tray-center">

        <div class="col-md-12">
            <div class="panel panel-visible" id="spy2">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>Список работников</div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>ID</th>
                            <th>Сортировка</th>
                            <th>Активность</th>
                            <th class="text-right">Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?foreach ($workers as $worker):?>
                            <tr data-id="<?=$worker['id']?>">
                                <td><a href="/admin/worker/<?=$worker['id']?>/"?><?=$worker['second_name']?> <?=$worker['first_name']?></a></td>
                                <td><?=$worker['id']?></td>
                                <td><?=$worker['sort']?></td>
                                <td>
                                    <div class="admin-form">
                                        <label class="switch block mt15">
                                            <input
                                                onChange="changeActive('<?=$worker['id']?>', this.checked )"
                                                type="checkbox" name="tools"
                                                id="<?='worker_'.$worker['id']?>"
                                                <? echo ($worker['active'] == 'Y') ? 'checked' : '' ;?>
                                            >
                                            <label for="<?='worker_'.$worker['id']?>" data-on="Да" data-off="Нет"></label>
                                        </label>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <div class="bs-component">
                                        <div class="btn-group">
                                            <button onclick="deleteWorker('<?=$worker['id']?>')" type="button" class="btn btn-danger dark">
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
        <?else:?>
            <div class="col-md-12"><h3>Список пуст</h3></div>
        <?endif;?>
        <div class="col-md-12">
            <a href="/admin/worker_add">
                <button type="button" class="btn btn-primary">Добавить</button>
            </a>
        </div>

    </div>
    <!-- end: .tray-center -->

</section>
<!-- End: Content -->