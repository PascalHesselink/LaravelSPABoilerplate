import {restoreSession} from './RestoreSession';

export function authenticate(store, route) {
    axios.interceptors.response.use({}, (error) => {
        if (
            error.response.status === 401
        ) {
            store.commit('setUser', '');
            store.commit('setAccessToken', '');

            route.push({
                name : 'login'
            });
        }

        return Promise.reject(error);
    });

    route.beforeEach((to, from, next) => {
        let AuthUser  = store.state.AuthUser.user;
        let AuthLevel = to.meta.authLevel;

        switch (AuthLevel) {
            case undefined:
                next();
                break;
            case 0:
                next();
                break;
            case 1:
                if (!AuthUser)
                    return next({
                        name : 'login'
                    });
                else
                    next();
                break;
            case 2:
                if (AuthUser)
                    return next({
                        name : 'dashboard'
                    });
                else
                    next();
                break;
        }
    });
}
