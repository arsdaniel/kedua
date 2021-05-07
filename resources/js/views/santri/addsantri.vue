<template>
  <el-card>
    <el-tabs v-model="activeActivity" @tab-click="handleClick">
      <el-tab-pane label="Biodata Santri" name="first">
        <el-card>
          <el-form
            ref="santriForm"
            :model="newBiodataSantri"
            :label-position="labelPosition"
            label-width="120px"
          >
            <el-form-item label="Nama Depan">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Nama Tengah">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Nama Belakang">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Email">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="nis">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Nisn">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="No Ijazah">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Tempat lahir">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Tanggal lahir">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Alamat">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Provinsi">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Kabupaten">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Kelurahan">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Kode Pos">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Kode Pos">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Asal Sekolah">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Sekolah Tujuan">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item>
              <el-col :span="3">
                <el-button type="primary" @click="onSubmit"> Create </el-button>
              </el-col>
              <el-col :span="3">
                <el-button @click="onCancel"> Cancel </el-button>
              </el-col>
            </el-form-item>
          </el-form>
        </el-card>
      </el-tab-pane>
      <el-tab-pane label="Biodata Wali" name="second">
        <el-card>
          <h1>biodata wali</h1>
        </el-card>
      </el-tab-pane>
      <el-tab-pane v-loading="updating" label="Unggah Berkas" name="third">
        <el-card>
          <h1>Unggah Dokumen</h1>
        </el-card>
      </el-tab-pane>
    </el-tabs>
  </el-card>
</template>

<script>
import Resource from '@/api/resource';
const userResource = new Resource('users');

export default {
  data() {
    return {
      labelPosition: 'left',
      activeActivity: 'first',
      updating: false,
      newBiodataSantri: {
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
      console.log('Switching tab ', tab, event);
    },
    onSubmit() {
      this.updating = true;
      userResource
        .update(this.user.id, this.user)
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
  },
};
</script>

<style lang="scss" scoped>
.user-activity {
  .user-block {
    .username,
    .description {
      display: block;
      margin-left: 50px;
      padding: 2px 0;
    }
    img {
      width: 40px;
      height: 40px;
      float: left;
    }
    :after {
      clear: both;
    }
    .img-circle {
      border-radius: 50%;
      border: 2px solid #d2d6de;
      padding: 2px;
    }
    span {
      font-weight: 500;
      font-size: 12px;
    }
  }
  .post {
    font-size: 14px;
    border-bottom: 1px solid #d2d6de;
    margin-bottom: 15px;
    padding-bottom: 15px;
    color: #666;
    .image {
      width: 100%;
    }
    .user-images {
      padding-top: 20px;
    }
  }
  .list-inline {
    padding-left: 0;
    margin-left: -5px;
    list-style: none;
    li {
      display: inline-block;
      padding-right: 5px;
      padding-left: 5px;
      font-size: 13px;
    }
    .link-black {
      &:hover,
      &:focus {
        color: #999;
      }
    }
  }
  .el-carousel__item h3 {
    color: #475669;
    font-size: 14px;
    opacity: 0.75;
    line-height: 200px;
    margin: 0;
  }

  .el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
  }

  .el-carousel__item:nth-child(2n + 1) {
    background-color: #d3dce6;
  }
}
</style>
