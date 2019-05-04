<?
$contact_list = $this->params['contact_list'];
?>

<script>
    function changeView(id, status){

        if(status){
            new_status = 'Y'; //формат для отправки данных на сервер
            old_status = false; //для возврата в предыдущий статус в случае ошибки
        }else{
            new_status = 'N';
            old_status = true;
        }

        $.ajax({
            url: "/formContact/Switch_view",
            method: 'POST',
            data: {
                id: id,
                view: new_status,
            },
            success: function(response){

                if(response !== 'true'){

                    alert('Произошла ошибка: ' + response);
                    a = $('#form_'+id);
                    a.prop('checked', old_status)

                }
            },
        });
    }
    function deleteItem(id){

        if (confirm('Вы уверены, что хотите удалить заявку?')) {
            $.ajax({
                url: "/formContact/delete",
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
                <a href="/admin/form_contact">Список заявок</a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-link">Заявки</li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->



<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

<? if($contact_list):?>
    <!-- begin: .tray-center -->
    <div class="tray tray-center">

        <div class="col-md-12">
            <div class="panel panel-visible" id="spy2">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>Список заявок</div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Дата</th>
                            <th>Обработано</th>
                            <th class="text-right">Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?foreach ($contact_list as $item):?>
                                <tr data-id="<?=$item['id']?>">
                                    <td><a href="/admin/form_contact/<?=$item['id']?>/"?><?=$item['name']?></a></td>
                                    <td><?=$item['phone']?></td>
                                    <td><?=$item['date']?></td>
                                    <td>
                                        <div class="admin-form">
                                            <label class="switch block mt15">
                                                <input
                                                        onChange="changeView('<?=$item['id']?>', this.checked )"
                                                        type="checkbox" name="tools"
                                                        id="<?='form_'.$item['id']?>"
                                                    <? echo ($item['view'] == 'Y') ? 'checked' : '' ;?>
                                                >
                                                <label for="<?='form_'.$item['id']?>" data-on="Да" data-off="Нет"></label>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="text-right">
                                        <div class="bs-component">
                                            <div class="btn-group">
                                                <button onclick="deleteItem('<?=$item['id']?>')" type="button" class="btn btn-danger dark">
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

    </div>
    <!-- end: .tray-center -->

</section>
<!-- End: Content -->