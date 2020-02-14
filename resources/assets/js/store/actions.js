import axios from 'axios';

const baseUrl = 'http://localhost/'

export default {
    submitUserData({ state }, router) {
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

        if (state.editFlag) {
            const url = 'user/' + state.emproyeeNumber
            asyncPut(url, formData)
                .then((response) => {
                    if (response.resulet) {
                             alert(response.message)
                            router.push('/')
                        } else {
                            alert(response.message)
                        }
                })
                .catch(response => {
                    console.log(response);
                    alert('変更に失敗しました！');
                });

        } else {
            const url = 'user'
            asyncPost(url, formData)
                .then(() => {
                    alert('登録に成功しました！');
                })
                .catch(response => {
                    console.log(response);
                    alert('登録に失敗しました！');
                });
        }
    },
    redirect({ commit }, router) {
        const url = 'user'
        asyncGet(url)
        .then((response) => {
            console.log(response)
            // 管理者でない場合、データをvuexに設定して編集画面へ遷移
            if (response.user.admin_flag == false) {
                setUserData(commit,response.user, response.ex);
                commit('setEditFlag', true);
                router.push('/edit')
            } else {
                const url = 'user/list'
                asyncGet(url)
                    .then((response) => {
                        if (response.result) {
                            commit('setUserList', response.list)
                        } else {
                            console.log(response.message)
                        }
                        router.push('/list')
                    })
                    .catch(response => {
                        console.log(response);
                        alert('変更に失敗しました！');
                    });

            }

        })
        .catch((response) =>{
            console.log(response);
            console.log('ログインユーザ情報取得に失敗しました')
        })
    },
    selectUserEdit({commit}, selectData) {
        const selectUser = selectData.user
        const router = selectData.router
        const url = 'user/' + selectUser.emproyee_no
        asyncGet(url)
            .then((response) => {
                setUserData(commit,response.user, response.ex);
                commit('setEditFlag', true);
                router.push('/edit')
            })
            .catch(response => {
                console.log(response);
                alert('ユーザ情報取得に失敗しました！');
            });
        console.log(selectUser, url)
    },
    selectUserDelete({commit}, selectData) {
        const selectUser = selectData.user
        const router = selectData.router
        const url = 'user/' + selectUser.emproyee_no
        asyncDelete(url)
            .then((response) => {
                if (response.result) {
                    alert('ユーザ削除に成功しました')
                    router.push('/')
                } else {
                    alert(response.message)
                }

            })
            .catch(response => {
                console.log(response);
                alert('ユーザ情報取得に失敗しました！');
            });
        console.log(selectUser, url)
    }
}
/**
 * GETリクエスト
 * axiosを使用しGETリクエストを送信します。
 * @param url
 * @returns {Promise<any>}
 */
function asyncGet(url) {
    // url = baseUrl + url
    return new Promise((resolve, reject) => {
        axios
            .get(url)
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
 * @param url
 * @param formData
 * @param header
 * @returns {Promise<any>}
 */
function asyncPost(url, formData, header = null) {
    // url = baseUrl + url
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
 * PUTリクエスト
 * axiosを使用しPUTリクエストを送信します。
 * ※PHPはPUTメソッドのパラメータを受け取れないので、POSTで送る
 *   変更処理なので、本来はPUTで送るのが正しい
 * @param url
 * @param formData
 * @param header
 * @returns {Promise<any>}
 */
function asyncPut(url, formData, header = null) {
    // url = baseUrl + url
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
 * DELETEリクエスト
 * axiosを使用しDELETEリクエストを送信します。
 * @param url
 * @returns {Promise<any>}
 */
function asyncDelete(url) {
    // url = baseUrl + url
    return new Promise((resolve, reject) => {
        axios
            .delete(url)
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
        if (count > 1) {
            commit('addWorkList')
        }
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

        count++;
    })



}