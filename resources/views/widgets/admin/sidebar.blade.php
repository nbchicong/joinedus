<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed sidebar-scroll" data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
    <script type="text/javascript">
        try{ace.settings.loadState('sidebar')}catch(e){}
    </script>
    <!-- /.sidebar-shortcuts -->
    <div class="nav-wrap-up pos-rel">
        <div class="nav-wrap" style="max-height: 334px;">
            <div style="position: relative; top: 0px; transition-property: top; transition-duration: 0.15s;">
                <ul class="nav nav-list" style="top: 0px;">
                    {{--@if(Auth::user()-hasRole('SUPER_ADMIN'))--}}
                    <li id="menu-users-entity" class="">
                        <a href="{{Helper::getWebUrl('admin/users')}}">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text"> @lang('admin_sidebar.menu_user')</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    {{--@endif--}}
                    {{--@if(Auth::user()-hasRole('ADMIN'))--}}
                    <li id="menu-product-category" class="">
                        <a href="{{Helper::getWebUrl('admin/product/category')}}">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> @lang('admin_sidebar.menu_product_category')</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li id="menu-product-brand" class="">
                        <a href="{{Helper::getWebUrl('admin/product/brand')}}">
                            <i class="menu-icon fa fa-bullseye"></i>
                            <span class="menu-text"> @lang('admin_sidebar.menu_product_brand')</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li id="menu-product-entity" class="">
                        <a href="{{Helper::getWebUrl('admin/product')}}">
                            <i class="menu-icon fa fa-bars"></i>
                            <span class="menu-text"> @lang('admin_sidebar.menu_product')</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    {{--@endif--}}
                    <li id="menu-carousel-entity" class="">
                        <a href="{{Helper::getWebUrl('admin/carousel')}}">
                            <i class="menu-icon fa fa-puzzle-piece"></i>
                            <span class="menu-text"> @lang('admin_sidebar.menu_carousel')</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    {{--@if(Auth::user()-hasRole('WRITER'))--}}
                    <li id="menu-entry-category" class="">
                        <a href="{{Helper::getWebUrl('admin/entry/category')}}">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> @lang('admin_sidebar.menu_post_category')</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li id="menu-entry-entity" class="">
                        <a href="{{Helper::getWebUrl('admin/entry')}}">
                            <i class="menu-icon fa fa-file-o"></i>
                            <span class="menu-text"> @lang('admin_sidebar.menu_post')</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li id="menu-page-content" class="">
                        <a href="{{Helper::getWebUrl('admin/page')}}">
                            <i class="menu-icon fa fa-file"></i>
                            <span class="menu-text"> @lang('admin_sidebar.menu_page_content')</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    {{--@endif--}}
                    {{--@if(Auth::user()-hasRole('ADMIN'))--}}
                    <li id="menu-site-config" class="">
                        <a href="{{Helper::getWebUrl('admin/config')}}">
                            <i class="menu-icon fa fa-cog"></i>
                            <span class="menu-text"> @lang('admin_sidebar.menu_config')</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    {{--@endif--}}
                    {{--<li class="">--}}
                        {{--<a href="#" class="dropdown-toggle">--}}
                            {{--<i class="menu-icon fa fa-list"></i>--}}
                            {{--<span class="menu-text"> Tables </span>--}}

                            {{--<b class="arrow fa fa-angle-down"></b>--}}
                        {{--</a>--}}

                        {{--<b class="arrow"></b>--}}

                        {{--<ul class="submenu">--}}
                            {{--<li class="">--}}
                                {{--<a href="tables.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Simple &amp; Dynamic--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="jqgrid.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--jqGrid plugin--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li class="">--}}
                        {{--<a href="#" class="dropdown-toggle">--}}
                            {{--<i class="menu-icon fa fa-pencil-square-o"></i>--}}
                            {{--<span class="menu-text"> Forms </span>--}}

                            {{--<b class="arrow fa fa-angle-down"></b>--}}
                        {{--</a>--}}

                        {{--<b class="arrow"></b>--}}

                        {{--<ul class="submenu">--}}
                            {{--<li class="">--}}
                                {{--<a href="form-elements.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Form Elements--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="form-elements-2.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Form Elements 2--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="form-wizard.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Wizard &amp; Validation--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="wysiwyg.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Wysiwyg &amp; Markdown--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="dropzone.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Dropzone File Upload--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li class="">--}}
                        {{--<a href="widgets.html">--}}
                            {{--<i class="menu-icon fa fa-list-alt"></i>--}}
                            {{--<span class="menu-text"> Widgets </span>--}}
                        {{--</a>--}}

                        {{--<b class="arrow"></b>--}}
                    {{--</li>--}}

                    {{--<li class="">--}}
                        {{--<a href="calendar.html">--}}
                            {{--<i class="menu-icon fa fa-calendar"></i>--}}

							{{--<span class="menu-text">--}}
								{{--Calendar--}}

								{{--<span class="badge badge-transparent tooltip-error" title=""--}}
                                      {{--data-original-title="2 Important Events">--}}
									{{--<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>--}}
								{{--</span>--}}
							{{--</span>--}}
                        {{--</a>--}}

                        {{--<b class="arrow"></b>--}}
                    {{--</li>--}}

                    {{--<li class="">--}}
                        {{--<a href="gallery.html">--}}
                            {{--<i class="menu-icon fa fa-picture-o"></i>--}}
                            {{--<span class="menu-text"> Gallery </span>--}}
                        {{--</a>--}}

                        {{--<b class="arrow"></b>--}}
                    {{--</li>--}}

                    {{--<li class="">--}}
                        {{--<a href="#" class="dropdown-toggle">--}}
                            {{--<i class="menu-icon fa fa-tag"></i>--}}
                            {{--<span class="menu-text"> More Pages </span>--}}

                            {{--<b class="arrow fa fa-angle-down"></b>--}}
                        {{--</a>--}}

                        {{--<b class="arrow"></b>--}}

                        {{--<ul class="submenu">--}}
                            {{--<li class="">--}}
                                {{--<a href="profile.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--User Profile--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="inbox.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Inbox--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="pricing.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Pricing Tables--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="invoice.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Invoice--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="timeline.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Timeline--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="search.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Search Results--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="email.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Email Templates--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="login.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Login &amp; Register--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li class="">--}}
                        {{--<a href="#" class="dropdown-toggle">--}}
                            {{--<i class="menu-icon fa fa-file-o"></i>--}}

							{{--<span class="menu-text">--}}
								{{--Other Pages--}}

								{{--<span class="badge badge-primary">5</span>--}}
							{{--</span>--}}

                            {{--<b class="arrow fa fa-angle-down"></b>--}}
                        {{--</a>--}}

                        {{--<b class="arrow"></b>--}}

                        {{--<ul class="submenu">--}}
                            {{--<li class="">--}}
                                {{--<a href="faq.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--FAQ--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="error-404.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Error 404--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="error-500.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Error 500--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="grid.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Grid--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}

                            {{--<li class="">--}}
                                {{--<a href="blank.html">--}}
                                    {{--<i class="menu-icon fa fa-caret-right"></i>--}}
                                    {{--Blank Page--}}
                                {{--</a>--}}

                                {{--<b class="arrow"></b>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                </ul>
            </div>
        </div>
        {{--<div class="ace-scroll nav-scroll">--}}
            {{--<div class="scroll-track scroll-active" style="display: block; height: 334px;">--}}
                {{--<div class="scroll-bar"--}}
                     {{--style="transition-property: top; transition-duration: 0.1s; height: 278px; top: 0px;"></div>--}}
            {{--</div>--}}
            {{--<div class="scroll-content" style="max-height: 334px;">--}}
                {{--<div style="height: 401px; width: 8px;"></div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div><!-- /.nav-list -->
    {{--<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse" style="z-index: 1;">--}}
        {{--<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state"--}}
           {{--data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>--}}
    {{--</div>--}}
</div>