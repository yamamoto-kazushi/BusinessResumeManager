import {state} from './index'

export const mutations = {
    setEmproyeeNumber(state, value)  {
        state.emproyeeNumber = value
    },
    setPassword(state, value)  {
        state.password = value
    },
    setEmail(state, value)  {
        state.email= value
    },
    setBirthday(state, value)  {
        state.birthday= value
    }
}