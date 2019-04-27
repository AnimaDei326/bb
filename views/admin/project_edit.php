<? $project =  $this->params['project'][0];?>
<? $done =  $this->params['done'];?>
<? $result =  $this->params['result'];?>
<? $clients =  $this->params['clients'];?>
<? $services =  $this->params['services'];?>

<script>
    let countNewItemsDone = 1;
    let countNewItemsResult = 1;

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

    function deleteItem(id) {

        if (confirm('Вы уверены, что хотите удалить пункт?')) {

            $.ajax({
                url: "/project/deleteItem",
                method: 'POST',
                data: {
                    id: id,
                },
                success: function (response) {

                    if (response !== 'true') {

                        alert('Произошла ошибка: ' + response);

                    } else {
                        $('[data-id=' + id + ']').remove();
                    }
                },
            });
        }
    }

    function deleteNewItemDone(id) {

        if (confirm('Вы уверены, что хотите удалить пункт?')) {
            if(countNewItemsDone === 1){
                addItemDone();
            }
            $('[data-id=' + id + ']').remove();
            --countNewItemsDone;
        }
    }

    function deleteNewItemResult(id) {

        if (confirm('Вы уверены, что хотите удалить пункт?')) {
            if(countNewItemsResult === 1){
                addItemResult();
            }
            $('[data-id=' + id + ']').remove();
            --countNewItemsResult;
        }
    }

    function addItemDone(){
        let numbers = $("#items_done tr").map(function(){
            return parseFloat(this.getAttribute('data-id')) || -Infinity;
        }).toArray();

        let max = 0;

        if (numbers.length !== 0){
            max = Math.max.apply(Math, numbers);
        }
        let newId = max + 1;
        let itemName = newId + '_item_new_done_name';
        let itemSort = newId + '_item_new_done_sort';

        let tr = "<tr data-id=\""+newId+"\">" +
            "<td class=\"col-md-5 col-sm-4 col-xs-3\"><input name=\""+itemName+"\" class='form-control'></td>" +
            "<td class=\"col-md-5 col-sm-4 col-xs-3\"><input name=\""+itemSort+"\"  class='form-control' value=\"100\" type=\"number\"></td>" +
            "<td class=\"text-right\">" +
            "<div class=\"bs-component\">" +
            "<div class=\"btn-group\">" +
            "<span class=\"glyphicons glyphicons-pencil\"></span>" +
            "<button onclick=\"deleteNewItemDone('"+newId+"')\" type=\"button\" class=\"btn btn-danger dark\">" +
            "<i class=\"fa fa-delete\">✗</i>" +
            "</button>" +
            "</div>" +
            "</div>" +
            "</td>" +
            "</tr>"
        $('#items_done tr:last').after(tr);
        ++countNewItemsDone;
    }

    function addItemResult(){
        let numbers = $("#items_result tr").map(function(){
            return parseFloat(this.getAttribute('data-id')) || -Infinity;
        }).toArray();

        let max = 0;

        if (numbers.length !== 0){
            max = Math.max.apply(Math, numbers);
        }
        let newId = max + 1;
        let itemName = newId + '_item_new_result_name';
        let itemSort = newId + '_item_new_result_sort';

        let tr = "<tr data-id=\""+newId+"\">" +
            "<td class=\"col-md-5 col-sm-4 col-xs-3\"><input name=\""+itemName+"\" class='form-control'></td>" +
            "<td class=\"col-md-5 col-sm-4 col-xs-3\"><input name=\""+itemSort+"\"  class='form-control' value=\"100\" type=\"number\"></td>" +
            "<td class=\"text-right\">" +
            "<div class=\"bs-component\">" +
            "<div class=\"btn-group\">" +
            "<span class=\"glyphicons glyphicons-pencil\"></span>" +
            "<button onclick=\"deleteNewItemResult('"+newId+"')\" type=\"button\" class=\"btn btn-danger dark\">" +
            "<i class=\"fa fa-delete\">✗</i>" +
            "</button>" +
            "</div>" +
            "</div>" +
            "</td>" +
            "</tr>"
        $('#items_result tr:last').after(tr);
        ++countNewItemsResult;
    }
