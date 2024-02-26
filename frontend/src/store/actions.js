import axiosClient from '../axios';

export function login({commit}, data) {
    return axiosClient.post('/login', data)
            .then(({data}) => {
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

export function getCurrentUser({commit}, data) {
    return axiosClient.get('/current-user', data)
      .then(({data}) => {
        commit('setUser', data.data);
        return data;
      })
}

export function getPosts({commit}, data) {
    return axiosClient.get('/posts')
      .then(({data}) => {
        commit('setPosts', data);
      })
}

export function registerPost({commit}, data) {
    return axiosClient.post('/posts', data)
      .then(({data}) => {
        return data;
      });
}