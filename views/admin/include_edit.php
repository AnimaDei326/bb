<? $data =  $this->params['data'];?>


<!-- Start: Topbar -->
<header id="topbar" class="alt">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-icon">
                <a href="/admin">
                    <span class="glyphicon glyphicon-home"></span>
                </a>
            </li>
            <li class="crumb-trail">Служебное</li>
            <li class="crumb-trail">Html-область</li>
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
                    <span class="panel-title">Редактирование включаемого кода</span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="/include/edit" method="POST" enctype="multipart/form-data">

                        <div class="col-md-12">
                            <div class="panel panel-visible" id="spy2">

                                <div class="panel-body pn">
                                    <textarea name="data" style="min-height: 300px;" class="form-control"><?=$data;?></textarea>
                                </div>
                            </div>

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
</section>
<!-- End: Content -->











