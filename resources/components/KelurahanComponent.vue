<template>
  <div>
    <h2>Data Kelurahan</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama Kelurahan</th>
          <th>Nama Kecamatan</th>
          <th>Nama Kota</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="kelurahan in kelurahanList" :key="kelurahan.id">
          <td>{{ kelurahan.id }}</td>
          <td>{{ kelurahan.nama_kelurahan }}</td>
          <td>{{ kelurahan.nama_kecamatan }}</td>
          <td>{{ kelurahan.nama_kota }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
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
    }
  }
};
</script>
