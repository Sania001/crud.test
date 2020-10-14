import Vue from "vue";
import Vuex from "vuex";
Vue.use(Vuex);

import _ from "lodash";

const users = new Vuex.Store({
    state: {
        users: []
    },
    getters: {
        listUsers: state => {
            return state.users;
        }
    },
    mutations: {
        updateUsers (state, payload) {
            state.users = [];
            console.info(payload)
            _.forEach(payload, (value) => {
                state.users.push(value);
            })
        }
    },
    actions: {
        updateUsers ({commit}, payload) {
            console.info(payload)
            commit('updateUsers', payload)
        }
    }
});

export default users;
