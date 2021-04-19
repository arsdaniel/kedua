<template>
  <div class="container">
    <el-card class="tab-register" shadow="always">
      <el-tabs v-model="activeName" @tab-click="handleClick">
        <el-tab-pane label="User" name="first">
          <el-form
            :label-position="labelPosition"
            label-width="100px"
            :model="formLabelAlign"
          >
            <el-form-item label="Name">
              <el-input v-model="formLabelAlign.name"></el-input>
            </el-form-item>
            <el-form-item label="Activity zone">
              <el-input v-model="formLabelAlign.region"></el-input>
            </el-form-item>
            <el-form-item label="Activity form">
              <el-input v-model="formLabelAlign.type"></el-input>
            </el-form-item>
          </el-form>
        </el-tab-pane>
        <el-tab-pane label="Config" name="second">Config</el-tab-pane>
        <el-tab-pane label="Role" name="third">Role</el-tab-pane>
        <el-tab-pane label="Task" name="fourth">Task</el-tab-pane>
      </el-tabs>
    </el-card>
  </div>
</template>

<script>
export default {
  data() {
    return {
      activeName: 'first',
      labelPosition: 'left',
      formLabelAlign: {
        name: '',
        region: '',
        type: '',
      },
    };
  },

  methods: {
    handleClick(tab, event) {
      console.log(tab, event);
    },
  },
};
</script>

<style rel="stylesheet/scss" lang="scss">
$bg: #0ed149af;
$dark_gray: #0a0a0a;
$light_gray: rgb(14, 13, 13);
.container {
  position: fixed;
  height: 100%;
  width: 100%;
  background-color: $bg;
  .tab-register {
    border: 1px solid #b2b9c7;
    width: 80%;
    margin: 7% auto;
    padding: 20px 30px;
    border-radius: 10px;
    background-color: #eee;
  }
}
@media screen and (orientation: landscape) and (max-width: 1024px) {
  .container {
    position: relative;
    overflow-y: auto;
    .tab-register {
      transform: translate(-50%, -50%);
      left: 50%;
      top: 50%;
      margin: auto;
    }
  }
}
</style>
