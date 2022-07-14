<nav>
            <ul class="menu-aside">
                <li class="menu-item active">
                    <a class="menu-link" href="index.html"> <i class="icon material-icons md-home"></i>
                        <span class="text">Dashboard</span>
                    </a>
                </li>



                <li class="menu-item has-submenu">
                    <a class="menu-link" > <i class="icon material-icons md-image"></i>
                        <span class="text">Company Managment</span>
                    </a>
                    <div class="submenu">
                        <a href="{{route('company.index')}}">All Company</a>
                        <a href="{{route('company.create')}}">Add Company</a>
        
                    </div>
                </li>

                <li class="menu-item has-submenu">
                    <a class="menu-link" href=""> <i class="icon material-icons md-comment"></i>
                        <span class="text">Employee Managment</span>
                    </a>
                    <div class="submenu">
                        <a href="{{route('employee.index')}}">All Employee</a>
                        <a href="{{route('employee.create')}}">Add Employee</a>
        
                    </div>
                </li>
</ul>
                </nav>