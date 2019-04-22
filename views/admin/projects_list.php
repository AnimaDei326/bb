<?
$projects = $this->params['projects'];
?>

<script>
    function changeActive(id, status){

        if(status){
            project_active = 'Y'; //формат для отправки данных на сервер
            old_status = false; //для возврата в предыдущий статус в случае ошибки
        }else{
            project_active = 'N';
            old_status = true;
        }

        $.ajax({
            url: "/project/Switch_active",
            method: 'POST',
            data: {
                id: id,
                status: project_active,
            },
            success: function(response){

                if(response !== 'true'){

                    alert('Произошла ошибка: ' + response);
                    a = $('#project_'+id);
                    a.prop('checked', old_status)

                }
            },
        });
    }
    function deleteProject(id){

        if (confirm('Вы уверены, что хотите удалить проект?')) {
            $.ajax({
                url: "/project/DeleteProject",
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
                <a href="/admin/projects">Список проектов</a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-link">Контент</li>
            <li class="crumb-trail">Проекты</li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->



<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

<? if($projects):?>
    <!-- begin: .tray-center -->
    <div class="tray tray-center">

        <div class="col-md-12">
            <div class="panel panel-visible" id="spy2">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>Список проектов</div>
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
                            <?foreach ($projects as $project):?>
                                <tr data-id="<?=$project['id_Project']?>">
                                    <td><a href="/admin/project/<?=$project['id_Project']?>/"?><?=$project['project_Name']?></a></td>
                                    <td><?=$project['id_Project']?></td>
                                    <td><?=$project['sort']?></td>
                                    <td>
                                        <div class="admin-form">
                                            <label class="switch block mt15">
                                                <input
                                                        onChange="changeActive('<?=$project['id_Project']?>', this.checked )"
                                                        type="checkbox" name="tools"
                                                        id="<?='project_'.$project['id_Project']?>"
                                                    <? echo ($project['active'] == 'Y') ? 'checked' : '' ;?>
                                                >
                                                <label for="<?='project_'.$project['id_Project']?>" data-on="Да" data-off="Нет"></label>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="bs-component">
                                            <div class="btn-group">
                                                <button onclick="deleteProject('<?=$project['id_Project']?>')" type="button" class="btn btn-danger dark">
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
            <a href="/admin/project_add">
                <button type="button" class="btn btn-primary">Добавить</button>
            </a>
        </div>

    </div>
    <!-- end: .tray-center -->

</section>
<!-- End: Content -->