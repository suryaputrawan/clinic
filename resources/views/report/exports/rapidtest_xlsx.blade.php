<table>
  <thead>
      <tr>
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
          <th>Plebotomis</th>
          <th>Lab Staff</th>
          <th>Result</th>
          <th>Remarks</th>
      </tr>
  </thead>
  <tbody>
@foreach ($rapid as $item)
    <tr>
      <td>{{ $item->tanggal }}</td>
      <td>{{ $item->nosurat }}</td>
      <td>{{ $item->patient_patNRM }}</td>
      <td>{{ $item->patient->patGivenname }} {{ $item->patient->patSurename }}</td>
      <td>{{ ($item->patient->patSex) == "L" ? 'Male / Laki-laki' : 'Female / Perempuan' }}</td>
      <td>{{ $item->pob }}</td>
      <td>{{ $item->patient->patidCardNo }}</td>
      <td>{{ $item->patient->patPhone }}</td>
      <td>{{ $item->patient->patAddres }}</td>
      <td>{{ $item->nationality->nationName }}</td>
      <td>{{ $item->dokter->doktername }}</td>
      <td>{{ $item->plebotomis->name }}</td>
      <td>{{ $item->labstaff->name }}</td>
      <td>{{ $item->result }}</td>
      <td>{{ $item->remarks }}</td>
    </tr>
@endforeach
  </tbody>
</table>