<template>
  <div class="app-container">
    <el-form
      ref="form"
      :model="form"
      label-width="120px"
      :label-position="labelPosition"
    >
      <el-form-item label="title">
        <el-input v-model="form.title" />
      </el-form-item>
      <el-form-item prop="image1" style="margin-bottom: 30px">
        <img :src="previewImage" width="100" class="avatar" />
        <input type="file" name="image" @change="upload" />
      </el-form-item>
      <el-form-item label="description">
        <el-input v-model="form.description" />
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="onSubmit"> Create </el-button>
        <el-button @click="onCancel"> Cancel </el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import Resource from '@/api/resource';
const bannerResource = new Resource('banner');

export default {
  data() {
    return {
      labelPosition: 'left',
      previewImage: '',
      image: '',
      form: {
        title: '',
        image: '',
        description: '',
      },
    };
  },
  methods: {
    upload(e) {
      let files = e.target.files[0];
      this.previewImage = URL.createObjectURL(files);
      this.image = files;
    },
    onSubmit() {
      let formData = new FormData();
      formData.append('image', this.image);
      formData.append('title', this.form.title);
      formData.append('description', this.form.description);
      bannerResource
        .store(formData)
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

