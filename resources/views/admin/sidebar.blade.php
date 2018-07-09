<!-- sidebar -->
<section class="sidebar">
	<!-- Sidebar user panel -->
	<div class="user-panel">
		<div class="pull-left image">
			<img src="/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
			<p>{{\_Function::user(\Auth::id())}}</p>
			<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	</div>

	<!-- sidebar menu -->
	<ul class="sidebar-menu" data-widget="tree">
		<li class="header">НАВІГАЦІЯ</li>
		<li @if (url()->full() == url('/admin_panel')) class="active" @endif>
            <a href="{{ url('/admin_panel') }}"><i class="fa fa-tv"></i> <span>Панель управління</span>
			</a>
		</li>
		<li @if (url()->full() == url('/admin_panel/interior')) class="active" @endif>
            <a href="{{ url('/admin_panel/interior') }}"><i class="fa fa-photo"></i> <span>Інтер'єри</span>
			</a>
		</li>
        <li @if (url()->full() == url('/admin_panel/collection')) class="active" @endif>
            <a href="{{ url('/admin_panel/collection') }}"><i class="fa fa-laptop"></i><span>Колекції</span>
			</a>
		</li>
		<li @if (url()->full() == url('/admin_panel/catalog')) class="active" @endif>
            <a href="{{ url('/admin_panel/catalog') }}"><i class="fa fa-book"></i> <span>Каталог</span>
			</a>
		</li>
		<li @if (url()->full() == url('/admin_panel/parser/index')) class="active" @endif>
            <a href="{{ url('/admin_panel/parser/index') }}"><i class="fa fa-hand-grab-o"></i> <span>Парсер</span>
			</a>
		</li>
		<li @if (url()->full() == url('/admin_panel/news')) class="active" @endif>
            <a href="{{ url('/admin_panel/news') }}"><i class="fa fa-newspaper-o"></i> <span>Новини</span>
			</a>
		</li>
        <li @if (url()->full() == url('/admin_panel/contact-update')) class="active" @endif>
            <a href="{{ url('/admin_panel/contact-update') }}"><i class="fa fa-compress"></i><span>Контакти компанії</span>
			</a>
		</li>
        <li @if (url()->full() == url('/admin_panel/users')) class="active" @endif>
            <a href="{{ url('/admin_panel/users') }}"><i class="fa fa-users"></i><span>Користувачі</span>
			</a>
		</li>
        <li @if (url()->full() == url('/admin_panel/order')) class="active" @endif>

            <a href="{{ url('/admin_panel/order') }}"><i class="fa fa-cart-arrow-down"></i><span>Замовлення   </span>
			</a>
		</li>
		<li @if (url()->full() == url('/admin_panel/about_us')) class="active" @endif>

			<a href="{{ url('/admin_panel/about_us') }}"><i class="fa fa-info"></i><span>Про нас   </span>
			</a>
		</li>
	</ul>

</section>
<!-- /.sidebar -->
