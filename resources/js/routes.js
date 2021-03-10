import Mysidebar from './components/global/Mysidebar'
import AdminDashboard from './components/AdminDashboard'
import IndexUser from './components/users/IndexUser'
import CreateUser from './components/users/CreateUser'
import IndexCategory from './components/categories/IndexCategory'

const routes = [
    { path: '/admin', component:Mysidebar },
    { path: '/dashboard', name: 'dashboard', component:AdminDashboard },
    { path: '/users', component:IndexUser },
    { path: '/create/user', component:CreateUser},
    { path: '/categories', component:IndexCategory}
  ]


export default routes
