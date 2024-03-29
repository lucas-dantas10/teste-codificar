import { createStore } from 'vuex';
import state from './state';
import * as actions from './actions.js';
import * as mutations from './mutations.js';

const store = createStore({
    state,
    mutations,
    actions
});

export default store;