<?
$contact_data = $this->params['contact_data'][0];
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
</script>
<!-- Start: Topbar -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="/admin/form_contact/<?=$contact_data['id']?>/">Заявка</a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-icon">
                <a href="/admin/form_contacts">
                    Заявки
                </a>
            </li>
        </ol>
    </div>
</header>
<!-- End: Topbar -->



<!-- Begin: Content -->
<section id="content" class="table-layout animated fadeIn">

<? if($contact_data):?>
    <!-- begin: .tray-center -->
    <div class="tray tray-center">
        <form class="form-horizontal" role="form" action="/formContact/edit" method="POST" enctype="multipart/form-data">

            <div class="col-md-12">

                <!-- Input Fields -->
                <div class="panel">
                    <div class="panel-heading">
                        <span class="panel-title">Основное</span>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Дата создания</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input name="date" value="<?=$contact_data['date']?>" readonly  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Имя</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input name="name" type="text" id="inputStandard" class="form-control" value="<?=$contact_data['name']?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Телефон</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input name="phone" value="<?=$contact_data['phone']?>"  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">E-mail</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <input name="email" value="<?=$contact_data['email']?>"  class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Обработано</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <div class="admin-form">
                                        <label class="switch block mt5">
                                            <input onChange="changeView('<?=$contact_data['id']?>', this.checked )" type="checkbox" name="view" id="<?='contact_'.$contact_data['id']?>" <? echo ($contact_data['view'] == 'Y') ? 'checked' : '' ;?>>
                                            <label for="<?='contact_'.$contact_data['id']?>" data-on="Да" data-off="Нет"></label>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputStandard" class="col-lg-3 control-label">Комментарий</label>
                            <div class="col-lg-8">
                                <div class="bs-component">
                                    <textarea name="comment" class="form-control"><?=$contact_data['comment']?></textarea>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?=$contact_data['id']?>">




                    </div>
                </div>
            </div>


            <div class="col-sm-12 col-sm-offset-5">
                <button class="btn btn-white" type="reset">Сбросить</button>
                <button class="btn btn-primary" type="submit">Сохранить</button>
            </div>
        </form>

    </div>
<?else:?>
    <div class="col-md-12"><h3>Заявка была удалена или никогда и вовсе не существовала</h3></div>
<?endif;?>

    </div>
    <!-- end: .tray-center -->

</section>
<!-- End: Content -->