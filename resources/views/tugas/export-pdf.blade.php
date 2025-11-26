<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Export Tugas PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #444; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
        h2 { text-align: center; }
    </style>
</head>
<body>

<h2>Daftar Tugas Kuliah</h2>

<table>
    <thead>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Deadline</th>
            <th>Prioritas</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $t)
        <tr>
            <td>{{ $t->judul }}</td>
            <td>{{ $t->deskripsi }}</td>
            <td>{{ $t->deadline }}</td>
            <td>{{ ucfirst($t->prioritas) }}</td>
            <td>{{ ucfirst($t->status) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
