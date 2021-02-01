<table>
  <thead>
      <tr>
          <th>Tanggal Sampling</th>
          <th>Tanggal Validasi</th>
          <th>Waktu Validasi</th>
          <th>Tanggal Surat</th>
          <th>Nomor Surat</th>
          <th>NRM</th>
          <th>Nama Patient</th>
          <th>Jenis Kelamin</th>
          <th>Tempat Lahir</th>
          <th>Identification Number</th>
          <th>Telephone</th>
          <th>Address</th>
          <th>Nationality</th>
          <th>Dokter</th>
          <th>Laboratorium</th>
          <th>Result</th>
          <th>Remarks</th>
      </tr>
  </thead>
  <tbody>
@foreach ($swabtest as $swab)
    <tr>
      <td>{{ $swab->tanggal_sampling }}</td>
      <td>{{ $swab->tanggal_validasi }}</td>
      <td>{{ $swab->waktu_validasi }}</td>
      <td>{{ $swab->tanggal_surat }}</td>
      <td>{{ $swab->nosurat }}</td>
      <td>{{ $swab->patient_patNRM }}</td>
      <td>{{ $swab->patGivenname }} {{ $swab->patSurename }}</td>
      <td>{{ ($swab->patSex) == "M" ? 'Male / Laki-laki' : 'Female / Perempuan' }}</td>
      <td>{{ $swab->pob }}</td>
      <td>{{ $swab->patidCardNo }}</td>
      <td>{{ $swab->patPhone }}</td>
      <td>{{ $swab->patAddressH }}</td>
      <td>{{ $swab->nationName}}</td>
      <td>{{ $swab->doktername }}</td>
      <td>{{ $swab->labname }}</td>
      <td>{{ $swab->result }}</td>
      <td>{{ $swab->remarks}}</td>
    </tr>
@endforeach
  </tbody>
</table>