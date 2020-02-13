<template>
    <div class="input-text-div form-group row">
        <label class="input-text-name col-2">
            {{ this.itemName}}
        </label>
        <label v-if="this.isRequired" class="required-label col-1">【必須】</label>
        <div v-else class="col-1"></div>
            <div class="col-5">
                <textarea
                    :name="this.inputName"
                    :value="this.inputValue"
                    :placeholder="this.placeholder"
                    rows="4"
                    cols="4"
                    @input="input"
                    class="form-control"
                />
            </div>
    </div>
</template>

<script>
    export default {
        name:"InputTextArea",
        props: {
            itemName: {
                type: String,
                required: true
            },
            inputName: {
                type: String,
                required: true
            },
            inputValue: {
                required: true
            },
            placeholder: {
                type: String
            },
            setterNo: {
                type: Number
            },
            setterName: {
                type: String,
                required: true
            },
            isRequired: {
                type: Boolean,
                required: true,
                defalut: false
            }
        },
        methods: {
            input(e) {
                if (this.setterNo) {
                    this.$store.commit('setWorkList', {no: this.setterNo, name: this.setterName, value: e.target.value});
                } else {
                    this.$store.commit(this.setterName, e.target.value);
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
</style>