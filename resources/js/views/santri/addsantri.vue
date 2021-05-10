<template>
  <el-card>
    <el-tabs v-model="activeActivity" @tab-click="handleClick">
      <el-tab-pane label="Biodata Santri" name="first">
        <el-card>
          <el-form
            ref="santriForm"
            :rules="rules"
            :model="newBiodataSantri"
            :label-position="labelPosition"
            label-width="180px"
          >
            <el-form-item
              prop="image"
              style="margin-bottom: 30px"
              label="Foto"
            >
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
            <el-form-item label="Nama Depan" prop="name">
              <el-input v-model="newBiodataSantri.name" />
            </el-form-item>
            <el-form-item label="Nama Tengah" prop="nama_tengah">
              <el-input v-model="newBiodataSantri.nama_tengah" />
            </el-form-item>
            <el-form-item label="Nama Belakang" prop="nama_belakang">
              <el-input v-model="newBiodataSantri.nama_belakang" />
            </el-form-item>
            <el-form-item label="Email" prop="email">
              <el-input v-model="newBiodataSantri.email" />
            </el-form-item>
            <el-form-item label="nis" prop="nis">
              <el-input v-model="newBiodataSantri.nis" />
            </el-form-item>
            <el-form-item label="Nisn" prop="nisn">
              <el-input v-model="newBiodataSantri.nisn" />
            </el-form-item>
            <el-form-item label="No Ijazah" prop="no_ijazah">
              <el-input v-model="newBiodataSantri.no_ijazah" />
            </el-form-item>
            <el-form-item label="Jenis Kelamin" prop="jenis_kelamin">
              <el-input v-model="newBiodataSantri.jenis_kelamin" />
            </el-form-item>
            <el-form-item label="Tempat lahir" prop="tempat_lahir">
              <el-input v-model="newBiodataSantri.tempat_lahir" />
            </el-form-item>
            <el-form-item label="Tanggal lahir" prop="tgl_lahir">
              <el-date-picker
                v-model="newBiodataSantri.tgl_lahir"
                type="date"
                placeholder="Pick a day"
                format="yyyy/MM/dd"
                value-format="yyyy-MM-dd"
              />
              <span>{{ newBiodataSantri.tgl_lahir }}</span>
            </el-form-item>
            <el-form-item label="Alamat" prop="alamat">
              <el-input v-model="newBiodataSantri.alamat" />
            </el-form-item>
            <el-form-item label="Provinsi" prop="provinsi">
              <el-input v-model="newBiodataSantri.provinsi" />
            </el-form-item>
            <el-form-item label="Kabupaten" prop="kabupaten">
              <el-input v-model="newBiodataSantri.kabupaten" />
            </el-form-item>
            <el-form-item label="Kelurahan" prop="kelurahan">
              <el-input v-model="newBiodataSantri.kelurahan" />
            </el-form-item>
            <el-form-item label="Kode Pos" prop="kode_pos">
              <el-input v-model="newBiodataSantri.kode_pos" />
            </el-form-item>
            <el-form-item label="Asal Sekolah" prop="sekolah_asal">
              <el-input v-model="newBiodataSantri.sekolah_asal" />
            </el-form-item>
            <el-form-item label="Sekolah Tujuan" prop="sekolah_sekarang">
              <el-input v-model="newBiodataSantri.sekolah_sekarang" />
            </el-form-item>
            <el-form-item>
              <el-button type="primary" @click="onSubmitSantri">
                Create
              </el-button>
            </el-form-item>
          </el-form>
        </el-card>
      </el-tab-pane>
      <el-tab-pane label="Biodata Wali" name="second">
        <el-card>
          <el-form
            ref="waliForm"
            :rules="rules"
            :model="newWaliSantri"
            :label-position="labelPosition"
            label-width="180px"
          >
            <el-form-item label="Nama Depan" prop="name">
              <el-input v-model="newWaliSantri.name" />
            </el-form-item>
            <el-form-item label="Nama Tengah" prop="nama_tengah">
              <el-input v-model="newWaliSantri.nama_tengah" />
            </el-form-item>
            <el-form-item label="Nama Belakang" prop="nama_belakang">
              <el-input v-model="newWaliSantri.nama_belakang" />
            </el-form-item>
            <el-form-item label="No Telp" prop="no_telp">
              <el-input v-model="newWaliSantri.no_telp" />
            </el-form-item>
            <el-form-item label="Jenis Kelamin" prop="jenis_kelamin">
              <el-input v-model="newWaliSantri.jenis_kelamin" />
            </el-form-item>
            <el-form-item label="Tempat lahir" prop="tempat_lahir">
              <el-input v-model="newWaliSantri.tempat_lahir" />
            </el-form-item>
            <el-form-item label="Tanggal lahir" prop="tgl_lahir">
              <el-date-picker
                v-model="newWaliSantri.tgl_lahir"
                type="date"
                placeholder="Pick a day"
                format="yyyy/MM/dd"
                value-format="yyyy-MM-dd"
              />
              <span>{{ newWaliSantri.tgl_lahir }}</span>
            </el-form-item>
            <el-form-item label="Alamat" prop="alamat">
              <el-input v-model="newWaliSantri.alamat" />
            </el-form-item>
            <el-form-item label="Provinsi" prop="provinsi">
              <el-input v-model="newWaliSantri.provinsi" />
            </el-form-item>
            <el-form-item label="Kabupaten" prop="kabupaten">
              <el-input v-model="newWaliSantri.kabupaten" />
            </el-form-item>
            <el-form-item label="Kelurahan" prop="kelurahan">
              <el-input v-model="newWaliSantri.kelurahan" />
            </el-form-item>
            <el-form-item label="Kode Pos" prop="kode_pos">
              <el-input v-model="newWaliSantri.kode_pos" />
            </el-form-item>
            <el-form-item label="Pendidikan Terakhir" prop="pendidikan_terakhir">
              <el-input v-model="newWaliSantri.pendidikan_terakhir" />
            </el-form-item>
            <el-form-item>
              <el-button type="primary" @click="onSubmitWali">
                Create
              </el-button>
            </el-form-item>
          </el-form>
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
const santriResource = new Resource('santri');
const waliResource = new Resource('wali');

