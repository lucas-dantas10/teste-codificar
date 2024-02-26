import axiosClient from '../axios';

export function login({commit}, data) {
    return axiosClient.post('/login', data)
            .then(({data}) => {
                console.log(data);
                commit("setUser", data.data.user);
                commit("setToken", data.data.token);
                return data;
            })
}

export function register({commit}, data) {
    return axiosClient.post('/create/user', data)
            .then(({data}) => {
                return data;
            });
}

// export function getCurrentUser({commit}, data) {
//     return axiosClient.get('/user', data)
//       .then(({data}) => {
//         commit('setUser', data);
//         return data;
//       })
// }