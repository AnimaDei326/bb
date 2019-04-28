<? $text =  $this->params['text'];?>

<script>
    let countNewItems = 1;


    function changeItemActive(id, status){

        if(status){
            item_active = 'Y'; //формат для отправки данных на сервер
            old_status = false; //для возврата в предыдущий статус в случае ошибки
        }else{
            item_active = 'N';
            old_status = true;
        }

        $.ajax({
            url: "/about/Switch_active",
            method: 'POST',
            data: {
                id: id,
                status: item_active,
            },
            success: function(response){

                if(response !== 'true'){

                    alert('Произошла ошибка: ' + response);
                    a = $('#text_'+id);
                    a.prop('checked', old_status)

                }
            },
        });
    }


    function deleteItem(id) {

        if (confirm('Вы уверены, что хотите удалить пункт?')) {

            $.ajax({
                url: "/about/delete",
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
                <a href="/admin/about/directions">Направления деятельности</a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">О компании</li>
            <li class="crumb-trail">Направления деятельности</li>
            <li class="crumb-trail">Редактирование</li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->
<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">
    <!-- begin: .tray-center -->
    <div class="tray tray-center">

        <div class="col-md-12">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Список</span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="/about/edit" method="POST" enctype="multipart/form-data">

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
                                        <?if($text):?>
                                            <? foreach ($text as $item):?>
                                                <tr data-id="<?=$item['id']?>">
                                                    <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="<?=$item['id']?>_item_name" value="<?=$item['name']?>" style="width: 100%"></td>
                                                    <td class="col-md-5 col-sm-4 col-xs-3"><input class="form-control" name="<?=$item['id']?>_item_sort" value="<?=$item['sort']?>" type="number"></td>
                                                    <td>
                                                        <div class="admin-form">
                                                            <label class="switch block mt15">
                                                                <input onChange="changeItemActive('<?=$item['id']?>', this.checked )" type="checkbox" name="<?=$item['id']?>_item_active" id="<?='item_'.$item['id']?>" <? echo ($item['active'] == 'Y') ? 'checked' : '' ;?>>
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
                        <input type="hidden" value="text" name="type">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end: .tray-center -->
</section>
<!-- End: Content -->











