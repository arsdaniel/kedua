<template>
  <div class="app-container">
    <el-form ref="form" :model="form" label-width="120px">
      <el-form-item label="Nama Banner">
        <el-input v-model="form.title" />
      </el-form-item>
      <el-form-item prop="image" style="margin-bottom: 30px">
        <Upload v-model="form.image" />
      </el-form-item>
      <el-form-item label="Descrition">
        <el-input v-model="form.description" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="onSubmit"> Update </el-button>
        <el-button @click="onCancel"> Cancel </el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import Upload from '@/components/Upload/SingleImage';
import { fetchBanner } from '@/api/banner';
import Resource from '@/api/resource';
const bannerResource = new Resource('banner');

export default {
  name: 'EditBanner',
  components: {
    Upload,
  },
  data() {
    return {
      form: {
        title: '',
        image: '',
        description: '',
      },
    };
  },
  created() {
    const id = this.$route.params && this.$route.params.id;
    this.fetchData(id);
    // Why need to make a copy of this.$route here?
    // Because if you enter this page and quickly switch tag, may be in the execution of the setTagsViewTitle function, this.$route is no longer pointing to the current page
    this.tempRoute = Object.assign({}, this.$route);
  },
  methods: {
    fetchData(id) {
      fetchBanner(id)
        .then((response) => {
          this.form = response.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    onSubmit() {
      this.updating = true;
      bannerResource
        .update(this.form.id, this.form)
        .then((response) => {
          this.updating = false;
          this.$message({
            message: 'User information has been updated successfully',
            type: 'success',
            duration: 5 * 1000,
          });
        })
        .catch((error) => {
          console.log(error);
          this.updating = false;
        });
    },
    onCancel() {
      this.$message({
        message: 'cancel!',
        type: 'warning',
      });
    },
  },
};
</script>

<style scoped>
.line {
  text-align: center;
}
</style>

