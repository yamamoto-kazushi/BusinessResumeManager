import {state} from './index'

export const mutations = {
    setEmproyeeNumber(state, value)  {
        state.emproyeeNumber = value
    },
    setPassword(state, value)  {
        state.password = value
    }
}