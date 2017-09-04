<!-- Main navigation -->
<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
            <li><a href="../index.html"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
            <li>
                <a href="javascript:void(0)"><i class="icon-stack"></i> <span>Institutions</span></a>
                <ul>
                    <li><a href="{{ route('admin::institutions.index') }}">List</a></li>
                    <li><a href="{{ route('admin::institutions.create') }}">Add New</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="icon-stack"></i> <span>Profile Fields</span></a>
                <ul>
                    <li><a href="{{ route('admin::fields.index') }}">List</a></li>
                    <li><a href="{{ route('admin::fields.create') }}">Add New</a></li>
                </ul>
            </li>
            <li><a href="../changelog.html"><i class="icon-list-unordered"></i> <span>Changelog</span></a></li>
            <!-- /main -->

        </ul>
    </div>
</div>
<!-- /main navigation -->