</script>
<!-- Start: Topbar -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="/admin/project/<?=$project['id']?>/"><?=$project['name']?></a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Контент</li>
            <li class="crumb-trail">
                <a href="/admin/projects">Проекты</a>
            </li>
            <li class="crumb-trail">Редактирование проекта</li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
    <? if ($project):?>
        <!-- begin: .tray-center -->
        <div class="tray tray-center">
            <form class="form-horizontal" role="form" action="/project/edit" method="POST" enctype="multipart/form-data">

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
                                            <input name="sort" type="number" id="inputStandard" class="form-control" value="<?=$project['sort']?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputStandard" class="col-lg-3 control-label">ID</label>
                                    <div class="col-lg-8">
                                        <div class="bs-component">
                                            <input name="id" value="<?=$project['id']?>"  class="form-control" readonly >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputStandard" class="col-lg-3 control-label">Активность</label>
                                    <div class="col-lg-8">
                                        <div class="bs-component">
                                            <div class="admin-form">
                                                <label class="switch block mt5">
                                                    <input onChange="changeActive('<?=$project['id']?>', this.checked )" type="checkbox" name="active" id="<?='project_'.$project['id']?>" <? echo ($project['active'] == 'Y') ? 'checked' : '' ;?>>
                                                    <label for="<?='project_'.$project['id']?>" data-on="Да" data-off="Нет"></label>
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
                                            <input type="text" name="name" required class="form-control" value="<?=$project['name']?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputStandard" class="col-lg-3 control-label">Цель</label>
                                    <div class="col-lg-8">
                                        <div class="bs-component">
                                            <input type="text" name="goal" class="form-control" value="<?=$project['goal']?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputStandard" class="col-lg-3 control-label">Срок реализации</label>
                                    <div class="col-lg-8">
                                        <div class="bs-component">
                                            <input type="text" name="time" class="form-control" value="<?=$project['time']?>">
                                        </div>
                                    </div>
                                </div>

                                <hr class="short alt">

                                <div class="form-group">
                                    <label for="client" class="col-lg-3 control-label">Клиент</label>
                                    <div class="col-lg-8">
                                        <div class="bs-component">
                                            <select id="client" name="client" class="form-control">
                                                <? foreach ($clients as $client):?>
                                                    <option value="<?=$client['id']?>"
                                                    <? echo ($client['id'] == $project['id_Clients'])? 'selected' : ''?>
                                                    ><?=$client['name']?></option>
                                                <?endforeach;?>
                                            </select>
                                            <i class="arrow"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="service" class="col-lg-3 control-label">Услуга</label>
                                    <div class="col-lg-8">
                                        <div class="bs-component">
                                            <select id="service" name="service" class="form-control">
                                                <? foreach ($services as $service):?>
                                                    <option value="<?=$service['id']?>"
                                                        <? echo ($service['id'] == $project['id_Service'])? 'selected' : ''?>
                                                    ><?=$service['name']?></option>
                                                <?endforeach;?>
                                            </select>
                                            <i class="arrow"></i>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                </div>

                <div class="col-md-12">
                    <div class="panel panel-visible" id="spy2">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="glyphicon glyphicon-tasks"></span>Выполненные работы
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <table id="datatable2" class="table table-striped table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Сортировка</th>
                                        <th class="text-right">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody id="items_done">
                                        <?if($done):?>
                                            <? foreach ($done as $item):?>
                                                <tr data-id="<?=$item['id']?>">
                                                    <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="<?=$item['id']?>_item_done_name" value="<?=$item['name']?>"></td>
                                                    <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="<?=$item['id']?>_item_done_sort" value="<?=$item['sort']?>" type="number"></td>
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
                                        <?endif;?>
                                        <tr data-id="1">
                                            <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="1_item_new_done_name"></td>
                                            <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="1_item_new_done_sort" value="100" type="number"></td>
                                            <td class="text-right">
                                                <div class="bs-component">
                                                    <div class="btn-group">
                                                        <span class="glyphicons glyphicons-pencil"></span>
                                                        <button onclick="deleteNewItemDone('1')" type="button" class="btn btn-danger dark">
                                                            <i class="fa fa-delete">✗</i>
                                                            <!-- Удалить -->
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <button class="btn btn-primary" onclick="addItemDone()" type="button" style="margin-bottom: 50px;">Добавить пункт</button>
                </div>

                <div class="col-md-12">
                    <div class="panel panel-visible" id="spy3">
                            <div class="panel-heading">
                                <div class="panel-title hidden-xs">
                                    <span class="glyphicon glyphicon-tasks"></span>Результаты
                                </div>
                            </div>
                            <div class="panel-body pn">
                                <table id="datatable3" class="table table-striped table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Сортировка</th>
                                        <th class="text-right">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody id="items_result">
                                        <?if($result):?>
                                            <? foreach ($result as $item):?>
                                                <tr data-id="<?=$item['id']?>">
                                                    <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="<?=$item['id']?>_item_result_name" value="<?=$item['name']?>" style="width: 100%"></td>
                                                    <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="<?=$item['id']?>_item_result_sort" value="<?=$item['sort']?>" type="number"></td>
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
                                        <?endif;?>
                                        <tr data-id="2">
                                            <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="2_item_new_result_name"></td>
                                            <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="2_item_new_result_sort" value="100" type="number"></td>
                                            <td class="text-right">
                                                <div class="bs-component">
                                                    <div class="btn-group">
                                                        <span class="glyphicons glyphicons-pencil"></span>
                                                        <button onclick="deleteNewItemResult('2')" type="button" class="btn btn-danger dark">
                                                            <i class="fa fa-delete">✗</i>
                                                            <!-- Удалить -->
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    <button class="btn btn-primary" onclick="addItemResult()" type="button">Добавить пункт</button>
                </div>

                <div class="col-sm-12 col-sm-offset-5">
                    <button class="btn btn-white" type="reset">Сбросить</button>
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </div>
            </form>

        </div>
        <!-- end: .tray-center -->
    <?else:?>
        Проект был удален или никогда и вовсе не существовал
    <?endif;?>
</section>
<!-- End: Content -->

