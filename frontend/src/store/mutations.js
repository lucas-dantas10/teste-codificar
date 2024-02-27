export function setUser(state, user) {
    state.user.data = user;
}

export function setToken(state, token) {
    state.user.token = token;

    if (token) {
        sessionStorage.setItem("TOKEN", token);
    } else {
        sessionStorage.removeItem("TOKEN");
    }
}

export function removeUser(state) {
    state.user.data = [];
}

export function setPosts(state, data) {
    state.posts= {
        ...state.posts,
        data: data.data,
        links: data.meta?.links,
        // page: data.meta.current_page,
        // limit: data.meta.per_page,
        // from: data.meta.from,
        // to: data.meta.to,
        // total: data.meta.total,
    };
}