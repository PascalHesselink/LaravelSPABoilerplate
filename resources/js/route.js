import Index from './pages/Index';
import Login from './pages/Login';
import Register from './pages/Register';
import Dashboard from './pages/Dashboard';

// Auth level
// 0 - All users can view this page whether they are authenticated or not
// 1 - Users should be authenticated to view this page
// 2 - Only guests can view this page

export default {
    routes : [
        {
            path      : '/',
            name      : 'index',
            component : Index,
            meta      : {
                authLevel : 2
            }
        },
        {
            path      : '/login',
            name      : 'login',
            component : Login,
            meta      : {
                authLevel : 2
            }
        },
        {
            path      : '/register',
            name      : 'register',
            component : Register,
            meta      : {
                authLevel : 2
            }
        },
        {
            path      : '/dashboard',
            name      : 'dashboard',
            component : Dashboard,
            meta      : {
                authLevel : 1
            }
        }
    ],
    mode   : 'history'
};
