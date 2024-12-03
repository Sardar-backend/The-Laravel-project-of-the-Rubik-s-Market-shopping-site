<!-- <head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</head> -->

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="/storage/{{request()->user()->image}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">{{request()->user()->name}}</a>
          </div>
        </div>
@php
use Nwidart\Modules\Facades\Module;
$module= Module::find('Discount');
@endphp
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link @if (Request::path()=='admin_PRODUCT' || Request::path()=='admin_PRODUCT/create' || Request::path()=='admin_blog' || Request::path()=='admin_blog/create' | Request::path()=='admin_category' || Request::path()=='admin_category/create' ||  Request::path()=='admin_comment' || Request::path()=='admin_blogCategory' || Request::path()=='admin_blogCategory/create' || Request::path()=='admin' || Request::path()=='user/create' )active @endif ">
                <!-- <i class="nav-icon fa fa-dashboard"></i> -->
                <i class="nav-icon fa fa-tachometer-alt"></i>

                <p>
                داشبورد
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('admin_PRODUCT.index')}}" class="nav-link @if (Request::path()=='admin_PRODUCT' || Request::path()=='admin_PRODUCT/create' ) active @endif ">
                    <i class="fa fa-box"></i>
                    <p>محصولات</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin_blog.index')}}" class="nav-link @if (Request::path()=='admin_blog' || Request::path()=='admin_blog/create' ) active @endif">
                    <i class="fa fa-file-text"></i>
                    <p>مقالات</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin_comment.index')}}" class="nav-link @if (Request::path()=='admin_comment'  ) active @endif">
                    <i class="fa fa-comments"></i>
                    <p>کامنت ها </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin_category.index')}}" class="nav-link @if (Request::path()=='admin_category' || Request::path()=='admin_category/create' ) active @endif">
                    <i class="fa fa-folder"></i>
                    <p>دسته بندی محصولات</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin_blogCategory.index')}}" class="nav-link @if (Request::path()=='admin_blogCategory' || Request::path()=='admin_blogCategory/create' ) active @endif">
                    <i class="fa fa-list"></i>
                    <p>دسته بندی مقالات</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('admin')}}" class="nav-link @if (Request::path()=='admin' || Request::path()=='user/create' ) active @endif
                  ">
                    <i class="fa fa-users"></i>
                    <p>کاربران</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link @if (Request::path()=='ACL/permissions' || Request::path()=='ACL/permissions/create' ||Request::path()=='ACL/Roles' || Request::path()=='ACL/Roles/create'  ) active @endif ">
              <i class="fa fa-lock"></i>
                <p>
                سطح دسترسی
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('Roles.index')}}" class="nav-link @if (Request::path()=='ACL/Roles' || Request::path()=='ACL/Roles/create' ) active @endif ">
                <!-- <i class="fa fa-user-shield"></i> -->
                <i class="fa fa-id-badge"></i>

                    <p>مقام ها </p>
                </a>
            </li>
                <li class="nav-item">
                    <a href="{{route('permissions.index')}}" class="nav-link @if (Request::path()=='ACL/permissions' || Request::path()=='ACL/permissions/create'  ) active @endif ">
                <i class="fa fa-certificate"></i>
                    <p>مجوز ها </p>
                  </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('admin_Orders.index')}}" class="nav-link @if (Request::path()=='admin_Orders' ) active @endif ">
            <i class="fa fa-shopping-cart"></i>
            <p>
             سفارشات
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('massage')}}" class="nav-link @if (Request::path()=='admin/massage' ) active @endif ">
            <i class="fa fa-comment"></i>
            <p>
              پیغام ها
            </p>
          </a>
        </li>
        </li>
        @if ($module->isEnabled())

        <li class="nav-item">
          <a href="{{route('discount.index')}}" class="nav-link @if (Request::path()=='discount' || Request::path()=='discount/create' ) active @endif ">
            <!-- <i class="fa fa-comment"></i> -->
            <i class="fa fa-tags"></i>
            <p>
               کد های تخفیف
            </p>
          </a>
        </li>
        @else
        <li class="nav-item">
            <a href="{{ route(name: 'discount.able') }}" class="nav-link">
            <i class="fa fa-tags"></i>
            <p>
            فعال سازی ماژول کد تخفیف
            </p>
          </a>
        </li>

        @endif
        <!-- <li class="nav-item">
          <a href="{{route('Reports')}}" class="nav-link @if (Request::path()=='admin/Reports' ) active @endif ">
          <i class="fa fa-info-circle"></i>

            <p>
               گزارشات
            </p>
          </a>
        </li> -->
            <!-- <li class="nav-item">
              <a href="{{route('permissions.index')}}" class="nav-link @if (Request::path()=='admin/ACL' ) active @endif ">
              <i class="fa fa-lock"></i>
                <p>
                  سطح دسترسی
                </p>
              </a>
            </li> -->

             <!--
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-pie-chart"></i>
                <p>
                  چارت‌ها
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>نمودار ChartJS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>نمودار Flot</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/inline.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>نمودار Inline</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-tree"></i>
                <p>
                  اشیای گرافیکی
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/UI/general.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>عمومی</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/icons.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>آیکون‌ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/buttons.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>دکمه‌ها</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/sliders.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اسلایدر‌ها</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-edit"></i>
                <p>
                  فرم‌ها
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/forms/general.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اجزا عمومی</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/advanced.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>پیشرفته</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>ویشرایشگر</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>
                  جداول
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/tables/simple.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>جداول ساده</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>جداول داده</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">مثال‌ها</li>
            <li class="nav-item">
              <a href="pages/calendar.html" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                  تقویم
                  <span class="badge badge-info right">2</span>
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-envelope-o"></i>
                <p>
                  ایمیل‌ باکس
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/mailbox/mailbox.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اینباکس</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/mailbox/compose.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>ایجاد</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/mailbox/read-mail.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>خواندن</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-book"></i>
                <p>
                  صفحات
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/examples/invoice.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>سفارشات</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/profile.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>پروفایل</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/login.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>صفحه ورود</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/register.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>صفحه عضویت</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/lockscreen.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>قفل صفحه</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-plus-square-o"></i>
                <p>
                  بیشتر
                  <i class="fa fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/examples/404.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>ارور 404</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/500.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>ارور 500</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/examples/blank.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>صفحه خالی</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="starter.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>صفحه شروع</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-header">متفاوت</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>مستندات</p>
              </a>
            </li>
            <li class="nav-header">برچسب‌ها</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-circle-o text-danger"></i>
                <p class="text">مهم</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-circle-o text-warning"></i>
                <p>هشدار</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-circle-o text-info"></i>
                <p>اطلاعات</p>
              </a>
            </li> -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
