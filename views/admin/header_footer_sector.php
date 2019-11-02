<? $sectors =  $this->params['sectors'];?>

<script>


    function deleteNewItem(id) {

        if (confirm('Вы уверены, что хотите удалить элемент?')) {
            $('[data-id=' + id + ']').remove();
        }
    }

    function deleteItem(id) {

        if (confirm('Вы уверены, что хотите удалить элемент?')) {

            $.ajax({
                url: "/headerfooter/delete",
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

    function changeItemActive(id, status){

        if(status){
            item_active = 'Y'; //формат для отправки данных на сервер
            old_status = false; //для возврата в предыдущий статус в случае ошибки
        }else{
            item_active = 'N';
            old_status = true;
        }

        $.ajax({
            url: "/headerfooter/Switch_active",
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

    function addItem(){
        let numbers = $("#items div").map(function(){
            return parseFloat(this.getAttribute('data-id')) || -Infinity;
        }).toArray();
        let max = Math.max.apply(Math, numbers);
        if (numbers == -Infinity) {max = 0;}
        let newId = max + 1;
        let itemTitle = newId + '_item_new_title';
        let itemSort = newId + '_item_new_sort';
        let itemActive = newId + '_item_new_active';

        let div = "<div data-id=\""+newId+"\">"+
            "<div class=\"form-group\">"+
            "<label for=\"inputStandard\" class=\"col-lg-3 control-label\">Активность</label>"+
            "<div class=\"col-lg-6\">"+
            "<div class=\"admin-form\">"+
            "<label class=\"switch block mt15\">"+
            "<input type=\"checkbox\" name=\""+itemActive+"\" id=\""+itemTitle+"\" checked>"+
            "<label for=\""+itemTitle+"\" data-on=\"Да\" data-off=\"Нет\"></label>"+
            "</label>"+
            "</div>"+
            "</div>"+
            "</div>"+
            "<div class=\"form-group\">"+
            "<label for=\"inputStandard\" class=\"col-lg-3 control-label\">Сортировка</label>"+
            "<div class=\"col-lg-6\">"+
            "<div class=\"bs-component\">"+
            "<input required class=\"form-control\" name=\""+itemSort+"\" value=\"100\" type=\"number\">"+
            "</div>"+
            "</div>"+
            "</div>"+
            "<div class=\"form-group\">"+
            "<label for=\"inputStandard\" class=\"col-lg-3 control-label\">Подпись</label>"+
            "<div class=\"col-lg-6\">"+
            "<div class=\"bs-component\">"+
            "<input class=\"form-control\" name=\""+itemTitle+"\">"+
            "</div>"+
            "</div>"+
            "</div>"+
            "<div class=\"form-group\">"+
            "<label for=\"inputStandard\" class=\"col-lg-3 control-label\">Удалить</label>"+
            "<div class=\"col-lg-6\">"+
            "<div class=\"bs-component\">"+
            "<div class=\"btn-group\">"+
            "<span class=\"glyphicons glyphicons-pencil\"></span>"+
            "<button onclick=\"deleteNewItem('"+newId+"')\" type=\"button\" class=\"btn btn-danger dark\">"+
            "<i class=\"fa fa-delete\">✗</i>"+
            "</button>"+
            "</div>"+
            "</div>"+
            "</div>"+
            "</div>"+
            "<div class=\"mw800 center-block\">"+
            "<div class=\"panel mt50\" id=\"spy2\">"+
            "<div class=\"panel-heading\">"+
            "<span class=\"panel-icon\">"+
            "<i class=\"fa fa-upload\"></i>"+
            "</span>"+
            "<span class=\"panel-title\">Загрузка фотографий</span>"+
            "</div>"+
            "<div class=\"panel-body\">"+
            "<div class=\"fileupload fileupload-new\" data-provides=\"fileupload\">"+
            "<div class=\"fileupload-preview thumbnail mb20\" style=\"background: rgba(0, 0, 0, 0.1);\">"+
            "<img id=\"picture_"+newId+"\" data-src=\"holder.js/100%x195\" alt=\"holder\">"+
            "</div>"+
            "<div class=\"row\">"+
            "<div class=\"col-xs-12\">"+
            "<span class=\"btn btn-system btn-file btn-block\">"+
            "<span class=\"fileupload-new\">Выбрать фотографию</span>"+
            "<span class=\"fileupload-exists\">Заменить</span>"+
            "<input id=\"picture-input_"+newId+"\" name=\"picture_"+newId+"\" type=\"file\">"+
            "</span>"+
            "</div>"+
            "</div>"+
            "</div>"+
            "</div>"+
            "</div>"+
            "</div>"+
            "<hr class=\"short alt\">"+
            "</div>"
        $('#btn-add-photo').before(div);
        clearPicture(newId);
    }
</script>
<!-- Start: Topbar -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="/admin/header_footer/sector">Сектора</a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Хедер и футер</li>
            <li class="crumb-trail">Сектора</li>
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
                    <span class="panel-title">Сектора</span>
                </div>
                <div class="panel-body">
                    <form id="items" class="form-horizontal" role="form" action="/headerfooter/edit" method="POST" enctype="multipart/form-data">
                        <? foreach ($sectors as $item):?>
                            <div data-id="<?=$item['id']?>">

                                <div class="form-group">
                                    <label for="inputStandard" class="col-lg-3 control-label">Активность</label>
                                    <div class="col-lg-6">
                                        <div class="admin-form">
                                            <label class="switch block mt15">
                                                <input onChange="changeItemActive('<?=$item['id']?>', this.checked )" type="checkbox" name="<?=$item['id']?>_item_active" id="<?='item_'.$item['id']?>" <? echo ($item['active'] == 'Y') ? 'checked' : '' ;?>>
                                                <label for="<?='item_'.$item['id']?>" data-on="Да" data-off="Нет"></label>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputStandard" class="col-lg-3 control-label">Сортировка</label>
                                    <div class="col-lg-6">
                                        <div class="bs-component">
                                            <input required class="form-control" name="<?=$item['id']?>_item_sort" value="<?=$item['sort']?>" type="number">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputStandard" class="col-lg-3 control-label">Подпись</label>
                                    <div class="col-lg-6">
                                        <div class="bs-component">
                                            <input class="form-control" name="<?=$item['id']?>_item_title" value="<?=$item['title']?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label for="inputStandard" class="col-lg-3 control-label">Удалить</label>

                                    <div class="col-lg-6">

                                        <div class="bs-component">
                                            <div class="btn-group">
                                                <span class="glyphicons glyphicons-pencil"></span>
                                                <button onclick="deleteItem('<?=$item['id']?>')" type="button" class="btn btn-danger dark">
                                                    <i class="fa fa-delete">✗</i>
                                                    <!-- Удалить -->
                                                </button>
                                            </div>
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
                                                <div class="fileupload-preview thumbnail mb20" style="background: rgba(0, 0, 0, 0.1);">
                                                    <?if ($item['value']):?>
                                                        <img id="picture_<?=$item['id']?>" src="/images/<?=$item['value']?>" alt="<?=$item['value']?>">
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <span class="btn btn-system btn-file btn-block">
                                                            <span class="fileupload-new">Выбрать фотографию</span>
                                                            <span class="fileupload-exists">Заменить</span>
                                                            <input id="picture-input_<?=$item['id']?>" name="picture_<?=$item['id']?>" type="file">
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-6" onclick="clearPicture('<?=$item['id']?>')">
                                                      <span class="btn btn-system btn-file btn-block">
                                                        <span class="fileupload-delete">Очистить</span>
                                                      </span>
                                                    </div>
                                                </div>
                                                    <?else:?>
                                                        <img id="picture_<?=$item['id']?>" data-src="holder.js/100%x195" alt="holder">
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <span class="btn btn-system btn-file btn-block">
                                                            <span class="fileupload-new">Выбрать фотографию</span>
                                                            <span class="fileupload-exists">Заменить</span>
                                                            <input id="picture-input_<?=$item['id']?>" name="picture_<?=$item['id']?>" type="file">
                                                        </span>
                                                    </div>
                                                </div>
                                            <?endif;?>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="short alt">
                        </div>
                        <?endforeach;?>


                        <button id="btn-add-photo" class="btn btn-primary" onclick="addItem()" type="button">Добавить элемент</button>

                        <div class="col-sm-12 col-sm-offset-5">
                            <button class="btn btn-white" type="reset">Сбросить</button>
                            <button class="btn btn-primary" type="submit">Сохранить</button>
                        </div>
                        <input type="hidden" value="sector" name="type">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end: .tray-center -->
</section>
<!-- End: Content -->











