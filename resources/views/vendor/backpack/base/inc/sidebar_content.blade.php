<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>{{ trans('backpack::base.dashboard') }}</a></li>
<li class="nav-title"></li>

<li class="nav-title">Партнерки</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('feeds') }}'><i class="las la-comments-dollar"></i> Парсеры</a></li>

<li class="nav-title mt-3">Каталог</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la la-stream'></i> Категории</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('products') }}'><i class='nav-icon la la-box'></i>Товары</a></li>

<li class="nav-title mt-3">Атрибуты</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('groups') }}'><i class="la la-cubes"></i> Группы атрибутов</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('attributes') }}'><i class="la la-cube"></i> Атрибуты</a></li>

<li class="nav-title">СЕО</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('meta-generators') }}'><i class="las la-money-check-alt"></i> Генераторы</a></li>

<li class="nav-title mt-3">Подборки на главной</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('compilation-groups') }}'><i class='nav-icon la la-copy'></i> Группы подборок</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('collection') }}'><i class='nav-icon la la-file-alt'></i> Подборки</a></li>


<li class="nav-title mt-3">Администрирование</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class="las la-user-friends nav-icon"></i>Пользователи</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
