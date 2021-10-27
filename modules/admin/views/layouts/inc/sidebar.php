 <?php
 use yii\helpers\Url;
 ?>
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \Yii::$app->homeUrl ?>" target="_blank" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Electro74</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <span class="" style="color:#a9a9a9;" ><?= \Yii::$app->user->identity->username ?></span>
          <a href=" <?= Url::to(['auth/logout']) ?>"> : LogOut</a>
          
          
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <!--<div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!--<li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>-->

          <li class="nav-item">
            <a href="<?= Url::to('/admin/main/index') ?>" class="nav-link">
              
              <i class="far fa-chart-bar"></i>
              <p>
                Статистика
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= Url::to('/admin/customers/index')  ?>" class="nav-link">
              
            <i class="fas fa-shopping-cart"></i>
              <p>
                Заказы                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= Url::to('/admin/organizations/index') ?>" class="nav-link">
              
            <i class="fa fa-users"></i>
              <p>
                Организации              
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= Url::to('/admin/category/index')  ?>" class="nav-link">
              
            <i class="fas fa-object-group"></i>
              <p>
                Группы               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= Url::to('/admin/sub-category/index')  ?>" class="nav-link">
              
            <i class="far fa-object-group"></i>
              <p>
                Подгруппы               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= Url::to('/admin/items/index') ?>" class="nav-link">
              
            <i class="fas fa-tools"></i>
              <p>
                Товар               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= Url::to('/admin/items/upload') ?>" class="nav-link">
              
            <i class="fas fa-file-upload"></i>
              <p>
                Загрузка прайса              
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= Url::to('/admin/password/change') ?>" class="nav-link">              
            <i class="fa fa-cog" aria-hidden="true"></i>
              <p>
                Пароль             
              </p>
            </a>
          </li>

          



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>