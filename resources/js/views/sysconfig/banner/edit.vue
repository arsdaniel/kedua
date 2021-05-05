<template>
  <div class="app-container">
    <el-form
      ref="form"
      :model="form"
      label-width="120px"
      :label-position="labelPosition"
    >
      <el-form-item label="Nama Banner">
        <el-input v-model="form.title" disabled />
      </el-form-item>
      <el-form-item prop="image" style="margin-bottom: 30px" label="Image">
        <img :src="previewImage" width="100" class="avatar">
        <el-button
          size="small"
          type="primary"
          @click="chooseFiles()"
        >Click to upload</el-button>
        <input
          id="fileUpload"
          type="file"
          name="image"
          hidden
          @change="upload"
        >
      </el-form-item>
      <el-form-item label="Description">
        <el-input v-model="form.description" />
      </el-form-item>
      <el-form-item>
        <el-select
          v-model="form.status"
          class="filter-item"
          placeholder="Status"
        >
          <el-option
            v-for="item in status"
            :key="item"
            :label="item | uppercaseFirst"
            :value="item"
          />
        </el-select>
      </el-form-item>
      <el-form-item>
        <el-button type="primary" @click="onSubmit"> Update </el-button>
        <el-button @click="onCancel"> Cancel </el-button>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import { fetchBanner } from '@/api/banner';
import Resource from '@/api/resource';
const bannerResource = new Resource('banner');

export default {
  name: 'EditBanner',
  data() {
    return {
      labelPosition: 'left',
      previewImage: '',
      image: '',
      form: {
        title: '',
        status: '',
        description: '',
      },
      status: ['Active', 'inActive'],
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
    chooseFiles() {
      document.getElementById('fileUpload').click();
    },
    fetchData(id) {
      fetchBanner(id)
        .then((response) => {
          this.form = response.data;
          this.previewImage = this.form.image;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    upload(e) {
      const files = e.target.files[0];
      if (files) {
        this.previewImage = URL.createObjectURL(files);
        this.image = files;
      }
    },
    onSubmit() {
      const formData = new FormData();
      formData.append('image', this.image);
      formData.append('title', this.form.title);
      formData.append('description', this.form.description);
      formData.append('status', this.form.status);
      bannerResource
        .ubah(this.form.id, formData)
        .then((response) => {
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

<style>
.avatar-uploader .el-upload {
  border: 1px dashed #d9d9d9;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.avatar-uploader .el-upload:hover {
  border-color: #409eff;
}
.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  width: 178px;
  height: 178px;
  line-height: 178px;
  text-align: center;
}
.avatar {
  width: 178px;
  height: 178px;
  display: block;
}
</style>

