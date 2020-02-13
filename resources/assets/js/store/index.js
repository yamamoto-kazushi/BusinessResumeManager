import Vue from 'vue';
import Vuex from 'vuex';
import actions from './actions';
import getters from './getters';
import mutations from './mutations';

Vue.use(Vuex);

export default new Vuex.Store({
  actions,
  getters,
  mutations,

  state: {
      editFlag: false,
      isAdmin: true,
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
      qualifications: "",
      adminFlag: false,
      workList: [
        {
          kind: "",
          comment: "",
          startYear: "",
          startMonth: "",
          endYear: "",
          endMonth: "",
          workResearchFlag: false,
          workRequirementFlag: false,
          workBdFlag: false,
          workDdFlag: false,
          workPgFlag: false,
          workTFlag: false,
          workOmFlag: false,
          workOtherFlag: false,
          system: "",
          type: "",
          wholeSize: 0,
          teamSize: 0,
          os: "",
          lang: "",
          mw: "",
          fw: "",
          tool: ""
        }
      ],
      workEx: {
        kind: "",
        comment: "",
        startYear: "",
        startMonth: "",
        endYear: "",
        endMonth: "",
        workResearchFlag: false,
        workRequirementFlag: false,
        workBdFlag: false,
        workDdFlag: false,
        workPgFlag: false,
        workTFlag: false,
        workOmFlag: false,
        workOtherFlag: false,
        system: "",
        type: "",
        wholeSize: 0,
        teamSize: 0,
        os: "",
        lang: "",
        mw: "",
        fw: "",
        tool: ""
    }
  }
});