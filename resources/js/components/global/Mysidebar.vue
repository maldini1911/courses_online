<template>
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="./assets/img/sidebar-2.jpg">
        <div class="logo">
        <router-link to="/foo">Maldini</router-link>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item">
                    <router-link to="/dashboard" class="nav-link">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/users" class="nav-link">
                        <i class="fa fa-users"></i>
                        <p>Users</p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/categories" class="nav-link">
                        <i class="material-icons">content_paste</i>
                        <p>Categories</p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/foo" class="nav-link">
                        <i class="material-icons">bubble_chart</i>
                        <p>Skills</p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/foo" class="nav-link">
                        <i class="fa fa-tags"></i>
                        <p>Tags</p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/foo" class="nav-link">
                        <i class="material-icons">bubble_chart</i>
                        <p>Pages</p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/foo" class="nav-link">
                        <i class="material-icons">tv</i>
                        <p>Videos</p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/foo" class="nav-link">
                        <i class="material-icons">email_85</i>
                        <p>Messages</p>
                    </router-link>
                </li>
                <!-- your sidebar here -->
            </ul>
        </div>
    </div>
</template>
