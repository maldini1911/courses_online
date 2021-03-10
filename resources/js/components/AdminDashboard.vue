<template>
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
            <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                <i class="fa fa-youtube"></i>
                </div>
                <p class="card-category">Videos</p>
                <h3 class="card-title">{{videos}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <router-link to="/dash" class="warning-link"> All videos </router-link>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                <i class="material-icons">store</i>
                </div>
                <p class="card-category">Skills</p>
                <h3 class="card-title">{{skills}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <router-link to="/dash" class="warning-link">All Skills </router-link>
                </div>
            </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                <i class="fa fa-tags"></i>
                </div>
                <p class="card-category">Tags</p>
                <h3 class="card-title">{{tags}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <router-link to="/dash" class="warning-link">All Tags </router-link>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                <i class="fa fa-comments"></i>
                </div>
                <p class="card-category">Comments</p>
                <h3 class="card-title">{{comments}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <router-link to="/dash" class="warning-link"> All Comments </router-link>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'dashboard',
    data(){
        return{
            videos:1,
            skills:2,
            tags:3,
            comments:4
        }
    }
}
</script>
