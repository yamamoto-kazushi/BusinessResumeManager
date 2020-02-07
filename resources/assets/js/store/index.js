import Vue from 'vue';
import Vuex from 'vuex';
import * as actions from './actions';
import * as getters from './getters';
import {mutations} from './mutations';

Vue.use(Vuex);

export default new Vuex.Store({
  actions,
  getters,
  mutations,

  state: {
      name: "",
      nameKana: "",
      birthday: "",
      email: "",
      emproyeeNumber: "",
      password: "",
      gender: "",
      address: "",
      country: "",
      initial: "",
      education: "",
      graduate: "",
      station: "",
      qualifiations: "",

  }
});