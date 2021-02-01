<table>
  <thead>
      <tr>
          <th>ARRIVAL NO</th>
          <th>MRN</th>
          <th>Nama Patient</th>
          <th>Jenis Kelamin</th>
          <th>Age Year</th>
          <th>Identification Number</th>
          <th>Telephone</th>
          <th>Address</th>
          <th>Nationality</th>
          <th>Dokter</th>
          <th>Sinopsis</th>
          <th>Arrival Type</th>
          <th>Arrival Date</th>
          <th>ICD Code</th>
          <th>ICD Name</th>
      </tr>
  </thead>
  <tbody>
@foreach ($arrivalicd as $item)
    <tr>
      <td>{{ $item->arvNo }}</td>
      <td>{{ $item->patNRM }}</td>
      <td>{{ $item->patGivenname }} {{ $item->patSurename }}</td>
      <td>{{ ($item->patSex) == "M" ? 'Male / Laki-laki' : 'Female / Perempuan' }}</td>
      <td>{{ $item->arvAgeYr }}</td>
      <td>{{ $item->patidCardNo }}</td>
      <td>{{ $item->patPhone }}</td>
      <td>{{ $item->arvaddress }}</td>
      <td>{{ $item->nationName }}</td>
      <td>{{ $item->firstDokter }}</td>
      <td>{{ $item->arvSinopsis }}</td>
      <td>{{ $item->arrtypename }}</td>
      <td>{{ $item->arvDate }}</td>
      <td>{{ $item->icdcode }}</td>
      <td>{{ $item->icdname }}</td>
    </tr>
@endforeach
  </tbody>
</table>