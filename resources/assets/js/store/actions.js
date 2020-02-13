import axios from 'axios';

const baseUrl = 'http://localhost/'

export default {
    submitUserData({ state }) {
        const url = 'user'
        let formData = new FormData();
        formData.append('name', state.name);
        formData.append('nameKana', state.nameKana);
        formData.append('birthday', state.birthday);
        formData.append('email', state.email);
        formData.append('emproyeeNumber', state.emproyeeNumber);
        formData.append('password', state.password);
        formData.append('gender', state.gender);
        formData.append('address', state.address);
        formData.append('country', state.country);
        formData.append('initial', state.initial);
        formData.append('education', state.education);
        formData.append('graduate', state.graduate);
        formData.append('station', state.station);
        formData.append('qualifications', state.qualifications);
        formData.append('adminFlag', state.adminFlag);
        formData.append('workList', JSON.stringify(state.workList));

        asyncSubmit(url, formData)
            .then(() => {
                console.log('登録/変更に成功しました！');
                alert('登録/変更に成功しました！');
            })
            .catch(response => {
                console.log(response);
                console.log('登録/変更に失敗しました！');
                alert('登録/変更に失敗しました！');
            });
    },
    redirect({ commit }, router) {
        const url = baseUrl +'user'
        asyncRequest(url)
        .then((response) => {
            console.log(response)
            // 管理者でない場合、データをvuexに設定して編集画面へ遷移
            if (response.user.admin_flag == false) {
                setUserData(commit,response.user, response.ex);
                commit('setEditFlag', true);
                router.push('/edit')
            }

        })
        .catch((response) =>{
            console.log(response);
            console.log('ログインユーザ情報取得に失敗しました')
        })
    }
}
/**
 * GETリクエスト
 * axiosを使用しGETリクエストを送信します。
 * @param endPoint
 * @returns {Promise<any>}
 */
function asyncRequest(endPoint) {
    return new Promise((resolve, reject) => {
        axios
            .get(endPoint)
            .then(response => {
                if (response.status != 200) {
                    return reject(response);
                }
                return resolve(response.data);
            })
            .catch(err => {
                return reject(err);
            });
    });
}

/**
 * POSTリクエスト
 * axiosを使用しPOSTリクエストを送信します。
 * @param endPoint
 * @returns {Promise<any>}
 */
function asyncSubmit(url, formData, header = null) {
    return new Promise((resolve, reject) => {
        axios
            .post(url, formData, header)
            .then(response => {
                if (response.status != 200) {
                    return reject(response);
                }
                return resolve(response.data);
            })
            .catch(err => {
                return reject(err);
            });
    });
}

/**
 * ユーザ情報設定
 * ユーザ情報をvuexに設定します。
 * @param commit
 * @param userData ユーザ基本情報
 * @param exData 実務経験情報
 * @return void
 */
function setUserData(commit, userData, exData) {
    // 基本情報を設定
    commit('setEmproyeeNumber', userData.emproyee_no);
    commit('setName', userData.name);
    commit('setNameKana', userData.name_kana);
    commit('setEmail', userData.email);
    commit('setBirthday', userData.birthday);
    commit('setAddress', userData.address);
    commit('setCountry', userData.country);
    commit('setInitial', userData.initial);
    commit('setEducation', userData.education);
    commit('setGraduate', userData.graduate);
    commit('setStation', userData.station);
    commit('setQualifications', userData.qualifications);
    commit('setAdminFlag', userData.admin_flag);

    // 実務経験情報をあるだけ設定
    let count = 1;
    exData.map(value => {
        console.log(value.kind)
        commit('setWorkList', {no: count, name: 'kind', value: value.kind });
        commit('setWorkList', {no: count, name: 'comment', value: value.comment });
        commit('setWorkList', {no: count, name: 'startYear', value: value.start_year });
        commit('setWorkList', {no: count, name: 'startMonth', value: value.start_month });
        commit('setWorkList', {no: count, name: 'endYear', value: value.end_year });
        commit('setWorkList', {no: count, name: 'endMonth', value: value.end_month });
        commit('setWorkList', {no: count, name: 'workResearchFlag', value: value.work_research_flag });
        commit('setWorkList', {no: count, name: 'workRequirementFlag', value: value.work_requirement_flag });
        commit('setWorkList', {no: count, name: 'workBdFlag', value: value.work_bd_flag });
        commit('setWorkList', {no: count, name: 'workDdFlag', value: value.work_dd_flag });
        commit('setWorkList', {no: count, name: 'workPgFlag', value: value.work_pg_flag });
        commit('setWorkList', {no: count, name: 'workTFlag', value: value.work_t_flag });
        commit('setWorkList', {no: count, name: 'workOmFlag', value: value.work_om_flag });
        commit('setWorkList', {no: count, name: 'workOtherFlag', value: value.work_other_flag });
        commit('setWorkList', {no: count, name: 'system', value: value.system });
        commit('setWorkList', {no: count, name: 'type', value: value.type });
        commit('setWorkList', {no: count, name: 'wholeSize', value: value.whole_size });
        commit('setWorkList', {no: count, name: 'teamSize', value: value.team_size });
        commit('setWorkList', {no: count, name: 'os', value: value.os });
        commit('setWorkList', {no: count, name: 'lang', value: value.lang });
        commit('setWorkList', {no: count, name: 'mw', value: value.mw });
        commit('setWorkList', {no: count, name: 'fw', value: value.fw });
        commit('setWorkList', {no: count, name: 'tool', value: value.tool });

        commit('addWorkList')
        count++;
    })



}