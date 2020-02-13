<template>
    <div class="form-group row ">
        <label class="input-text-name col-2">
            {{ this.itemName}}
        </label>
        <label v-if="this.isRequired" class="required-label col-1">【必須】</label>
        <div v-else class="col-1"></div>
        <div class="check-box-area col-9 row">
            <div v-for="(item, idx) in this.inputDataList" :key="idx" class="col-3 check-div">
                <input
                    type="checkbox"
                    :id="item.setterName + setterNo"
                    @input="input(item.setterName, $event)"
                    class="form-check-input"
                    :checked="item.checked"
                >
                <label class="check-box-name" :for="item.setterName + setterNo">{{item.name}}</label>
                </input>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name:"InputCheckBox",
        props: {
            itemName: {
                type: String,
                required: true
            },
            inputDataList: {
                required: true
            },
            setterNo: {
                type: [Number, Boolean]
            },
            isRequired: {
                type: Boolean,
                required: true,
                defalut: false
            }
        },
        methods: {
            input(setterName, e) {
                if (this.setterNo === false) {
                    this.$store.commit(setterName, e.target.checked);
                } else {
                    this.$store.commit('setWorkList', {no: this.setterNo, name: setterName, value: e.target.checked});
                }
            }
        }
    }
</script>
<style lang="scss">
.form-control {
    font-size: 13px;
}
.required-label {
    color:red;
    font-size: 10px;
    padding: 0 !important;
}
.check-div {
    padding: 0 !important;
}
.check-box-name {
    padding-left: 13px;
}
</style>