<template>
  <div>
    <h2>Registrasi Pasien</h2>
    <form @submit="submitForm">
      <div>
        <label for="nama_pasien">Nama Pasien:</label>
        <input type="text" id="nama_pasien" v-model="form.nama_pasien" required>
      </div>
      <div>
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" v-model="form.alamat" required>
      </div>
      <div>
        <label for="no_telepon">No. Telepon:</label>
        <input type="text" id="no_telepon" v-model="form.no_telepon" required>
      </div>
      <div>
        <label for="rt_rw">RT/RW:</label>
        <input type="text" id="rt_rw" v-model="form.rt_rw" required>
      </div>
      <div>
        <label for="kelurahan_id">Kelurahan:</label>
        <select id="kelurahan_id" v-model="form.kelurahan_id" required>
          <option v-for="kelurahan in kelurahanList" :value="kelurahan.id">{{ kelurahan.nama_kelurahan }}</option>
        </select>
      </div>
      <div>
        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" v-model="form.tanggal_lahir" required>
      </div>
      <div>
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" v-model="form.jenis_kelamin" required>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        nama_pasien: '',
        alamat: '',
        no_telepon: '',
        rt_rw: '',
        kelurahan_id: '',
        tanggal_lahir: '',
        jenis_kelamin: ''
      },
      kelurahanList: []
    };
  },
  mounted() {
    this.fetchKelurahan();
  },
  methods: {
    fetchKelurahan() {
      // Mengambil data kelurahan dari backend melalui API
      // dan menyimpannya dalam kelurahanList
      axios.get('/api/kelurahan')
        .then(response => {
          this.kelurahanList = response.data.data;
        })
        .catch(error => {
          console.error(error);
        });
    },
    submitForm() {
      // Mengirim data registrasi pasien ke backend melalui API
      axios.post('/api/pasien', this.form)
        .then(response => {
          console.log(response.data);
          // Reset form setelah berhasil
          this.form = {
            nama_pasien: '',
            alamat: '',
            no_telepon: '',
            rt_rw: '',
            kelurahan_id: '',
            tanggal_lahir: '',
            jenis_kelamin: ''
          };
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
};
</script>
