import {state} from './index'

export default {
    setEditFlag(state, value)  {
        state.editFlag = value
    },
    setEmproyeeNumber(state, value)  {
        state.emproyeeNumber = value
    },
    setPassword(state, value)  {
        state.password = value
    },
    setEmail(state, value)  {
        state.email = value
    },
    setBirthday(state, value)  {
        state.birthday = value
    },
    setName(state, value)  {
        state.name = value
    },
    setNameKana(state, value)  {
        state.nameKana = value
    },
    setEmproyeeNumber(state, value)  {
        state.emproyeeNumber = value
    },
    setGender(state, value)  {
        state.gender = value
    },
    setAddress(state, value)  {
        state.address = value
    },
    setCountry(state, value)  {
        state.country = value
    },
    setInitial(state, value)  {
        state.initial = value
    },
    setEducation(state, value)  {
        state.education = value
    },
    setGraduate(state, value)  {
        state.graduate = value
    },
    setStation(state, value)  {
        state.station = value
    },
    setQualifications(state, value)  {
        state.qualifications = value
    },
    setWorkList(state, value) {
        state.workList[value.no -1][value.name] = value.value
    },
    addWorkList(state) {
        state.workList.push(state.workEx)
    },
    setAdminFlag(state, value) {
        state.adminFlag = value;
    }
}