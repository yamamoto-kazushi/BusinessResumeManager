<template>
    <div class="container">
        <div class="row base-info">
            <h2 class="col-12">社員一覧</h2>
            <label class="offset-9 col-3"> 最終更新日が1ヶ月以上前の社員は行が赤色</label>
            <el-table
                :data="getUserList.filter(data => !search || data.email.toLowerCase().includes(search.toLowerCase()) || data.name.toLowerCase().includes(search.toLowerCase()))"
                style="width: 100%"
                :row-class-name="tableRowClassName">
                <el-table-column
                    label="社員番号"
                    prop="emproyee_no">
                </el-table-column>
                <el-table-column
                    label="名前"
                    prop="name">
                </el-table-column>
                <el-table-column
                    label="メールアドレス"
                    prop="email">
                </el-table-column>
                <el-table-column
                    align="right">
                    <template slot="header" slot-scope="scope">
                        <el-input
                            v-model="search"
                            size="mini"
                            placeholder="名前 or メアド検索"/>
                    </template>
                    <template slot-scope="scope">
                        <el-button
                            size="mini"
                            @click="handleEdit(scope.$index, scope.row)">変更</el-button>
                        <el-button
                            size="mini"
                            type="danger"
                            @click="handleDelete(scope.$index, scope.row)">削除</el-button>
                    </template>
                </el-table-column>
         </el-table>
        </div>
    </div>
</template>

<script>
    export default {
        name:"UserListPage",
        data() {
            return {
                lastMonth: "",
                search: ''
            }
        },
        mounted() {
            let dt = new Date();
            dt.setMonth( dt.getMonth() - 1)
            this.lastMonth = dt.getFullYear() +'-'+ dt.getMonth() + 1 +'-'+ dt.getDate() +' '+ dt.getHours() +':'+ dt.getMinutes() +':'+ dt.getSeconds()
        },
        computed: {
            getUserList() {
                return this.$store.state.userList
            }
        },
        methods: {
            handleEdit(index, row) {
                this.$store.dispatch('selectUserEdit', {user: row, router: this.$router})
            },
            handleDelete(index, row) {
                if (window.confirm('['+ row.emproyee_no +' '+ row.name +']の情報を削除しますがよろしいですか？')) {
                    this.$store.dispatch('selectUserDelete', {user: row, router: this.$router})
                }
            },
            tableRowClassName({row, rowIndex}) {
                if (this.lastMonth === "") {
                    return ''
                }
                if (this.lastMonth > row.last_update_datetime) {
                    return 'warning-row';
                }
                return '';
            }
        },
    }
</script>
<style lang="scss">
.el-table {
    padding-right: 1px;

    .warning-row {
    background: #fce6e6;
  }
}
</style>