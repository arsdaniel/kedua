<template>
  <div class="app-container">
    <div class="filter-container">
      <el-button
        class="filter-item"
        style="margin-left: 10px"
        type="primary"
        icon="el-icon-plus"
        @click="handleCreate"
      >
        {{ $t('table.add') }}
      </el-button>
    </div>

    <el-table
      v-loading="listLoading"
      :data="list"
      border
      fit
      highlight-current-row
      style="width: 100%"
    >
      <el-table-column align="center" label="ID" width="80">
        <template slot-scope="scope">
          <span>{{ scope.row.id }}</span>
        </template>
      </el-table-column>

      <el-table-column min-width="300px" label="Nama Biaya">
        <template slot-scope="{ row }">
          <router-link
            :to="'/biaya/biayaPendaftaran/edit/' + row.id"
            class="link-type"
          >
            <span>{{ row.nama_biaya }}</span>
          </router-link>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="Tahun Ajaran">
        <template slot-scope="scope">
          <span>{{ scope.row.tahun_ajaran }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="Sekolah">
        <template slot-scope="scope">
          <span>{{ scope.row.sekolah }}</span>
        </template>
      </el-table-column>

      <el-table-column width="120px" align="center" label="Harga">
        <template slot-scope="scope">
          <span>{{ scope.row.harga }}</span>
        </template>
      </el-table-column>

      <el-table-column align="center" label="Actions" width="120">
        <template slot-scope="scope">
          <el-button
            type="primary"
            size="small"
            icon="el-icon-edit"
            @click="handleUpdate(scope.row.id)"
          >
            Edit
          </el-button>
        </template>
      </el-table-column>
    </el-table>

    <el-dialog :title="'Biaya Pendaftaran'" :visible.sync="dialogFormVisible">
      <div v-loading="biayaCreating" class="form-container">
        <el-form
          ref="biayaForm"
          :rules="rules"
          :model="newBiaya"
          label-position="left"
          label-width="150px"
          style="max-width: 500px"
        >
          <el-form-item :label="$t('biaya.nama_biaya')" prop="nama_biaya">
            <el-input v-model="newBiaya.nama_biaya" />
          </el-form-item>
          <el-form-item :label="$t('biaya.tahun_ajaran')" prop="tahun_ajaran">
            <el-input v-model="newBiaya.tahun_ajaran" />
          </el-form-item>
          <el-form-item :label="$t('biaya.sekolah')" prop="sekolah">
            <el-input v-model="newBiaya.sekolah" />
          </el-form-item>
          <el-form-item :label="$t('biaya.harga')" prop="harga">
            <el-input v-model="newBiaya.harga" />
          </el-form-item>
        </el-form>
        <div slot="footer" class="dialog-footer">
          <el-button @click="dialogFormVisible = false">
            {{ $t('table.cancel') }}
          </el-button>
          <el-button
            v-if="isEdit == false"
            type="primary"
            @click="createBiaya()"
          >
            {{ $t('table.confirm') }}
          </el-button>
          <el-button
            v-if="isEdit == true"
            type="primary"
            @click="updateBiaya()"
          >
            Ubah
          </el-button>
        </div>
      </div>
    </el-dialog>
  </div>
</template>

<script>
import Resource from '@/api/resource';
const biayaResource = new Resource('biayaPendaftaran');

export default {
  name: 'BiayaPendaftaran',
  data() {
    return {
      image: '',
      list: null,
      total: 0,
      listLoading: true,
      biayaCreating: false,
      isEdit: false,
      listQuery: {
        page: 1,
        limit: 20,
      },
      newBiaya: {
        nama_biaya: '',
        tahun_ajaran: '',
        sekolah: '',
        harga: '',
      },
      dialogFormVisible: false,
      rules: {
        nama_biaya: [{ required: true, message: 'Name is required', trigger: 'blur' }],
        tahun_ajaran: [{ required: true, message: 'Tahun Ajaran is required', trigger: 'blur' }],
        sekolah: [{ required: true, message: 'Sekolah is required', trigger: 'blur' }],
        harga: [{ required: true, message: 'Harga is required', trigger: 'blur' }],
      },
    };
  },
  created() {
    this.getList();
  },
  methods: {
    async getList() {
      this.listLoading = true;
      const { data } = await biayaResource.list(this.listQuery);
      this.list = data.items;
      this.total = data.total;
      this.listLoading = false;
    },
    handleCreate() {
      this.resetNewBiaya();
      this.dialogFormVisible = true;
      this.$nextTick(() => {
        this.$refs['biayaForm'].clearValidate();
      });
    },
    fetchData(id) {
      biayaResource
        .get(id)
        .then((response) => {
          this.newBiaya = response.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    createBiaya() {
      this.$refs['biayaForm'].validate((valid) => {
        if (valid) {
          this.biayaCreating = true;
          biayaResource
            .store(this.newBiaya)
            .then((response) => {
              this.$message({
                message:
                  'Penambahan ' +
                  this.newBiaya.nama_biaya +
                  ' has been created successfully.',
                type: 'success',
                duration: 5 * 1000,
              });
              this.resetNewBiaya();
              this.dialogFormVisible = false;
              this.getList();
            })
            .catch((error) => {
              console.log(error);
            })
            .finally(() => {
              this.biayaCreating = false;
            });
        } else {
          console.log('error submit!!');
          return false;
        }
      });
    },
    updateBiaya() {
      this.$refs['biayaForm'].validate((valid) => {
        if (valid) {
          this.biayaCreating = true;
          biayaResource
            .ubah(this.newBiaya.id, this.newBiaya)
            .then((response) => {
              this.$message({
                message:
                  'Penambahan ' +
                  this.newBiaya.nama_biaya +
                  ' has been created successfully.',
                type: 'success',
                duration: 5 * 1000,
              });
              this.resetNewBiaya();
              this.dialogFormVisible = false;
              this.getList();
            })
            .catch((error) => {
              console.log(error);
            })
            .finally(() => {
              this.biayaCreating = false;
            });
        } else {
          console.log('error submit!!');
          return false;
        }
      });
    },
    handleUpdate(id) {
      this.fetchData(id);
      this.isEdit = true;
      this.dialogFormVisible = true;
      this.$nextTick(() => {
        this.$refs['biayaForm'].clearValidate();
      });
    },
    resetNewBiaya() {
      this.newBiaya = {
        nama_biaya: '',
        tahun_ajaran: '',
        sekolah: '',
        harga: '',
      };
    },
  },
};
</script>

<style scoped>
.edit-input {
  padding-right: 100px;
}
.cancel-btn {
  position: absolute;
  right: 15px;
  top: 10px;
}

@media screen and (max-width:768px) {
    .app-container {
        overflow: auto;
    }
}
</style>