export default {
  data() {
    return {
      labelPosition: 'left',
      activeActivity: 'first',
      updating: false,
      previewImage: '',
      image: '',
      newBiodataSantri: {
        name: '',
        nama_tengah: '',
        nama_belakang: '',
        email: '',
        nis: '',
        nisn: '',
        no_ijazah: '',
        jenis_kelamin: '',
        tempat_lahir: '',
        tgl_lahir: '',
        alamat: '',
        provinsi: '',
        kabupaten: '',
        kelurahan: '',
        kode_pos: '',
        sekolah_asal: '',
        sekolah_sekarang: '',
      },
      newWaliSantri: {
        name: '',
        nama_tengah: '',
        nama_belakang: '',
        no_telp: '',
        jenis_kelamin: '',
        tempat_lahir: '',
        tgl_lahir: '',
        alamat: '',
        provinsi: '',
        kabupaten: '',
        kelurahan: '',
        kode_pos: '',
        pendidikan_terakhir: '',
      },
      role: 'students',
      rules: {
        name: [{ required: true, message: 'Nama harus diisi', trigger: 'blur' }],
        nama_belakang: [{ required: true, message: 'Nama Belakang harus diisi', trigger: 'blur' }],
        email: [{ required: true, type: 'email', message: 'Email harus disi dan harus berupa email', trigger: 'blur' }],
        nis: [{ required: true, message: 'NIS harus diisi', trigger: 'blur' }],
        nisn: [{ required: true, message: 'NISN harus diisi', trigger: 'blur' }],
        no_ijazah: [{ required: true, message: 'No Ijazah harus diisi', trigger: 'blur' }],
        jenis_kelamin: [{ required: true, message: 'Jenis Kelamin harus diisi', trigger: 'blur' }],
        tempat_lahir: [{ required: true, message: 'Tempat lahir harus diisi', trigger: 'blur' }],
        tgl_lahir: [{ required: true, message: 'Tanggal Lahir', trigger: 'blur' }],
        alamat: [{ required: true, message: 'Alamat harus diisi', trigger: 'blur' }],
        provinsi: [{ required: true, message: 'Provinsi harus diisi', trigger: 'blur' }],
        kabupaten: [{ required: true, message: 'Kabupaten harus diisi', trigger: 'blur' }],
        kelurahan: [{ required: true, message: 'Kelurahan harus diisi', trigger: 'blur' }],
        kode_pos: [{ required: true, message: 'Kode Pos harus diisi', trigger: 'blur' }],
        sekolah_asal: [{ required: true, message: 'Sekolah harus diisi', trigger: 'blur' }],
        sekolah_sekarang: [{ required: true, message: 'Sekolah Sekarang harus diisi', trigger: 'blur' }],
      },
    };
  },
  methods: {
    chooseFiles() {
      document.getElementById('fileUpload').click();
    },
    handleClick(tab, event) {
      console.log('Switching tab ', tab, event);
    },
    upload(e) {
      const files = e.target.files[0];
      if (files) {
        this.previewImage = URL.createObjectURL(files);
        this.image = files;
      }
    },
    onSubmitSantri() {
      this.$refs['santriForm'].validate((valid) => {
        if (valid) {
          const formData = new FormData();
          formData.append('name', this.newBiodataSantri.name);
          formData.append('nama_tengah', this.newBiodataSantri.nama_tengah);
          formData.append('nama_belakang', this.newBiodataSantri.nama_belakang);
          formData.append('email', this.newBiodataSantri.email);
          formData.append('nis', this.newBiodataSantri.nis);
          formData.append('nisn', this.newBiodataSantri.nisn);
          formData.append('no_ijazah', this.newBiodataSantri.no_ijazah);
          formData.append('jenis_kelamin', this.newBiodataSantri.jenis_kelamin);
          formData.append('tempat_lahir', this.newBiodataSantri.tempat_lahir);
          formData.append('tgl_lahir', this.newBiodataSantri.tgl_lahir);
          formData.append('alamat', this.newBiodataSantri.alamat);
          formData.append('provinsi', this.newBiodataSantri.provinsi);
          formData.append('kabupaten', this.newBiodataSantri.kabupaten);
          formData.append('kelurahan', this.newBiodataSantri.kelurahan);
          formData.append('kode_pos', this.newBiodataSantri.kode_pos);
          formData.append('sekolah_asal', this.newBiodataSantri.sekolah_asal);
          formData.append('sekolah_sekarang', this.newBiodataSantri.sekolah_sekarang);
          formData.append('role', this.role);
          formData.append('image', this.image);
          santriResource
            .store(formData)
            .then((response) => {
              this.updating = false;
              this.resetNewBiodataSantri();
              this.$message({
                message: 'santri information has been updated successfully',
                type: 'success',
                duration: 5 * 1000,
              });
            })
            .catch((error) => {
              console.log(error);
              this.updating = false;
            });
        } else {
          console.log('error submit!!');
          return false;
        }
      });
    },
    onSubmitWali(){
      this.$refs['waliForm'].validate((valid) => {
        if (valid) {
          waliResource
            .store(this.newWaliSantri)
            .then((response) => {
              this.updating = false;
              this.resetNewBiodataSantri();
              this.$message({
                message: 'santri information has been updated successfully',
                type: 'success',
                duration: 5 * 1000,
              });
            })
            .catch((error) => {
              console.log(error);
              this.updating = false;
            });
        } else {
          console.log('error submit!!');
          return false;
        }
      });
    },
    resetNewBiodataSantri(){
      this.newBiodataSantri = {
        name: '',
        nama_tengah: '',
        nama_belakang: '',
        email: '',
        nis: '',
        nisn: '',
        no_ijazah: '',
        jenis_kelamin: '',
        tempat_lahir: '',
        tgl_lahir: '',
        alamat: '',
        provinsi: '',
        kabupaten: '',
        kelurahan: '',
        kode_pos: '',
        sekolah_asal: '',
        sekolah_sekarang: '',
      };
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

