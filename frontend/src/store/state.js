const store = {
    user: {
        token: sessionStorage.getItem('TOKEN'),
        data: []
    },
    posts: {}
};

export default store;