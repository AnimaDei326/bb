<? $service =  $this->params['service'][0];?>
<? $items =  $this->params['items'];?>

<script>
    let countNewItems = 1;
    function changeActive(id, status){
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

    function deleteItem(id) {

        if (confirm('Вы уверены, что хотите удалить пункт?')) {

            $.ajax({
                url: "/service/deleteItem",
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

    function deleteNewItem(id) {

        if (confirm('Вы уверены, что хотите удалить пункт?')) {
            if(countNewItems === 1){
                addItem();
            }
            $('[data-id=' + id + ']').remove();
            countNewItems--;
        }
    }

    function addItem(){
        let numbers = $("#items tr").map(function(){
            return parseFloat(this.getAttribute('data-id')) || -Infinity;
        }).toArray();
        let max = Math.max.apply(Math, numbers);
        let newId = max + 1;
        let itemName = newId + '_item_new_name';
        let itemSort = newId + '_item_new_sort';
        let itemActive = newId + '_item_new_active';

        let tr = "<tr data-id=\""+newId+"\">" +
            "<td class=\"col-md-5 col-sm-4 col-xs-3\"><input name=\""+itemName+"\" class='form-control'></td>" +
            "<td class=\"col-md-5 col-sm-4 col-xs-3\"><input name=\""+itemSort+"\" class='form-control' value=\"100\" type=\"number\"></td>" +
            "<td>" +
            "<div class=\"admin-form\"><label class=\"switch block mt15\">" +
            "<input type=\"checkbox\" name=\""+itemActive+"\" id=\""+newId+"\" checked>" +
            "<label for=\""+newId+"\" data-on=\"Да\" data-off=\"Нет\"></label>" +
            "</label></div>" +
            "</td>" +
            "<td class=\"text-right\">" +
            "<div class=\"bs-component\">" +
            "<div class=\"btn-group\">" +
            "<span class=\"glyphicons glyphicons-pencil\"></span>" +
            "<button onclick=\"deleteNewItem('"+newId+"')\" type=\"button\" class=\"btn btn-danger dark\">" +
            "<i class=\"fa fa-delete\">✗</i>" +
            "</button>" +
            "</div>" +
            "</div>" +
            "</td>" +
            "</tr>"
        $('#items tr:last').after(tr);
        countNewItems++;
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
                                        <input name="id" value="<?=$service['id']?>" readonly class="form-control" >
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
                                                <img src="/images/<?=$service['picture']?>" alt="<?=$service['picture']?>">
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


                            <div class="col-md-12">


                                    <div class="panel panel-visible" id="spy2">
                                <div class="panel-heading">
                                    <div class="panel-title hidden-xs">
                                        <span class="glyphicon glyphicon-tasks"></span>Пункты</div>
                                </div>
                                <div class="panel-body pn">
                                    <table id="datatable2" class="table table-striped table-hover" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Название</th>
                                            <th>Сортировка</th>
                                            <th>Активность</th>
                                            <th class="text-right">Удалить</th>
                                        </tr>
                                        </thead>
                                        <tbody id="items">
                                            <?if($items):?>
                                                <? foreach ($items as $item):?>
                                                    <tr data-id="<?=$item['id']?>">
                                                        <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="<?=$item['id']?>_item_name" value="<?=$item['name']?>" style="width: 100%"></td>
                                                        <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="<?=$item['id']?>_item_sort" value="<?=$item['sort']?>" type="number"></td>
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
                                            <?endif;?>
                                            <tr data-id="1">
                                                <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="1_item_new_name"></td>
                                                <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="1_item_new_sort" value="100" type="number"></td>
                                                <td>
                                                    <div class="admin-form">
                                                        <label class="switch block mt15">
                                                            <input type="checkbox" name="1_item_new_active" id="1" checked>
                                                            <label for="1" data-on="Да" data-off="Нет"></label>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td class="text-right">
                                                    <div class="bs-component">
                                                        <div class="btn-group">
                                                            <span class="glyphicons glyphicons-pencil"></span>
                                                            <button onclick="deleteNewItem('1')" type="button" class="btn btn-danger dark">
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
                                <button class="btn btn-primary" onclick="addItem()" type="button">Добавить пункт</button>
                             </div>

                            <div class="col-sm-12 col-sm-offset-5">
                    <button class="btn btn-white" type="reset">Сбросить</button>
                    <button class="btn btn-primary" type="submit">Сохранить</button>
                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end: .tray-center -->
    <?else:?>
        Услуга была удалена или никогда и вовсе не существовала
    <?endif;?>
</section>
<!-- End: Content -->











