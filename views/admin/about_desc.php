<? $desc =  $this->params['desc'][0];?>


<!-- Start: Topbar -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">
                <a href="/admin/about/description">Описание опыта</a>
            </li>
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">О компании</li>
            <li class="crumb-trail">Описание опыта</li>
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
                    <span class="panel-title">Редактирование текста</span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="/about/edit" method="POST" enctype="multipart/form-data">

                        <div class="col-md-12">
                            <div class="panel panel-visible" id="spy2">

                                <div class="panel-body pn">
                                    <textarea name="name" style="min-height: 300px;" class="form-control"><?=$desc['name'];?></textarea>
                                    <input name="id" value="<?=$desc['id']?>" type="hidden">
                                    <input name="sort" value="<?=$desc['sort']?>" type="hidden">
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-12 col-sm-offset-5">
                            <button class="btn btn-white" type="reset">Сбросить</button>
                            <button class="btn btn-primary" type="submit">Сохранить</button>
                        </div>
                        <input type="hidden" value="desc" name="type">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end: .tray-center -->
</section>
<!-- End: Content -->











