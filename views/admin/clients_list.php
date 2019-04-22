<?
$clients = $this->params['clients'];
?>

<script>
    function deleteClient(id){

        if (confirm('Вы уверены, что хотите удалить заказчика?')) {
            $.ajax({
                url: "/client/DeleteClient",
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

            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-link">Контент</li>
            <li class="crumb-trail">Заказчики</li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->



<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

<? if($clients):?>
    <!-- begin: .tray-center -->
    <div class="tray tray-center">

        <div class="col-md-12">
            <div class="panel panel-visible" id="spy2">
                <div class="panel-heading">
                    <div class="panel-title hidden-xs">
                        <span class="glyphicon glyphicon-tasks"></span>Список заказчиков</div>
                </div>
                <div class="panel-body pn">
                    <table class="table table-striped table-hover" id="datatable2" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>ID</th>
                            <th class="text-right">Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?foreach ($clients as $client):?>
                                <tr data-id="<?=$client['id']?>">
                                    <td><a href="/admin/client/<?=$client['id']?>/"?><?=$client['name']?></a></td>
                                    <td><?=$client['id']?></td>
                                    <td class="text-right">
                                        <div class="bs-component">
                                            <div class="btn-group">
                                                <button onclick="deleteClient('<?=$client['id']?>')" type="button" class="btn btn-danger dark">
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
            <a href="/admin/client_add">
                <button type="button" class="btn btn-primary">Добавить</button>
            </a>
        </div>

    </div>
    <!-- end: .tray-center -->

</section>
<!-- End: Content -->