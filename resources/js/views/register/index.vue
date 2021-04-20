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
              <el-input v-model="formLabelAlign.name" />
            </el-form-item>
            <el-form-item label="Activity zone">
              <el-input v-model="formLabelAlign.region" />
            </el-form-item>
            <el-form-item label="Activity form">
              <el-input v-model="formLabelAlign.type" />
            </el-form-item>
          </el-form>
        </el-tab-pane>
        <el-tab-pane label="Config" name="second">
          <h1> header </h1>
          <el-form ref="form" :label-position="labelPosition" :model="form" label-width="120px">
            <el-form-item label="Activity name">
              <el-input v-model="form.name" />
            </el-form-item>
            <el-form-item label="Activity zone">
              <el-select
                v-model="form.region"
                placeholder="please select your zone"
              >
                <el-option label="Zone one" value="shanghai" />
                <el-option label="Zone two" value="beijing" />
              </el-select>
            </el-form-item>
            <el-form-item label="Activity time">
              <el-col :span="11">
                <el-date-picker
                  v-model="form.date1"
                  type="date"
                  placeholder="Pick a date"
                  style="width: 100%"
                />
              </el-col>
              <el-col :span="2" class="line"> - </el-col>
              <el-col :span="11">
                <el-time-picker
                  v-model="form.date2"
                  type="fixed-time"
                  placeholder="Pick a time"
                  style="width: 100%"
                />
              </el-col>
            </el-form-item>
            <el-form-item label="Instant delivery">
              <el-switch v-model="form.delivery" />
            </el-form-item>
            <el-form-item label="Activity type">
              <el-checkbox-group v-model="form.type">
                <el-checkbox label="Online activities" name="type" />
                <el-checkbox label="Promotion activities" name="type" />
                <el-checkbox label="Offline activities" name="type" />
                <el-checkbox label="Simple brand exposure" name="type" />
              </el-checkbox-group>
            </el-form-item>
            <el-form-item label="Resources">
              <el-radio-group v-model="form.resource">
                <el-radio label="Sponsor" />
                <el-radio label="Venue" />
              </el-radio-group>
            </el-form-item>
            <el-form-item label="Activity form">
              <el-input v-model="form.desc" type="textarea" />
            </el-form-item>
            <el-form-item>
              <el-button type="primary" @click="onSubmit"> Create </el-button>
              <el-button @click="onCancel"> Cancel </el-button>
            </el-form-item>
          </el-form>
        </el-tab-pane>
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
      form: {
        name: '',
        region: '',
        date1: '',
        date2: '',
        delivery: false,
        type: [],
        resource: '',
        desc: '',
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
