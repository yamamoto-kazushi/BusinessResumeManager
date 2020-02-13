export default {
    getWorkList: (state) => (value) => {
        return state.workList[value.no][value.name]
    }
}