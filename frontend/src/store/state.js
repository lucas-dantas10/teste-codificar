const store = {
    user: {
        token: sessionStorage.getItem('TOKEN'),
        data: []
    },
    posts: {},
    toast: {
        message: ''
    },
    spinner: {
        isLoading: false
    }
};

export default store;