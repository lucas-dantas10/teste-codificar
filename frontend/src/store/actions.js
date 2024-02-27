import axiosClient from '../axios';

export function login({commit}, data) {
    return axiosClient.post('/login', data)
            .then(({data}) => {
                commit("setUser", data.data.user);
                commit("setToken", data.data.token);
                return data;
            })
}

export function logout({commit}, data) {
    return axiosClient.post('/logout')
            .then(() => {
                commit("removeUser");
                commit("setToken", null);
            });
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

export function getPosts({commit}, url) {
    const urlDefault = url || '/posts';

    return axiosClient.get(urlDefault)
      .then(({data}) => {
        commit('setPosts', data);
        return data;
      })
}

export function getPost({commit}, id) {
    return axiosClient.get(`/posts/${id}`)
      .then(({data}) => {
        return data;
      })
}

export function registerPost({commit}, data) {
    return axiosClient.post('/posts', data)
      .then(({data}) => {
        return data;
      });
}

export function updatePost({commit}, post) {
    console.log(post);
    return axiosClient.put(`/posts/${post.id}`, { text: post.text })
      .then(({data}) => {
        return data;
      });
}

export function removePost({commit}, idPost) {
    return axiosClient.delete(`/posts/${idPost}`)
      .then(({data}) => {
        return data;
      });
}