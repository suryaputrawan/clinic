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
      <td>{{ $item->patGivenname }} {{ $item->patSurename }}</td>
      <td>{{ ($item->patSex) == "M" ? 'Male / Laki-laki' : 'Female / Perempuan' }}</td>
      <td>{{ $item->pob }}</td>
      <td>{{ $item->patidCardNo }}</td>
      <td>{{ $item->patPhone }}</td>
      <td>{{ $item->patAddressH }}</td>
      <td>{{ $item->nationName }}</td>
      <td>{{ $item->doktername }}</td>
      <td>{{ $item->pleboname }}</td>
      <td>{{ $item->labstaffname }}</td>
      <td>{{ $item->result }}</td>
      <td>{{ $item->remarks }}</td>
    </tr>
@endforeach
  </tbody>
</table>