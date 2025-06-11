<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Proyek</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        thead {
            background-color: #f2f2f2;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 6px 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            font-weight: bold;
            color: #111;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #eef;
        }
    </style>
</head>
<body>
    <h2>Laporan Semua Proyek</h2>
    <table>
        <thead>
            <tr>
                <th>Judul Proyek</th>
                <th>Mitra</th>
                <th>Lokasi</th>
                <th>Tanggal Mulai</th>
                <th>Estimasi Lama</th>
                <th>Status Pengajuan Material</th>
                <th>Status Inspeksi Logistik</th>
                <th>Status Ajuhan Upahan</th>
                <th>Status Proyek</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr>
                <td>{{ $project->nama_proyek }}</td>
                <td>{{ $project->partner->nama_partner ?? '-' }}</td>
                <td>{{ $project->lokasi }}</td>
                <td>{{ $project->tanggal_proyek }}</td>
                <td>{{ $project->estimasi_lama }} Bulan</td>
                <td>{{ ucfirst($project->status_pengajuan_kebutuhan_material) }}</td>
                <td>{{ ucfirst($project->status_inspeksi_logistik) }}</td>
                <td>{{ ucfirst($project->status_ajuhan_upahan) }}</td>
                <td>{{ ucfirst($project->status_proyek) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
